<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Booking; // Add Booking model import

class BookingController extends Controller
{
    public function booking($id)
    {
        // Fetch the property by ID or fail
        $property = Property::findOrFail($id);

        // Pass the $property to the view
        return view('pages.booking-page', compact('property'));
    }

    public function bookingSend(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id', // Ensure property ID exists
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Create a booking entry
        try {
            $booking = Booking::create([
                'property_id' => $validated['property_id'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error saving booking', 'error' => $e->getMessage()], 500);
        }

        // Return success response
        return response()->json(['message' => 'Booking created successfully', 'booking' => $booking], 201);
    }

    public function show($id)
    {
        $booking = Booking::with('property')->find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }
        return response()->json($booking, 200);
    }

    // Update a booking
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id', // Validate the property ID
            'name' => 'required|string|max:255', // Ensure name is provided
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Update the booking with validated data
        $booking->update($validated);

        return response()->json(['message' => 'Booking updated successfully', 'booking' => $booking], 200);
    }

    // Delete a booking
    public function destroy($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully'], 200);
    }
}

