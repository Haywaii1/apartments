<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // For API calls
use App\Models\Payment; // Ensure Payment model is imported

class PaymentController extends Controller
{
    private $paystackSecretKey;

    public function __construct()
    {
        $this->paystackSecretKey = env('PAYSTACK_SECRET_KEY'); // Use environment variable
    }

    // Show payment page
    public function showPaymentForm()
    {
        return view('payment_form'); // Assuming you have a Blade file for this
    }

    // Verify transaction
    private function verifyTransaction($reference)
    {
        if (!$reference) {
            return ['status' => false, 'message' => 'No reference supplied'];
        }

        try {
            $response = Http::withToken($this->paystackSecretKey)
                ->get("https://api.paystack.co/transaction/verify/{$reference}");

            if ($response->successful() && $response->json('status')) {
                return ['status' => true, 'data' => $response->json('data')];
            }

            return ['status' => false, 'message' => $response->json('message') ?? 'Verification failed'];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => 'An error occurred: ' . $e->getMessage()];
        }
    }

    // Payment success handler
    public function success(Request $request)
    {
        $reference = $request->query('reference');
        $userId = $request->query('user_id');

        // Verify transaction
        $verification = $this->verifyTransaction($reference);

        if ($verification['status']) {
            $data = $verification['data'];

            // Store payment in database
            Payment::create([
                'user_id' => $userId,
                'property_id' => $data['metadata']['property_id'], 
                'amount' => $data['amount'] / 100, // Convert to Naira
                'reference' => $data['reference'],
                'status' => $data['status'],
            ]);

            return redirect('/')->with('success', 'Payment successful!');
        }

        return redirect('/')->with('error', $verification['message']);
    }
}
