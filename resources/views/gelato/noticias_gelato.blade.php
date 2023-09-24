<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias Gelato</title>
    <link rel="stylesheet" href="{{asset('css/noticias_gelat.css')}}">
    <script src="js/noticias_gelat.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <main>
        @include('navbar.nav')
        <section  >
            @foreach ($notice as $notices)
                {{-- @auth
                    @php
                        $user = Auth::user()->id;
                    @endphp
                @endauth --}}

                <article>

                    <div class="diva" style="margin-bottom: 1rem">
                    {{-- <div class="diva" style="margin-bottom: 1rem"> --}}
                        {{$notices->notice}}

                        <div class="div" style="justify-content: space-between">
                            <h2>{{ $notices->titulo }}</h2>
                            <div>
                                <p style="font-weight: bold">
                                    {{-- Publicado: {{ $notices->created_at->format('d-m-Y')}} --}}
                                </p>
                            </div>
                        </div>
                        <div class="div d-flex b" style="flex-wrap: wrap; justify-content:space-between; height:fit-content;">
                            <div class="notice">
                                <h5 class="">{{ $notices->mensaje }}</h5>
                            </div>
                            <div class="div a">
                                @php
                                $file = $notices->archivos;
                                $extension = pathinfo($file, PATHINFO_EXTENSION);

                                @endphp
                                @if ($extension == "jpg" or $extension == "png")
                                <a href="img/notices/{{ $notices->archivos}}" class="archivos" target="__blank">
                                    <img src="img/notices/{{ $notices->archivos}}" alt="">
                                </a>
                                @else
                                    @if ($extension == "pdf" or $extension =="txt")
                                        <a href="img/notices/{{ $notices->archivos}}" target="__blank" class="a_doc" style=";border: 1px solid black; border-radius: 15px; background-color: rgba(172, 172, 172, 0.7); color:black;">{{ $notices->titulo }} {{ $extension }}</a>



                                    @else
                                        <a href="img/notices/{{ $notices->archivos}}" target="__blank" class="a_doc" style="border: 1px solid black; border-radius: 15px; background-color: rgba(172, 172, 172, 0.7); color:black;">
                                            Descargar: {{ $notices->archivos }}
                                        </a>

                                    @endif
                                @endif

                            </div>
                        </div>
                        {{-- <div>
                            @auth --}}

                            {{-- {{ Auth::user()->id }}
                                {{-- @php
                                    $user = Auth::user()->id;
                                @endphp
                                {{ $notices->user }}
                                @if (($notices->user == $user)) --}}
                                    {{-- {{ $notices->favorite }}

                                    <form action="{{ route('favorite', $notices->notice) }}" class="form1" method="post">
                                        @csrf
                                        <input type="hidden" class="noticess" id="notices" name="notices" value="{{ $notices->notice }}">

                                        @if (($notices->favorite) == 1)
                                            <button class="btn_reacted" type="submit" id="btn_reacted">Me gusta</button>
                                        @else
                                            <button class="btn_reac" type="submit" id="btn_reac{{ $notices->notice }}" value="{{ $notices->notice }}" style="">Me gusta</button>

                                        @endif
                                    </form> --}}

                                {{-- @else --}}
                                    {{-- <form action="{{ route('remove_favorite', $notices->notice) }}" method="post">
                                        @csrf

                                        <div>
                                            <button class="btn_reacted" id="btn_reacted"  style="">Me gusta</button>
                                        </div>
                                    </form> --}}
                                {{-- @endif --}}
                            {{-- @endauth

                            <div>
                                <form action="{{route('comment_create', $notices->notice) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="notices" value="{{ $notices->notice }}">
                                    <textarea name ="message" id="message" maxlength="750" class="mensaje" id="{{ $notices->notice}}" style="width: 100%; padding:1rem; margin-top:0.2rem;" class="form-control msg" placeholder="Escribe un comentario"></textarea>
                                    <div class="d-flex" style="justify-content: space-between;">
                                        <div class="file-input-wrapper">
                                            <button  type="button" class="btn btn-default" tooltip="Añadir archivos">
                                                <i class="fa-solid fa-paperclip"></i>
                                            </button>
                                            <input type="file" name="image" id="image" value="" />
                                        </div>
                                        <button type="submit" class="btn-file-input btn btn-secondary btn_submit" tooltip="Enviar" id="{{ $notices->notice }}" style="display:none;">
                                            <i class="fa-sharp fa-solid fa-paper-plane" style="rotate: x -180deg;"></i>
                                        </button>

                                    </div>
                                </form>

                            </div>
                            <div>
                                <span>Nothing</span>
                            </div>

                            <div style="background-color: rgb(209, 209, 209)">
                                <div class="app">
                                    <button type="button" class="btn_com" style="margin-top: 0rem !important">Cargar comentarios</button>

                                    <div  style="display:flex; padding:1rem; justify-content:space-between">
                                            <div style="width:100%">
                                                <form action="{{route('comment_edit', $notices->notice)}}" method="post">
                                                    @csrf
                                                    <textarea name="" class="txtdis" id="" style="width:100%;" disabled>{{ $notices->message }}</textarea>
                                                    <div style="display:flex; justify-content:flex-end;">
                                                        <button type="submit" class="btn-file-input btn btn-secondary btn_submit_editar" tooltip="Enviar" style="display: none;">
                                                            <i class="fa-sharp fa-solid fa-paper-plane" style="rotate: x -180deg;"></i>
                                                        </button>
                                                    </div>

                                                </form>

                                            </div>


                                        <div>
                                            <button class="btn_config btn btn-secondary" onmouseup="mouseUp()"><i class="fa-solid fa-bars"></i></button>
                                            <div style="display:none; flex-direction:column" class="div_config">
                                                <button class="btn btn-primary ed" id="{{ $notices->notice}}" type="button">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                                <button class="btn btn-danger el">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </article>

            @endforeach
        </section>

    </main> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                        <div>
                            @auth

                                {{ $notices->favorite }}

                                <form method="POST" class="form_reaccion">

                                    <input type="hidden" class="noticess" id="notices" name="notices" value="{{ $notices->notice }}">
                                    @if (($notices->favorite) == 1)
                                        <button class="btn_reacted btn_favorite" type="button" id="btn_favorite">Me gusta</button>
                                    @else
                                        <button class="btn_reac btn_favorite" type="button" id="btn_favorite">Me gusta</button>

                                    @endif
                                </form>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                            @endauth
                            <div>
                                <form action="{{route('comment_create', $notices->notice) }}" class="form_create_comment" method="post">
                                    @csrf
                                    <input type="hidden" name="notices" value="{{ $notices->notice }}">
                                    <textarea name ="message" id="message" maxlength="750" class="mensaje" id="{{ $notices->notice}}" style="width: 100%; padding:1rem; margin-top:0.2rem;" class="form-control msg" placeholder="Escribe un comentario"></textarea>
                                    <div class="d-flex" style="justify-content: space-between;">
                                        <div class="file-input-wrapper">
                                            <button  type="button" class="btn btn-default" tooltip="Añadir archivos">
                                                <i class="fa-solid fa-paperclip"></i>
                                            </button>
                                            <input type="file" name="image" id="image" value="" />
                                        </div>
                                        <button type="submit" class="btn-file-input btn btn-secondary btn_submit" tooltip="Enviar" id="{{ $notices->notice }}" style="display:none;">
                                            <i class="fa-sharp fa-solid fa-paper-plane" style="rotate: x -180deg;"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <span>Nothing</span>
                            </div>

                            <div style="background-color: rgb(209, 209, 209)">
                                <div class="app">
                                    <button type="button" class="btn_com" style="margin-top: 0rem !important">Cargar comentarios</button>

                                    <div  style="display:flex; padding:1rem; justify-content:space-between">
                                            <div style="width:100%">
                                                <form action="{{route('comment_edit', $notices->notice)}}" class="form_edit_comment" method="post">
                                                    @csrf
                                                    <textarea name="" class="txtdis" id="" style="width:100%;" disabled>{{ $notices->message }}</textarea>
                                                    <div style="display:flex; justify-content:flex-end;">
                                                        <button type="submit" class="btn-file-input btn btn-secondary btn_submit_editar" tooltip="Enviar" style="display: none;">
                                                            <i class="fa-sharp fa-solid fa-paper-plane" style="rotate: x -180deg;"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        <div>
                                            <button class="btn_config btn btn-secondary" onmouseup="mouseUp()"><i class="fa-solid fa-bars"></i></button>
                                            <div style="display:none; flex-direction:column" class="div_config">
                                                <button class="btn btn-primary ed" id="{{ $notices->notice}}" type="button">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                                <button class="btn btn-danger el">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </article>

            @endforeach
        </section>

    </main>
    <script>

        var btn_config = document.querySelectorAll('.btn_config');
        var div_config = document.querySelectorAll('.div_config');
        var btn_reac = document.querySelectorAll('.btn_reac');
        var user = document.querySelectorAll('.user');
        var btn_com = document.querySelectorAll('.btn_com');
        var app = document.querySelectorAll('.app');
        var editar = document.querySelectorAll(".ed");
        var eliminar = document.querySelectorAll(".el");
        var txtdis = document.querySelectorAll(".txtdis");


        var btn_reacted = document.querySelectorAll('.btn_reacted');

        var mensaje = document.querySelectorAll('.mensaje');
        var btn_submit = document.querySelectorAll('.btn_submit');
        var btn_submit_editar = document.querySelectorAll('.btn_submit_editar');

        var limit = 1;
        //var resultado = document.getElementById("resultado");

        //resultado.textContent = 0 + " / " + limit;
        for (let i = 0; i < mensaje.length; i++) {
            const element = mensaje[i];
            const element2 = btn_submit[i];
            const button_editar = btn_submit_editar[i];

            const element3 = btn_reac[i];
            const element4 = btn_reacted[i];
            const element5 = user[i];
            const element6 = btn_com[i];
            const element7 = app[i];

            const element8 = btn_config[i];
            const element9 = div_config[i];
            const ed = editar[i];
            const el = eliminar[i];
            const txtdisable = txtdis[i];
            // var textLength = txtdisable.value.length;

            //     if (textLength < limit) {
            //         txtdisable.style.display = "none"
            //     }

            ed.addEventListener("click", function (id) {
                console.log("Editar noticia: "+ ed.id);
                txtdisable.disabled = false;
            });
            el.addEventListener("click", function (id) {
                console.log("Eliminar noticia: "+ ed.id);
            });
            element6.addEventListener("click", function () {
                element7.hidden = false;
            })
            element8.addEventListener("click", function () {
                element9.style.display = "flex";
                if (element9 === document.activeElement) {
                    console.log('Element has focus!');
                } else {
                    console.log(`Element is not focused.`);
                }
            });
            function mouseUp() {
                element9.style.display = "none";
            }
            txtdisable.addEventListener("input", function () {
                var textLength = txtdisable.value.length;
                //resultado.textContent = textLength + " / " + limit;
                if (textLength < limit) {
                    button_editar.style.display = "none"
                }
                else{
                    button_editar.style.display = "block"
                }
            });
            element.addEventListener("input", function () {
                var textLength = element.value.length;
                //resultado.textContent = textLength + " / " + limit;
                if (textLength < limit) {
                    element2.style.display = "none"
                }
                else{
                    element2.style.display = "block"
                }
            });
        }
        $(document).ready(function(){
            fetchNotices();
            function fetchNotices(){
                $.ajax({
                    type: "GET",
                    url: "/fetch-notices",
                    dataType: "json",
                    success: function(response){
                        $.each(response.notice, function(key, item){
                            // console.log(item.titulo);

                            // $('').append();
                        });
                    }
                });
            }
            $('.btn_favorite').on('click', function(){
                var notices = $(".noticess").val();
                $.ajax({
                    type: "POST",
                    url: '/favorite/'+notices,

                    data: {
                        "_token": "{{ csrf_token() }}",
                    },

                    success: function(response){

                        console.log("Enviado");
                    }
                });
            });
        });
    </script>
</body>
</html>
