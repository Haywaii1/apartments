@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <img src="{{ $property->image ?? 'https://via.placeholder.com/600x300' }}" class="card-img-top" alt="Property Image">
        <div class="card-body">
            <h2 class="card-title">{{ $property->title ?? 'Property Title' }}</h2>
            <p class="card-text"><strong>Price:</strong> ${{ number_format($property->price, 2) }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $property->description ?? 'No description available.' }}</p>
            <p class="card-text"><strong>Location:</strong> {{ $property->location ?? 'Unknown' }}</p>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
