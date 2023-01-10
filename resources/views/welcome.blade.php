<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gelato Five</title> 
    </head>
    <body class="d-flex">

        @include('navbar.nav')
        <section class="d-flex w-100 h-100" style="justify-content: center; align-items: center;">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="img/other/img1.jpg" class="d-block" style="background-size: cover;" alt="img1">
                    <h1>Bienvenido a Gelato</h1>
                  </div>
                  <div class="carousel-item">
                    <img src="img/other/img2.jpg" class="d-block" style="background-size: cover;" alt="img2">
                    <h1>
                        Conoce acerca de lasnovedades de esta semana
                    </h1>
                  </div>
                  <div class="carousel-item">
                    <img src="img/other/img3.jpg" class="d-block" style="background-size: cover;" alt="img3">
                    <h1>
                        Deseas formar parte de nuestro equipo, inscribete aquí!
                    </h1>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">&larr;</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">&#8594;</span>
                </button>
            </div>
    
        </section>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</html>

