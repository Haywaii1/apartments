@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Payment Successful!</h1>
    <p>Your payment reference: {{ $reference }}</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Go to Home</a>
</div>
@endsection
