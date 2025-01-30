<!DOCTYPE html>
<html>
<head>
    <title>Paystack Payment</title>
    <script src="https://js.paystack.co/v1/inline.js"></script>
</head>
<body>
    <h2>Pay with Paystack</h2>
    <form id="paymentForm">
        <label for="email">Email</label>
        <input type="email" id="email-address" required />
        <label for="amount">Amount</label>
        <input type="number" id="amount" required />
        <button type="button" onclick="payWithPaystack()">Pay</button>
    </form>

    <script>
        function payWithPaystack() {
            let handler = PaystackPop.setup({
    key: 'pk_test_e29b9cb0d48d9b665fdf0b20c0052d829128bd2b', // Replace with your public key
    email: document.getElementById('email').value,
    amount: {{ $property->price * 100 }}, // Convert to kobo
    currency: 'NGN',
    ref: 'BOOKING_' + Math.floor((Math.random() * 1000000000) + 1), // Unique reference
    metadata: {
        user_id: {{ auth()->user()->id }}, // Add the logged-in user's ID here
        custom_fields: [
            {
                display_name: "Phone Number",
                variable_name: "phone_number",
                value: document.getElementById('phone').value
            }
        ]
    },
    callback: function (response) {
        alert('Payment successful. Reference: ' + response.reference);
        window.location.href = "{{ route('payment.success') }}?reference=" + response.reference + "&user_id=" + {{ auth()->user()->id }};
    },
    onClose: function () {
        alert('Payment canceled');
    }
});

    </script>
</body>
</html>
