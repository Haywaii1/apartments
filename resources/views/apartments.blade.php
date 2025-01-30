@extends('layouts.app')
@section('title', 'Apartments')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="property-single-page">

    <main class="main">
        <div class="container">
            <h1>{{ isset($property) ? 'Property Details' : 'Available Properties' }}</h1>

            @if(isset($property))
                <!-- Single Property View -->
                <div class="property-details">
                    <img src="{{ $property->image }}" alt="{{ $property->title }}" style="width: 100%; max-width: 400px;">
                    <p><strong>Title:</strong> {{ $property->title }}</p>
                    <p><strong>Price:</strong> ${{ number_format($property->price, 2) }}</p>
                    <p><strong>Description:</strong> {{ $property->description }}</p>
                    <a href="{{ route('booking', ['id' => $property->id]) }}" class="btn btn-primary">Book Now</a>
                    {{-- <a href="{{ route('apartments.index') }}" class="btn btn-secondary">Back to Listings</a> --}}
                </div>
            @else
                <!-- List of All Properties -->
                @if ($properties->isNotEmpty())
                    @foreach ($properties as $property)
                        <div class="property-details">
                            <img src="{{ $property->image }}" alt="{{ $property->title }}" style="width: 100%; max-width: 400px;">
                            <p><strong>Title:</strong> {{ $property->title }}</p>
                            <p><strong>Price:</strong> ${{ number_format($property->price, 2) }}</p>
                            <p><strong>Description:</strong> {{ $property->description }}</p>
                            <a href="{{ route('booking', ['id' => $property->id]) }}" class="btn btn-primary">Book Now</a>
                            <a href="{{ route('apartments', ['id' => $property->id]) }}" class="btn btn-secondary">View More</a>
                        </div>
                        <hr>
                    @endforeach
                @else
                    <p>No properties available.</p>
                @endif
            @endif
        </div>
    </main>

    </body>
    </html>

    @endsection

{{-- <body class="property-single-page">

  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    </div>
  </header>

  <main class="main">

    @section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Property Single</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- Real Estate Section -->
    <div class="container">
        <h1>Available Properties</h1>

        @if ($properties->isNotEmpty())
            @foreach ($properties as $property)
                <div class="property-details">
                    <!-- Display Image -->
                    <div class="property-image">
                        <img src="{{ $property->image }}" alt="{{ $property->title }}" style="width: 100%; height: auto; max-width: 400px;">
                    </div>

                    <!-- Display Details -->
                    <p>Title: {{ $property->title }}</p>
                    <p>Price: ${{ number_format($property->price, 2) }}</p>
                    <p>Description: {{ $property->description }}</p>

                    <!-- Action Buttons -->
                    <a href="{{ route('booking', ['id' => $property->id]) }}" class="btn btn-primary">Book Now</a>
                    <a href="{{ route('apartments', ['id' => $property->id]) }}" class="btn btn-secondary">View More</a>
                </div>
                <hr>
            @endforeach
        @else
            <p>No properties available.</p>
        @endif
    </div>


@endsection --}}
