<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/contactos.css') }}">
    <script src="js/nav.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Contactos</title>

</head>
<body>
    <main>
        @include('navbar.nav')

        <div class="main2">
        <section class="in-flexs">
            <article>
                <div>
                    <h2 class="h2_form">Nos encontramos en distintos distritos del pais de Ecuador</h2>
                </div>
            </article>
            <article class="article">
                <div>
                    <h3 class="h3_form">Norte</h3>
                </div>
                <div>
                    <ul>
                        <li>
                            Urdesa
                        </li>
                        <li>
                            La Garzota
                        </li>
                        <li>
                            Atarazana
                        </li>
                    </ul>
                </div>
            </article>
            <article class="article">
                <div>
                    <h3 class="h3_form">Centro</h3>
                </div>
                <div>
                    <ul>
                        <li>
                            9 de Octubre
                        </li>
                    </ul>
                </div>
            </article>
            <article class="article">
                <div>
                    <h3 class="h3_form">Sur</h3>
                </div>
                <div>
                    <ul>
                        <li>
                            Guasmo
                        </li>
                        <li>
                            Pradera 1
                        </li>
                    </ul>
                </div>
            </article>

        </section>
        <aside class="in-flexs">
            <form action="{{ route('contactos.mail_sended') }}" id="formulario" method="post">
                @csrf
                @if ($errors->any())
                    <div class="modal-window" id="modal_window">
                        <ul>
                            <li style="list-style: square !important; font-size: 30px; color: white;">
                                <h5 style="font-weight: bold;">Favor llenar</h5 >
                            </li>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="modal-button" id="modal_button">
                            Entiendo
                        </button>
                    </div>
                @endif
             
                <div>
                    <h2 class="h2_form">
                        ¡Envianos un correo con cualquier inquietud que tengas!
                    </h2>
                </div>
                <div class="div-inputs">
                    <i class="fa-light fas fa-user iconss"></i>
                    <input type="text" id="nombre" name="nombre" maxlength="45" class="input_Form" value="{{old('nombre')}}" placeholder="Tus nombres" autocomplete="off">

                </div>
                <div class="div-inputs">
                    <i class="fa-solid fa-envelope iconss"></i>
                    <input type="email" id="correo" name="correo" class="input_Form" value="{{old('correo')}}" placeholder="Tu correo" autocomplete="off">
                    
                    <div id="div_span">
                        <span>Ejemplo: Example@gmail / hotmail / outlook </span>
                        <span></span>
                        <span>.com *</span>

                    </div>
                </div>
                
                <div class="div-inputs div-mensaje">
                    <i class="fas fa-light fa-message iconss message" id="message"></i>
                    <textarea  name="mensaje"  id="mensaje" placeholder="Escribenos un mensaje" maxlength="350">{{old('mensaje')}}</textarea>
                    <br>
                    <div id="div_span">
                        <span>Máximo 250 caracteres *</span>

                        <span id="resultado"></span>

                    </div>

                </div>

                <div class="flex">
                    <button type="submit">Enviar correo</button>
                </div>
                @if (session('success'))
                <div class="alert alert-success alert-block modal_success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong> {{ session('success') }} </strong>
                </div>
            @endif
            </form>


        </aside>
        </div>
        
    </main>
    <script>
        var mensaje = document.getElementById("mensaje");
        var modal_window = document.getElementById("modal_window");

        var modal_button = document.getElementById("modal_button");

        var resultado = document.getElementById("resultado");
        var limit = 350;
        resultado.textContent = 0 + " / " + limit;
        
        mensaje.addEventListener("input", function () {
            var textLength = mensaje.value.length;
            resultado.textContent = textLength + " / " + limit;
            if (textLength == limit) {
                mensaje.style.borderTop = "1px solid red";
                mensaje.style.borderBottom = "1px solid red";
                mensaje.style.borderRight = "1px solid red";
                mensaje.style.borderLeft = "1px solid red";
                mensaje.style.animation = "shake 300ms";

                mensaje.style.paddingLeft = "0.5rem";

                mensaje.style.outlineColor = "red";
                resultado.style.color = "red";
            }
            else{
                mensaje.style.outlineColor = "black";
                mensaje.style.borderTop = "none";
                mensaje.style.borderBottom = "none";
                mensaje.style.borderRight = "none";
                mensaje.style.borderLeft = "none";
                resultado.style.color = "black";
                mensaje.style.paddingLeft = "0.5rem";
                mensaje.style.animation = "none";

            }
        })
        modal_button.addEventListener("click", closeModalWindow)
        function closeModalWindow() {
            modal_window.classList.add("close_modal_window");
        }
    </script>

</body>

</html>