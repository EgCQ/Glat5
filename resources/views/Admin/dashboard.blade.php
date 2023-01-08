@extends('layouts.app')

@section('title', 'Dashboard - Publica una noticia')

@section('css')

<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@endsection



@section('nav')
    @extends('layouts.navigation')
@endsection


@section('content')
    <main>

        <section class="w-100">
            @if (session('success'))

                <div class="modal-window bg-success modal_success  w-25" id="modal_window1">

                        <button type="button" style="" class="btn btn-danger close" onclick="closeSuccess()" id="modal_button1">×</button>
                        <div style="display: flex; justify-content:flex-start;" class="w-50">
                            <strong style="color: white;">  {{ session('success') }} </strong>
                        </div>

                </div>
            @endif

            @if ($errors->any())

                <div class="modal-window bg-danger w-50" id="modal_window">
                    <ul>
                        <li style="font-size: 30px; color: white;">
                            <h5 style="font-weight: bold;">Favor llenar</h5 >
                        </li>
                        @foreach ($errors->all() as $error)
                            <li style="font-size: 20px;">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn btn-light close" onclick='closeWindow()' id="modal_button">
                        Entiendo
                    </button>
                </div>
            @endif
                <div class="textarea" id="txtarea">
                    <div class="h4">
                        <div id="divh4">
                            <h4>
                                Publicar algo
                            </h4>
                        </div>
                        <div id="hola" hidden>
                            <form  method="POST" enctype="multipart/form-data" action="{{route('create_notices')}}">
                                @csrf
                                <div class="divinput">
                                    <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" placeholder="Escribe un titulo">
                                </div>
                                <div class="divtextarea">
                                    <textarea  name="mensaje" class="txtarea" id="mensaje" value="{{ old('mensaje') }}" placeholder="Escribenos un mensaje" maxlength="250">{{old('mensaje')}}</textarea>
                                    <div class="max_caracteres">
                                        <span>Máximo 250 caracteres *</span>
                                        <span id="resultado"></span>
                                    </div>
                                </div>
                                <div class="custom-file ">
                                    <input id="uploadImage1" type="file" class="form-control" name="archivos" onchange="previewImage(1);" />
                                    <a href="" target="__blank">
                                        <img id="uploadPreview1" width="150" height="150" />
                                    </a>
                                </div>

                                <div class="buttons">
                                    <button type="submit" class="btn btn-success" style="height: fit-content;" id="pub">Publicar noticia</button>
                                    <button type="reset" class="btn btn-danger" id="can">Cancelar</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                        
                </div>
                <div class="w-75" style="margin-left: auto; margin-right: auto; ">
                    @foreach ($notice as $notices)
                    <article class="bg-white" style="margin-bottom: 1rem;">
                        <div class="diva form-control">
                            <div class="d-flex  mb-2 form-control" style="justify-content: space-between;">
                                <div class="px-4 py-2">
                                    <h2>
                                        <b>
                                            {{ $notices->titulo }}
                                        </b> 
                                    </h2>

                                </div>
                                <div class="d-flex px-2">
                                    <a href="{{ route('view_notice', ['id' => $notices->id]) }}" class="btn btn-info w-100 mx-4" style="" >
                                        <i class="fa-regular fas fa-circle-info text-white"></i>                                        
                                        <br>
                                        Ver 
                                    </a>
                                    <form method="POST" action="{{ route('notice_deleted', $notices->id) }}">
                                        @csrf

                                        <button type="submit" id="eliminar" class="btn btn-danger w-100">
                                            <i class="fa-regular fas fa-trash" aria-hidden="true"></i>
                                            <br>
                                            Eliminar
                                        </button>
                                        
                                    </form>
                                </div>


                            </div>
                            <div class="d-flex w-100 form-control" style="justify-content: space-between;">
                                <div class="w-100 px-4 py-2" style="border-right: 1px solid gray;">
                                    <h5>{{ $notices->mensaje }}</h5>
                                </div>
                                <div class="div_archivos py-2">
                                    <h3><b>Archivos</b></h3>
                                    <a href="img/notices/{{ $notices->archivos }}" class="a_img" style="display: block;" target="__blank">
                                            {{ $notices->archivos }}
                                        <img src="img/notices/{{ $notices->archivos}}" style="width: 100%; height: 25vh;">
                                    </a>
                                </div>  
                            </div>

                            <div class="px-4 pb-4">
                                <h4 class="px-2">
                                    Publicado: {{ $notices->created_at->format('d / m / Y')}}
                                </h4>
                            </div>
                        </div>
                    </article>

                    @endforeach                
                </div>
        </section>
        
    </main>
@endsection
@section('js')   
    <script src="{{ asset('js/dashboard_admin.js ') }}"></script>

@endsection