<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias Gelato</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        section{
            padding: 1rem;
            margin: 1rem;
            transition: all 0.5s !important;                

        }
        .diva{
            height: fit-content !important;

            background-color: rgba(225, 220, 290, 10);
            width: 90%;
            max-width: 1550px;
            margin-left: auto;
            margin-right: auto;
            padding: 1.5rem;

        }
        .diva .archivos{
            width: 100%;
            height: 100%;
            transition: all 0.5s;
            
        }

        .diva a:hover{
            width: 100%;
            height: 100%;
            color: gray;
        }
        .diva .archivos h5{
            color: black;
        }
        .diva div h4{
            text-align: end;
            padding: 0 !important;
            margin: 0 !important;

        }
        div img{
            width: 100%;
            transition: all 0.5s;
        }
        div img::before{
            content: '' !important;
            top: 0 !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            background-color: rgba(0,0,0, .1) !important;
        }
        .btn_file:hover{
            background-color: rgb(177, 172, 172) !important;
        }
        .btn_reac:hover{
            font-weight: bold !important;
            color: rgb(116, 116, 116) !important;
            transition: all 0.7s !important;
            margin-top:0.2rem;
            background-color: transparent;
        }
        .btn_reac{
            font-weight: bold;
            border: none;
            margin-top:0.2rem;
            transition: all 0.7s !important;
            background-color: transparent;

        }
        .btn_com:hover{
            font-weight: bold !important;
            color: rgb(116, 116, 116) !important;
            transition: all 0.7s !important;
            margin-top:0.2rem;
            background-color: transparent;
        }
        .btn_com{
            font-weight: bold;
            border: none;
            margin-top:0.2rem;
            transition: all 0.7s !important;
            background-color: transparent;

        }
        .notice{
                width: 75%;
        }
        @media screen and (max-width: 850px) {

            .notice{
                width: 70% !important;
            }
        }
        @media screen and (max-width: 727px) {

            .notice{
                width: 100% !important;
                
            }
            div.a{
                display: flex;
                width: 100%  !important;
                justify-content: center !important;
                transition: all 0.5s !important;
            }
            a{
                width: 100% !important;
                height: 100% !important;
                transition: all 0.5s !important;                

            }
            div img{
                width: 100% !important;
                height: 100% !important;
                transition: all 0.5s !important;                

            }
            div.b{
            }

        }
        @media screen and (max-width: 565px) {

            section{
                width: 100% !important;
                transition: all 0.5s !important;                
                margin: 0rem !important;
                padding: 0rem !important;
                padding-top: 1rem !important;
            }
            .diva{
                padding: 1rem !important;
            }


        }
        @media screen and (max-width: 285px) {

            section{
                margin: 0rem !important;
                padding: 0rem !important;
                padding-top: 1rem !important;
            }
        }
        .div.a{
            width: 25%;
        }   
        .a_doc:hover{
            color: white !important;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }
    </style>
</head>
<body>
    <main>
        @include('navbar.nav')
        <section>
            @foreach ($notice as $notices)

                <article >

                    <div class="diva" style="margin-bottom: 1rem">
                        <div class="div" style="justify-content: space-between">
                            <h2>{{ $notices->titulo }}</h2>
                            <div>
                                <p style="font-weight: bold">
                                    Publicado: {{ $notices->created_at->format('d-m-Y')}}
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

    
                      
                        <div>
                            <button class="btn_reac" onclick="ver({{ $notices->id }})" id="btn_reac{{ $notices->id }}" style="">Me gusta</button>
                            <div>
                                <textarea name="" maxlength="750" class="mensaje" id="{{ $notices->id}}" style="width: 100%; padding:1rem; margin-top:0.2rem;" class="form-control msg" placeholder="Escribe un comentario"></textarea>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <button  type="button" class="btn btn-default" tooltip="Añadir archivos">
                                        <i class="fa-solid fa-paperclip"></i>
                                    </button>
                                    
                                    <button type="button" class="btn btn-secondary btn_submit" tooltip="Enviar" id="{{ $notices->id }}" style="display:none;">
                                        <i class="fa-sharp fa-solid fa-paper-plane" style="rotate: x -180deg;"></i>
                                    </button>
                                </div>
                            </div>
                            <div style="background-color: rgb(209, 209, 209)">
                                <button type="button" class="btn_com" style="margin-top: 0rem !important">Cargar comentarios</button>

                            </div>
                        </div>

                    </div>

                </article>

            @endforeach
        </section>

    </main>
    <script>
    var btn_reac = document.querySelector('.btn_reac');

    var mensaje = document.querySelectorAll('.mensaje');
    var btn_submit = document.querySelectorAll('.btn_submit');
    var limit = 1;
    //var resultado = document.getElementById("resultado");

    //resultado.textContent = 0 + " / " + limit;
   function ver(id) {

        console.log('Reaccionaras a la noticia nº '+id);
        
        btn_reac.style.color = "blue";
   }
    for (let i = 0; i < mensaje.length; i++) {
        const element = mensaje[i];
        const element2 = btn_submit[i];

        element.addEventListener("input", function () {
        var textLength = element.value.length;
        //resultado.textContent = textLength + " / " + limit;
        if (textLength < limit) {
            /*mensaje.style.borderTop = "1px solid red";
            mensaje.style.borderBottom = "1px solid red";
            mensaje.style.borderRight = "1px solid red";
            mensaje.style.borderLeft = "1px solid red";
            mensaje.style.animation = "shake 300ms";

            mensaje.style.paddingLeft = "0.5rem";

            mensaje.style.outlineColor = "red";
            resultado.style.color = "red";*/
            element2.style.display = "none"
        }
        else{
            /*mensaje.style.outlineColor = "black";
            mensaje.style.borderTop = "none";
            mensaje.style.borderBottom = "none";
            mensaje.style.borderRight = "none";
            mensaje.style.borderLeft = "none";
            resultado.style.color = "black";
            mensaje.style.paddingLeft = "0.5rem";
            mensaje.style.animation = "none";*/
            element2.style.display = "block"

        }
    });
    }

    </script>
</body>
</html>