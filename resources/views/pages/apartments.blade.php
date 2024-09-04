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

  <!-- =======================================================
  * Template Name: EstateAgency
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Updated: Aug 09 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="property-single-page">

  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    </div>
  </header>

  <main class="main">

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
    </div><!-- End Page Title -->

    <!-- Real Estate 2 Section -->
    <section id="real-estate-2" class="real-estate-2 section">

      <div class="container" data-aos="fade-up">

        <div class="portfolio-details-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">

            <div class="swiper-slide">
              <img src="assets/img/property-slide/property-slide-1.jpg" alt="">
            </div>

            <div class="swiper-slide">
              <img src="assets/img/property-slide/property-slide-2.jpg" alt="">
            </div>

            <div class="swiper-slide">
              <img src="assets/img/property-slide/property-slide-3.jpg" alt="">
            </div>

          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
        </div>

        <div>
            <div>
                <p>Doral, Florida</p>
                <h2><span>204</span> Olive Road Two</h2>
                <a href="{{ route('booking') }}" class="btn btn-primary">Book Now</a>
                <a href="{{ route('cadogan') }}" class="btn btn-primary">View More</a>
              </div>

        </div>

        <div>
            <section id="real-estate-2" class="real-estate-2 section">

                <div class="container" data-aos="fade-up">

                  <div class="portfolio-details-slider swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                      {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                          "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "navigation": {
                          "nextEl": ".swiper-button-next",
                          "prevEl": ".swiper-button-prev"
                        },
                        "pagination": {
                          "el": ".swiper-pagination",
                          "type": "bullets",
                          "clickable": true
                        }
                      }
                    </script>
                    <div class="swiper-wrapper align-items-center">

                      <div class="swiper-slide">
                        <img src="assets/img/property-slide/property-slide-4.jpg" alt="">
                      </div>

                      <div class="swiper-slide">
                        <img src="assets/img/property-slide/property-slide-4.jpg" alt="">
                      </div>

                      <div class="swiper-slide">
                        <img src="assets/img/property-slide/property-slide-6.jpg" alt="">
                      </div>

                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                  </div>

                  <div>
                      <div>
                          <p>Doral, Florida</p>
                          <h2><span>204</span> Olive Road Two</h2>
                          <a href="{{ route('booking')}}" class="btn btn-primary">Book Now</a>
                          <a href="{{ route('milverton') }}" class="btn btn-primary">View More</a>
                        </div>
                  </div>

        <div>
            <section id="real-estate-2" class="real-estate-2 section">

                <div class="container" data-aos="fade-up">

                  <div class="portfolio-details-slider swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                      {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                          "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "navigation": {
                          "nextEl": ".swiper-button-next",
                          "prevEl": ".swiper-button-prev"
                        },
                        "pagination": {
                          "el": ".swiper-pagination",
                          "type": "bullets",
                          "clickable": true
                        }
                      }
                    </script>
                    <div class="swiper-wrapper align-items-center">

                      <div class="swiper-slide">
                        <img src="assets/img/property-slide/property-slide-7.jpg" alt="">
                      </div>

                      <div class="swiper-slide">
                        <img src="assets/img/property-slide/property-slide-8.jpg" alt="">
                      </div>

                      <div class="swiper-slide">
                        <img src="assets/img/property-slide/property-slide-9.jpg" alt="">
                      </div>

                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                  </div>

                  <div>
                      <div>
                          <p>Doral, Florida</p>
                          <h2><span>204</span> Olive Road Two</h2>
                          <a href="{{ route('booking')}}" class="btn btn-primary">Book Now</a>
                          <a href="{{ route('victory.park') }}" class="btn btn-primary">View More</a>
                        </div>
                  </div>

        </div>

        <div class="row justify-content-between gy-4 mt-4">
          <div class="col-lg-8" data-aos="fade-up">
          </div>
        </div>
      </div>
    </section><!-- /Real Estate 2 Section -->

    <div>

    </div>
  </main>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

@endsection
