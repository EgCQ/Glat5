<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link href='https://fonts.googleapis.com/css?family=Ek Mukta' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
@include('navbar.nav')
<body>
    <main class="backg">
        <section class="section1">
            <div  id="div-section1">
                <div>
                    <h2>¿Aún no tienes una cuenta?</h2>
                </div>
                <div id="div-register">
                    <a href="{{ route('register.index') }}" id="register">Registrate aquí</a>
                </div>
            </div>
        </section>

        <section>
            <div>
                <div class="div-icon-title">
                    <h2>Inicia sesion</h2>
                </div>

            </div>

            <div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('login') }}">
                    @csrf
                    <div class="div-form1">
                        <i class="fa-light fa-at iconss" ></i>
                        <input type="email" name="email" value="{{ old('email') }}" class="email" id="email" placeholder="Correo" autocomplete="on">
                        @error ('email')
                            <div class="modal-window">
                                {{$message}}
                            </div>
                        @enderror

                    </div>
                    <div class="div-form1" style="flex-wrap: nowrap">
                        <i class="fas fa-key iconss" style="transform: translate(0.7rem, 0.5rem);"></i>

                        <input type="password" id="password" name="password" placeholder="Contraseña">
                        <button id="pass_show" type="button" tooltip="Mostrar">
                            <i class="fas fa-eye icon"></i>
                        </button>
                        @error ('password')
                            <div class="modal-window">
                                {{$message}}
                            </div>
                        @enderror

                    </div>

                    <div class="div-form1">
                        <a href="{{ route('/') }}" id="btn_forgot_password">¿Olvidaste tu contraseña?</a>
                    </div>
                    @error ('message')
                        <div class="modal-window">
                            {{$message}}
                        </div>
                    @enderror
                    <div class="div-submit">
                        <button type="submit" id="submit">Ingresar</button>
                    </div>
                    
                </form>
            </div>
                
            
        </section>
        <br><br><br><br><br>

    </main>
    <script>
        let user = document.getElementById("email").value;
        var btn_submit = document.getElementById("submit");
        var btn_show_pass = document.getElementById("pass_show");

        var cambio = document.getElementById("password");
		btn_show_pass.addEventListener("click", show_pass);
        function show_pass() {
            if(cambio.type == "password"){
			    cambio.type = "text";
			    $('.icon').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
                
                btn_show_pass.setAttribute("tooltip", "Esconder");

            }else{
                cambio.type = "password";
                $('.icon').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
                btn_show_pass.setAttribute("tooltip", "Mostrar");

            }
        }

        
    </script>
</body>
</html>