<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Auth\Events\Verified;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }

    public function registerUser(Request $request){
        $validator = validator::make($request->all(),[
            'first-name' => 'required|string',
            'last-name' => 'required|string',
            'phone' => 'required|min:11',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        //  The code below is used to test if it passes validation
            // dd($request->all());



        $formFields = [
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ];


        $user = User::create($formFields);

        if ($user) {
            // Notify the user to verify their email
            $user->notify(new VerifyEmailNotification($user));

            // Automatically log in the user after successful registration
            auth()->login($user);

            // Redirect the user to the email verification page with a success message
            return redirect('/verify-email-page')->with('success', 'User has been registered successfully. Please verify your email.');
        } else {
            // If registration failed, redirect back with input and an error message
            return redirect()->back()->withInput()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }

    public function loginuser(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=> 'required',
            'password' => 'required'
        ]);
            if($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator->errors());
            }
            // if you want to check if you have the same email and password in the database, so youll have to fetch using

            $user = User::where('email', $request->email)->first();

            if(!$user || !Hash::check($request->password, $user->password)){
                return redirect()->back()->with('error', 'credentials did not match our records');
            }

            auth()->login($user);

            return redirect('/home')->with('success', 'Login successful');

            // The code below is used to test if it passes validation
            // dd($request->all());
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home')->with('success', 'Logout Successfully');
    }

    public function verify($id, Request $request) {
        if (!$request->hasValidSignature()) {
            return abort(404);
        }

        $user = User::findOrFail($id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
            return redirect('/home')->with('success', 'Email verified successfully');
        } else {
            return redirect('/')->with('error', 'Email already verified');
        }
    }

    public function verifyEmailPage(){
        return view('auth.email-register');
    }

    public function resend(){
        if(auth()->user()->hasVerifiedEmail()){
            return redirect()->back()->with('error', 'Email already verified');
        }

        auth()->user()->sendEmailVerificationNotification();
        return redirect()->back()->with('success', 'Verification link has been resent to your email');
    }

    public function emailRegister(){
        return view('auth.email-register');
    }

    public function forgotPasswordEmail(){
        return view('auth.passwords.email');
    }

    public function passwordEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User Not Found');
        }

        $response = Password::sendResetLink(
            $request->only('email')
        );

        if ($response == Password::RESET_LINK_SENT) {
            // Redirect back or to a specific route with success message
            return redirect()->back()->with('status', 'Password reset link sent to your email!');
        } else {
            return redirect()->back()->with('error', 'Failed to send password reset link.');
        }
    }

    public function passwordReset(Request $request){
        return view('auth.passwords.reset', [
            'token' => $request->token
        ]);
    }

    public function passwordUpdate(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string|confirmed|min:8',
        'token' => 'required|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator->errors());
    }

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        }
    );

    if ($status === Password::PASSWORD_RESET) {
        return redirect('/login')->with('success', 'Password reset was successful.');
    } else {
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}

}
