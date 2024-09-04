<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback; // Assuming you have a Feedback model
use Validator;

class ContactController extends Controller
{
    // Display the feedback form
    public function contact()
    {
        return view('pages.contact'); // The view for the feedback form
    }

    // Handle the form submission
    public function sendFeedback(Request $request)
    {
        // Validate the form inputs
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|min:10',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        // Prepare the data to be saved
        $formFields = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        // Save the feedback to the database
        $feedback = Feedback::create($formFields);

        // Redirect with a success or failure message
        if ($feedback) {
            return redirect('/contact')->with('success', 'Thank you for your feedback!');
        } else {
            return redirect('/contact')->with('error', 'There was an error submitting your feedback.');
        }
    }
}
