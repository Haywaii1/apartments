<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback; // Ensure you import the Feedback model if you haven't
use App\Models\Booking; // Ensure you import the Feedback model if you haven't

class ShopController extends Controller
{
    public function book()
    {
        return view('pages.apartments');
    }

    public function cadogan()
    {
        return view('pages.cadogan');
    }
    public function victoryPark()
    {
        return view('pages.victory-park');
    }
    public function milverton()
    {
        return view('pages.milverton');
    }

    public function booking()
    {
        return view('pages.booking-page');
    }


    public function apartments()
    {
        return view('pages.apartments');
    }

    public function bookingSend(Request $request) // Inject the Request object here
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|',
            'phone' => 'required|min:11',
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
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ];

        // Save the feedback to the database
        $booking = Booking::create($formFields);

        // Redirect with a success or failure message
        if ($booking) {
            return redirect('/booking')->with('success', 'we will contact you shortly!');
        } else {
            return redirect('/booking')->with('error', 'There was an error submitting your feedback.');
        }
    }
}
