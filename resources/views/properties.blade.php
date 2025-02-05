
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Featured Properties</h1>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $property->image }}" class="card-img-top" alt="{{ $property->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $property->title }}</h5>
                            <p class="card-text">Price: ${{ number_format($property->price, 2) }}</p>
                            <p class="card-text">{{ Str::limit($property->description, 50) }}</p>
                            <!-- Styled button -->
                            <a href="{{ route('apartments.show', ['id' => $property->id]) }}" class="btn btn-secondary" style="background-color: rgb(102, 102, 212)">View More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
