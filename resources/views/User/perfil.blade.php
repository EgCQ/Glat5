@extends('layouts.app')

@section('title', 'Pedidos')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pedidos.css') }}">

@endsection

@section('js')   
@endsection

@section('nav')
    @extends('layouts.navigation_usuario')
@endsection

@section('content')
<main class="w-100 d-flex" id="pedidos" style="height:calc(100vh-100px) !important; justify-content: center; flex-wrap: wrap;">
        <div class="w-75 d-flex p-2" style="">
            <a href="{{ route('home') }}" class="btn btn-success d-flex" style="width: 50px; height: 50px; align-items: center;" tooltip="Volver">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h3 class="px-2 pt-2">
                <b>Regresar</b>
            </h3>
        
        </div>
        <section class="w-75 bg-white asides" style="max-height: 75vh;">
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
    

@endsection