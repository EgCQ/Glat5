<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Gelato</title>
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
                    <h2>¿Ya estas registrado?</h2>
                </div>
                <div id="div-register">
                    <a href="{{ route('login') }}">Inicia sesión aquí</a>
                </div>
            </div>
        </section>
        <section>
            <div>
                <div class="div-icon-title">
                    <h2>Registrate</h2>
                </div>

            </div>

            <div>
                <form method="POST" id="formulario" enctype="multipart/form-data" action="{{ route('register.store') }}">
                    @csrf
                    <div class="div-form1">
                        <i class="fas iconss2 fa-user"></i>
                            <input type="text" name="name" class="name" id="name" value="{{old('name')}}" placeholder="Nombres" autocomplete="none">
                            @error ('name')
                            <div class="modal-window">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="div-form1">
                        <i class="fa-light fas iconss2 fa-at"></i>

                            <input type="text" name="email" class="email" id="email" value="{{old('email')}}" placeholder="Correo" autocomplete="none">
                            @error ('email')
                            <div class="modal-window">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="div-form-pass">
                        <div class="div-form2" style="padding-right: 0.5rem;">
                            <i class="fas iconss2 fa-key"></i>

                            <input type="password" id="password" name="password" placeholder="Contraseña">
                            <button id="pass_show" type="button">
                                <i class="fas fa-eye-slash icon"></i>
                            </button>
                        </div>
                        <div class="div-form2" style="padding-left: 0.5rem;">
                            <i class="fa-light fas iconss2 fa-check"></i>
                            <input type="password" id="confirmation" name="confirmation" placeholder="Confirme su contraseña">
                            <button id="pass_show_confirmation" type="button">
                                <i class="fas  fa-eye-slash icon2"></i>
                            </button>
                        </div>
                        <input type="hidden" name="slug" id="slug">
                        @error ('password')
                        <div class="modal-window">
                            {{$message}}
                        </div>
                    @enderror
                    </div>

                    <div class="div-submit">
                        <button type="submit" id="submit">Registrarse</button>
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
        var show_pass_confirmation = document.getElementById("pass_show_confirmation");

        var cambio = document.getElementById("password");
        var confirmation = document.getElementById("confirmation");

		btn_show_pass.addEventListener("click", show_pass);
        show_pass_confirmation.addEventListener("click", confirmation_pass);

        function show_pass() {
            if(cambio.type == "password"){
			    cambio.type = "text";
			    $('.icon').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
            }else{
                cambio.type = "password";
                $('.icon').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
            }
        }

        function confirmation_pass() {
            if(confirmation.type == "password"){
			    confirmation.type = "text";
			    $('.icon2').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
            }else{
                confirmation.type = "password";
                $('.icon2').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
            }
        }

        
    </script>
</body>
</html>