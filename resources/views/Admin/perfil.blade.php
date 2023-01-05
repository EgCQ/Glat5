<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://kit.fontawesome.com/fff244fd4f.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        main{
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 1400px;
            margin-right: auto;
            margin-left: auto;
        }
        main section{
            margin-top: 5rem;
            width: 65%;
            height: 75vh;
        }
        .div-title{
            width: 100%;
            margin-left: 5rem;
            padding-top: 2rem;
        }
        .div-title div h2{
            font-weight: bold;
        }
        
        @media only screen and (max-width: 1160px) {
            .div-title {
                width: 100%;
                display: flex;
                margin-left: 0;

                justify-content: center;
            }
        }

        .flex1{
            display: flex;
            width: 100%;
            margin-top: 2rem;
            margin-bottom: 5rem !important;
            flex-wrap: wrap;
            justify-content: center;
            height: fit-content;
        }
        .flex1 div div{
            margin-left: 2rem;
            margin-right: 2rem;
        }
        .flex1 div div label{
            font-weight: bold;
        }
        .flex1 div div input{
            width: 100%;
            box-shadow: 10px 10px 20px gray;
        }
        .flex1 div div input:focus{
            width: 100%;
            height: 7vh;
            
            outline: 1px solid gray
        }
        .div-buttons{
            border-top: 2px solid gray;
            border-top-style: dashed;
            display: flex;
            width: 100% !important;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 3rem;
        }

        .div-buttons button[type=submit], button[type=reset], #editar{
            margin: 2rem;
            width:25%;
        }
        @media only screen and (max-width: 550px) {
            .div-buttons button[type=submit], button[type=reset], #editar{
                margin: 1rem;
                width:40%;
            }
            main section div{

                padding-left: 0rem;
                padding-right: 0rem;
            }
        }
        @media only screen and (max-width: 300px) {
            .div-buttons button[type=submit], button[type=reset], #editar{
                margin: 1rem;
                width:70%;
                font-size: 24px;
            
            }

        }
    .modal_success{
        transform: translate(50%, 250%);
        z-index: 1;
        width: 50%;
        display: flex;
        align-items: center;
        animation: transform 0.4s;
    }
    @keyframes transform {
        0%{
            top: 50%;
            left: 0%;
            transform: translate(50%, 250%) scale(0.1);
        }

        0%{
            top: 50%;
            left: 0%;
            transform: translate(50%, 250%) scale(0.5);
        }

        100%{
            top: 50%;
            left: 0%;
            transform: translate(50%, 250%) scale(1);
        }
    }

    </style>
</head>
<body onload="">
    @include('layouts.navigation')
    <main>
        <section>
            <div>
                <form method="post" enctype="multipart/form-data" action="{{ route('perfil.update') }}">
                    @csrf
                    @isset($persona)
                        <input type="hidden" value="{{ $persona }}" name="id">
                    @endisset
                    <div class="bg-white rounded-lg">
                        @if (session('success'))
                            <div class="div_modal" style="height: 0px;">
                                <div class="alert alert-success alert-block modal_success">
                                    <button type="button" class="btn btn-danger close"  data-dismiss="alert">×</button>
                                    <strong style="width: 100%; display: flex; justify-content: center;"> {{ session('success') }} </strong>
                                </div>
                            </div>
                        @endif

                        <div class="div-title">
                            <div>
                                <h2>
                                    Tus datos
                                </h2>
                            </div>
                        </div>
                        <div class="flex1">

                            <div>
                                <div class="w-full">
                                    <x-label for="nombre" :value="__('Nombres')" />
                                    <input type="text" id="nombre" name="nombres"
                                        class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        value="{{ $persona->nombres }}" readonly placeholder="Escribe tus nombres"/>
                                </div>
        
                                <div class="w-full">
                                    <x-label for="telefono" :value="__('Telefono')" />
                                    <input type="text" id="telefono" name="telefono"
                                        class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        value="{{ $persona->telefono }}" readonly placeholder="Escribe tu telefono"/>
                                </div>
                                <div class="w-full">
                                    <x-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
                                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                        class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        value="{{ $persona->fecha_nacimiento }}" readonly placeholder="Escribe tu fecha de nacimiento"/>
                                </div>
                            </div>
                            <div>
                                <div class="w-full">
                                    <x-label for="apellido" :value="__('Apellidos')" />
                                    <input type="text" id="apellido" name="apellidos"
                                        class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        value="{{ $persona->apellidos }}" readonly placeholder="Escribe tus apellidos"/>
                                </div>
                                <div class="w-full">
                                    <x-label for="cedula" :value="__('Cedula')" />
                                    <input type="text" id="cedula" name="cedula"
                                        class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        value="{{ $persona->cedula }}" readonly placeholder="Escribe tu cedula"/>
                                </div>
                                <div class="w-full">
                                    <x-label for="correo" :value="__('Correo')" />
                                    <input type="email" id="correo" name="correo"
                                        class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        value="{{ $persona->correo }}" readonly placeholder="Escribe tu correo electronico"/>
                                </div>
                            </div>

                        </div>
                        <div class="div-buttons">
                                    <button type="submit" id="submit"
                                        class="btn btn-success"
                                        hidden>
                                        Guardar
                                    </button>
                                    <button type="reset" id="cancelar" onclick="changeCancelar()"
                                        class="btn btn-danger"
                                        hidden>
                                        Cancelar
                                    </button>

                                    <button type="button" id="editar" onclick="changeEdit()"
                                        class="btn btn-primary">
                                        Editar
                                    </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    
    <script>
        function changeEdit(params) {
            document.getElementById('editar').hidden = true;
            document.getElementById('submit').hidden = false;
            document.getElementById('cancelar').hidden = false;
    
            document.getElementById('nombre').readOnly = false;
            document.getElementById('telefono').readOnly = false;
            document.getElementById('fecha_nacimiento').readOnly = false;
            document.getElementById('apellido').readOnly = false;
            document.getElementById('cedula').readOnly = false;
            document.getElementById('correo').readOnly = false;

        }
    
        function changeCancelar(params) {
            document.getElementById('editar').hidden = false;
            document.getElementById('submit').hidden = true;
            document.getElementById('cancelar').hidden = true;
    
            document.getElementById('nombre').readOnly = true;
            document.getElementById('telefono').readOnly = true;
            document.getElementById('fecha_nacimiento').readOnly = true;
            document.getElementById('apellido').readOnly = true;
            document.getElementById('cedula').readOnly = true;
            document.getElementById('correo').readOnly = true;

        }
    
    </script>
    
</body>
</html>