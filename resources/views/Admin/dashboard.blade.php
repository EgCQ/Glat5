@extends('layouts.app')

@section('title', 'Dashboard - Publica una noticia')

@section('css')

<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@endsection


@section('nav')
    @extends('layouts.navigation')
@endsection


@section('content')
    <main style="height:calc(100vh-100px)" id="app">
        <div hidden class="w-50 modal-window"  style="transform: translate(-50%, -100%); border-radius: 50px; height:0%;" id="div_h4">
            <div class="bg-secondary div_h4_2">
                <div style="padding-left:2rem; padding-top:1rem">
                    <h3>
                        Editar noticia
                    </h3>
                </div>
                <div id="hola2">
                    <form action="" enctype="multipart/form-data" id="form" method="post">
                        @csrf

                        <div >
                            <div class="divinput">
                                <h3 style="margin-right: 1rem;margin-left: 1rem; margin-top:0.5rem">
                                    <i class="fa-sharp fa-solid fa-t" ></i>
                                </h3>
                                <input type="text" name="titulo2"  id="titulo2" :value="formData . titulo" style="margin-right: 1rem;" placeholder="Escribe un titulo">
                            </div>
                            <div class="divtextarea" style="flex-wrap: nowrap !important">
                                <h5 style="margin-right: 1rem; margin-left: 1rem; margin-top:0.5rem">
                                    <i class="fa-thin fas fa-message"></i>
                                </h5>
                                <div class="w-100" style="margin-right: 1rem">
                                    <textarea  name="mensaje2" class="txtarea w-100" id="mensaje2" :value="formData . mensaje" placeholder="Escribenos un mensaje" maxlength="250">{{old('mensaje')}}</textarea>
                                    <div class="max_caracteres" style=" justify-content: space-between; margin-left:0rem !important; margin-top: 0rem !important; align-items:center">
                                        <span>Máximo 250 caracteres *</span>
                                        <span id="resultado2"></span>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex">
                                    <h5 style="margin-right: 1rem; margin-left: 1rem; margin-top:0.5rem">
                                        <i class="fa-solid fa-folder-open"></i>
                                    </h5>
                                <div class="custom-file" style="margin-right: 1rem">

                                    <input type="file" class="form-control" id="uploadImage1" name="archivo" onchange="previewImage2(1);"/>
                                    <a href="" target="__blank" class="s_file" style="margin-left: 0.5rem; margin-right:0.5rem; width: 20% !important;">
                                        <img v-bind:src="'/img/notices/' + formData.archivos" id="uploadPreview1" width="100" height="100" alt="">
                                    </a>
                                </div>


                            </div>

                            <div class="buttons">
                                <button type="submit" class="btn btn-success btn_c" style="height: fit-content;" id="pub">Editar noticia</button>
                                <button type="reset" class="btn btn-danger btn_c" style="height: 7vh; border-radius:25px !important; border:1px solid grey; font-size:23px !important;" id="can2">Cancelar</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>


        </div>
        <section class="w-100" style="height:calc(100vh-100px)">
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
                                    <input id="uploadImages1" type="file" class="form-control" name="archivos" onchange="previewImage(1);" />
                                    <a href="" target="__blank" style="margin-left: 0.5rem; margin-right:0.5rem; width: 20% !important;">
                                        <img id="uploadPreviews1" width="100" height="100" />
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
                <div class="w-75 div_notices" id="noticia" style="margin-left: auto; margin-right: auto;" v-for="notices in listProductos">
                    <article class="bg-white" style="margin-bottom: 1rem;">
                        <div class="diva form-control">
                            <div class="d-flex  mb-2 form-control" id="div_title2" style="justify-content: space-between;flex-wrap: wrap">
                                <div class="py-2">
                                    <h2>
                                        <b>
                                            @{{ notices.titulo }}
                                        </b>
                                    </h2>
                                </div>
                                <div class="d-flex px-2">

                                    <button type="button" class="btn btn-info w-100 mx-4" v-on:click="getNotice(notices)">
                                        <i class="fa-regular fas fa-circle-info text-white"></i>
                                        <br>
                                        Ver
                                    </button>

                                </div>


                            </div>
                            <div class="d-flex w-100 form-control" id="div_mensaje" style="justify-content: center;flex-wrap: nowrap">
                                <div class="w-100 py-2" style="border-right: 1px solid gray;">
                                    <h5>@{{ notices.mensaje }}</h5>
                                </div>
                                <div class="py-2" id="div_archivos">
                                    <a :href="'/img/notices/' + notices.archivos"  class="a_img w-100 d-flex" style="flex-direction:column;" target="__blank">
                                            @{{ notices . archivos }}
                                        <img v-bind:src="'/img/notices/' + notices.archivos" style="width: 75%; height: 25vh;">
                                    </a>
                                </div>
                            </div>

                            <div class="pb-4 px-2">
                                <h4 class="" style="word-wrap: break-word;">
                                    Publicado: @{{ notices . created_at }}
                                </h4>
                            </div>
                        </div>
                    </article>

                </div>


        </section>


    </main>

    <script>


        var app = new Vue({
            el: '#app',
            data: {
                listProductos: [

                ],
                formData: {
                },
                notice: {},
                notices:[],
            },
            methods: {
                ver: function() {
                    this.getNotice();
                },
                    getNotice: function(notices) {

                    var div_h4 = document.getElementById("div_h4");
                    var div_notices = document.querySelectorAll(".div_notices");
                    div_h4.hidden = false;
                    var url = "http://127.0.0.1:8000/home/"+notices.id;
                    fetch(url)
                        .then(function(response) {
                            return response.json();
                        })
                        .then((response) => {
                            this.formData = response;
                            console.log(this.formData);
                        });

                        var ah = document.getElementById("form").setAttribute("action", "http://127.0.0.1:8000/notice_updated/"+notices.id);
                        cancelar2.addEventListener('click', hideMessage2);
                        function hideMessage2() {
                            div_h4.hidden = true;
                            div_h4.style.zIndex="1";
                            var ah = document.getElementById("uploadPreview1").setAttribute("src", "/img/notices/" + notices.archivos);
                        }
                },
                viewAll: function() {
                    var url = "http://127.0.0.1:8000/view_all_notices";


                    fetch(url)
                        .then(function(response) {
                            return response.json();
                        })
                        .then((response) => {
                            this.listProductos = response;
                        });
                },
                postListProductos: function(id) {
                    var url = "http://127.0.0.1:8000/notice_updated/"+id;

                    axios
                        .post(url, this.formData)
                        .then((response) => {
                            console.log(response.data);
                        })
                        .catch((error) => {
                            console.log("error: " + error);
                        });

                },

            },
            created: function() {
                // `this` hace referencia a la instancia vm
                this.viewAll();

            },
        });

    </script>
        <script src="{{ asset('js/dashboard_admin.js') }}"></script>

@endsection

