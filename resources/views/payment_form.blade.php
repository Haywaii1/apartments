@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Make Payment</h1>
    <p>Complete your payment below:</p>

    <!-- Paystack Button -->
    <button id="paystack-button" class="btn btn-primary">Pay Now</button>
</div>

<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    document.getElementById('paystack-button').addEventListener('click', function () {
        const handler = PaystackPop.setup({
            key: '{{ env('PAYSTACK_PUBLIC_KEY') }}', // Replace with your public key
            email: '{{ auth()->user()->email }}',
            amount: 5000 * 100, // Example amount in kobo
            currency: 'NGN',
            ref: 'PAY_' + Math.floor((Math.random() * 1000000000) + 1),
            metadata: {
                property_id: 1, // Replace with dynamic property ID
                user_id: '{{ auth()->id() }}'
            },
            callback: function (response) {
                alert('Payment successful! Reference: ' + response.reference);
                window.location.href = "{{ route('payment.success') }}?reference=" + response.reference + "&user_id={{ auth()->id() }}";
            },
            onClose: function () {
                alert('Transaction canceled');
            }
        });
        handler.openIframe();
    });
</script>
@endsection
