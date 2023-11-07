<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/icon.jpg" sizes="16x16" type="image/jpg">
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
        <title>Bienvenido</title>
        <style>
          .carousel-item::before{
            position: absolute;
            content: '' !important;
            top: 0 !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            background-color: rgba(0,0,0, .65) !important;
          }
            .celdas:hover{
                background-color: gray !important;
                cursor: pointer;
            }
            .bg-blue{
                background-color: blue !important;
            }
            .transition{
                transition: all 0.5s;
                animation: down 0.5s;
            }
            @keyframes down {
                0%{
                    transform: translate-y(10rem);
                }
                100%{

                }
            }
            /* @keyframes up {

            } */
        </style>
    </head>
    <body class="" style="flex-direction: column">

      @include('navbar.nav')
      <main class="d-flex w-100" id="mains" style="justify-content: center; align-items: center; height:calc(90vh-100px); margin-top:0.5rem;">
        {{-- <div id="carouselExampleIndicators" class="carousel slide w-100 h-100" data-bs-ride="true">
            <div class="carousel-indicators" style="z-index: 1 !important;">
                <button type="button" style="z-index: 0 !important;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" style="z-index: 0 !important;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" style="z-index: 0 !important;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner h-50" style="">
                <div class="carousel-item active" style=";background-image: url('img/other/img1.jpg'); width: 100%; height: 75vh; background-repeat:no-repeat; background-size: cover;background-position: center;">
                    <div class="d-flex h-100" style="flex-wrap: wrap;width:50%; margin-left:auto;margin-right:auto; justify-content:flex-start; align-content: center; z-index: 0 !important;">
                        <h1 style="display:flex; z-index: 0 !important; color: white;">Conoce acerca de las novedades de esta semana.</h1>
                        <div class="d-flex w-100" style="">
                            <a href="{{ route('noticias_gelato') }}" class="btn btn-primary w-25" style=" z-index: 0 !important; color:white;">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('img/other/img2.jpg'); width: 100%; height: 75vh; background-repeat:no-repeat; background-size: cover;background-position: center;">
                    <div class="d-flex h-100" style="flex-wrap: wrap;width:50%; margin-left:auto; margin-right:auto; justify-content:flex-start; align-content: center; z-index: 0 !important;">
                        <h1 style="display:flex; z-index: 0 !important; color: white;">Haznos saber tu opinion!</h1>
                        <div class="d-flex w-100" style="">
                            <a href="{{ route('contactos.contacto') }}" class="btn btn-success w-25" style=" z-index: 0 !important; color:white;">Escribenos</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('img/other/img3.jpg'); width: 100%; height: 75vh; background-repeat:no-repeat; background-size: cover;background-position: center;">
                    <div class="d-flex h-100" style="flex-wrap: wrap;width:50%; margin-left:auto;margin-right:auto; justify-content:flex-start; align-content: center; z-index: 0 !important;">
                        <h1 style="display:flex; z-index: 0 !important; color: white;">
                        ¿Te gustaría formar parte de nuestro equipo? <br> Inscribete aquí!
                        </h1>
                        <div class="d-flex w-100" style="">
                            <a href="{{ route('register.index') }}" class="btn btn-dark w-25" style=" z-index: 0 !important; color:white;">Inscribirme</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" style="color: white !important; width: 0 important!; z-index: 0 !important;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <i class="fa-solid fa-chevron-left" style="font-size: 40px;"></i>
            </button>
            <button class="carousel-control-next" style="font-size: 40px; color: white !important; width: 0 important!; z-index: 0 !important;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div> --}}
        <div id="table_extern" style="width: 40%; height:50vh; background-color:rgba(255, 0, 0, 0.363); display:flex; justify-content:center; align-items:center;">
            <div id="table">
                <div id="table2">
                </div>
                <button id="btn_start"  class="btn btn-primary" type="button">Presiona aqui</button>
            </div>
            <div class="modal_window border border-dark d-none">
                <div>
                    <h3>¿Empezar juego?</h3>
                </div>
                <div class="d-flex" style="justify-content: space-evenly;">
                    <button class="btn btn-success" id="yes">Si</button>
                    <button class="btn btn-danger" id="no">No</button>
                </div>
            </div>
        </div>
      </main>
      <script src="js/welcome.js"></script>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</html>

