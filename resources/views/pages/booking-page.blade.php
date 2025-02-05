@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Alert Messages -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="property-image">
        <img src="{{ $property->image }}" alt="{{ $property->title }}" style="width: 100%; height: auto; max-width: 400px;">
    </div>
    <h1>Booking for {{ $property->title }}</h1>
    <p>Price: ${{ number_format($property->price, 2) }}</p>

    <!-- Booking Form -->
    <form method="POST" action="{{ route('booking.send') }}">
        @csrf
        @if(isset($property) && $property->id)
        <input type="hidden" name="property_id" value="{{ $property->id }}">
    @else
        <p class="text-danger">Property not found.</p>
    @endif

        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <!-- Start and End Date Picker -->
        <div class="mb-3">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>

        <!-- Submit and Pay Now Buttons -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Submit Booking</button>
            <button type="button" class="btn btn-success" id="paystack-button">Pay Now</button>
        </div>
    </form>
</div>

<!-- Paystack Script -->
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    // Function to calculate total amount based on dates
    function calculateTotalAmount() {
        let startDate = new Date(document.getElementById('start_date').value);
        let endDate = new Date(document.getElementById('end_date').value);

        // Ensure valid dates
        if (isNaN(startDate) || isNaN(endDate) || startDate >= endDate) {
            alert("Please select a valid start and end date.");
            return null;
        }

        // Calculate number of days
        let timeDiff = endDate - startDate;
        let numberOfDays = timeDiff / (1000 * 3600 * 24); // Convert milliseconds to days

        // Get property price per day (from Blade variable)
        let pricePerDay = {{ $property->price }};

        // Calculate total amount (convert to Kobo)
        return numberOfDays * pricePerDay * 100;
    }

    // Paystack payment processing
    document.getElementById('paystack-button').addEventListener('click', function () {
        let email = document.getElementById('email').value;
        let totalAmount = calculateTotalAmount(); // Get total amount based on stay duration

        if (!email) {
            alert('Please enter your email before proceeding with payment.');
            return;
        }

        if (!totalAmount) {
            return;
        }

        let handler = PaystackPop.setup({
            key: 'pk_test_e29b9cb0d48d9b665fdf0b20c0052d829128bd2b', // Replace with your Paystack public key
            email: email,
            amount: totalAmount,
            currency: 'NGN',
            ref: 'BOOKING_' + Math.floor((Math.random() * 1000000000) + 1), // Unique reference
            callback: function (response) {
                alert('Payment successful. Reference: ' + response.reference);
                window.location.href = "{{ route('payment.success') }}?reference=" + response.reference;
            },
            onClose: function () {
                alert('Payment canceled');
            }
        });
        handler.openIframe();
    });
</script>
@endsection
