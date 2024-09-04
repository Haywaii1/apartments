@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real Estate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .hero-section {
            background: url('https://th.bing.com/th/id/R.ae21381f3505d601cf6efcdfe8384b2d?rik=7z0CVYgM5jSvNg&pid=ImgRaw&r=0') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px 0;
        }
        .property-card img {
            height: 200px;
            object-fit: cover;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <section class="hero-section">
        <div class="container">
            <h1>Find Your Dream Home</h1>
            <p>Your ideal home is just a click away.</p>
            <a href="#properties" class="btn btn-primary btn-lg">View Properties</a>
        </div>
    </section>

    <!-- Properties Section -->
    <section id="properties" class="container my-5">
        <h2 class="text-center mb-4">Featured Properties</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card property-card">
                    <img src="https://www.jedgammon.com/images/re/legacyTwilight2-36.jpg" class="card-img-top" alt="Property 1">
                    <div class="card-body">
                        <h5 class="card-title">Modern House</h5>
                        <p class="card-text">$500,000</p>
                        <a href="{{ route('book') }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card property-card">
                    <img src="https://photos.zillowstatic.com/fp/21c6a3e6fb01aa15b3e22cc3badaea7f-cc_ft_576.jpg" class="card-img-top" alt="Property 2">
                    <div class="card-body">
                        <h5 class="card-title">Cozy Apartment</h5>
                        <p class="card-text">$300,000</p>
                        <a href="{{ route('book') }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card property-card">
                    <img src="https://th.bing.com/th/id/OIP.S2snMS8VAvauydgR3EsD3AHaE8?w=1200&h=800&rs=1&pid=ImgDetMain" class="card-img-top" alt="Property 3">
                    <div class="card-body">
                        <h5 class="card-title">Luxury Villa</h5>
                        <p class="card-text">$1,200,000</p>
                        <a href="{{ route('book') }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="container my-5">
        <h2 class="text-center mb-4">About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla fermentum, ipsum eu dignissim cursus, lorem ipsum sagittis libero, vel hendrerit dolor felis id ex. Donec nec urna et lorem ullamcorper faucibus. Cras sed mi ut orci fermentum convallis sit amet nec odio.</p>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container my-5">
        <h2 class="text-center mb-4">Contact Us</h2>
        <form>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Real Estate. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QYPo3kVGhJTxFA0V/jDhsgNohHqOa9IoHoosRb9slRC5ci9hSfd7f4Ne8JDT5eJf" crossorigin="anonymous"></script>
</body>
</html>

@endsection
