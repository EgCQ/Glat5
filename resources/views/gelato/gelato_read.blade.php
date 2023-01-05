<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresa aqui</title>
    <link rel="stylesheet" href="{{ asset('css/css1.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link href='https://fonts.googleapis.com/css?family=Ek Mukta' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>

</head>
<body>
<main class="backg">
        <section class="section1">

            <div class="img" style="background-image: url('/img/post/{{$gelato->foto_perfil}}')">
            </div>
            <div>
                <label for="" class="label">Nombre</label>
                <p>{{ $gelato->nombre }}</p>
            </div>
            <div>
                <label for="" class="label">Color</label>
                <p>{{ $gelato->color }}</p>
            </div>
            <div>
                <label for="" class="label">Lema</label>
                <p>{{ $gelato->lema }}</p>
            </div>
            <div>
                <label for="" class="label">Localizacion</label><br>
                <div class="iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3986.7296611407146!2d-79.88802008524466!3d-2.254623798356697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMsKwMTUnMTYuNyJTIDc5wrA1MycwOS4wIlc!5e0!3m2!1ses!2sec!4v1666893374516!5m2!1ses!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
        <section>
            <div>
                <div>
                    <h2 class="div-icon-title">
                    <i class="fa fa-user"></i>                    

                    Educación</h2>
                </div>
                <div >
                    <p class="div-p">Bachillerato en ciencias de la República del Ecuador <br>Unidad Educativa Fiscal Vicente Rocafuerte.</p>
                    <p class="div-p" style="padding-top: 0.2rem;">Estudiante de la carrera Ingeniería en computación <br>Escuela Superior Politecnica del Litoral</p>
                </div>
            </div>

            <div >
                <div>
                    <h2 class="div-icon-title">
                    <i class="fa fa-briefcase"></i>

                    Habilidades</h2>
                </div>
                <div style="display: flex; flex-wrap: wrap; justify-content: space-evenly; margin-left: 3rem; margin-right: 3rem;">
                    <div class="div-skills">
                        <label for="contactame">Java

                        </label>
                    </div>
                    <div class="div-skills">
                        <label for="contactame">HTML 5

                        </label>
                    </div>
                    <div class="div-skills">
                        <label for="contactame">CSS 3

                        </label>
                    </div>
                    <div class="div-skills">
                        <label for="contactame">Rust

                        </label>
                    </div>
                    <div class="div-skills">
                        <label for="contactame">C

                        </label>
                    </div>
                </div>
                
            </div>
            <div>
                <div>
                    <h2 class="div-icon-title">
                    <i class="fa fa-language"></i>
                    Idiomas</h2>
                </div>
                <div>
                    <p style="font-weight: bold;" class="div-p">
                        Ingles B2
                    </p>
                </div>
            </div>

            <div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('login') }}">
                @csrf
                <div class="div-form">
                    <label for="contactame">Contactame</label>
                </div>
                <div style="display: flex !important; flex-wrap: wrap;">
                    <div class="div-form2">
                        <label style="color: white; ">Nombre</label>
                    </div>
                    <div style="margin-left: 2rem; margin-top: 0.2rem !important;">
                        <input type="text" id="name" name="name">
                    </div>
                </div>
                <div style="display: flex !important; flex-wrap: wrap;">
                    <div class="div-form2">
                        <label for="email" style="color: white;">Email</label>
                    </div>
                    <div style="margin-left: 2rem; margin-top: 0.2rem !important;">
                        <input type="text" name="email">
                    </div>
                </div>
                <div style="display: flex !important; flex-wrap: wrap;">
                    <div class="div-form2">
                        <label for="message" style="color: white;">Mensaje</label><br>
                    </div>
                    <textarea style="margin-left: 2rem; margin-top: 0.2rem !important;"></textarea>
                </div>
                <div>
                    <button type="submit">Enviar</button>
                </div>
                
            </form>
            </div>
                
            
        </section>
        <br><br><br><br><br>

    </main>
</body>
</html>