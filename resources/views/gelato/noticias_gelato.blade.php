<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias Gelato</title>
    <style>
        section{
            padding: 1rem;
            margin: 1rem;
        }
        .diva{
            height: fit-content !important;

            background-color: rgba(225, 220, 290, 10);
            width: 90%;
            max-width: 1550px;
            margin-left: auto;
            margin-right: auto;
            padding: 2rem;

        }
        .diva .archivos{
            width: 10rem;
            height: 5rem;
        }
        .diva a:hover{
            width: 10rem;
            height: 5rem;
            color: gray !important;
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
            width: 7rem;
            height: 5rem;
        }
        .btn_file:hover{
            background-color: rgb(177, 172, 172) !important;
        }
        .btn_reac:hover{
            font-weight: bold !important;
            color: rgb(116, 116, 116) !important;
            transition: all 0.7s !important;
            height: 1px !important;
            margin-top:0.2rem;

        }
        .btn_reac{
            height: 1px !important;
            font-weight: bold;
            border: none;
            margin-top:0.2rem;
            transition: all 0.7s !important;
        }
    </style>
</head>
<body>
    <main>
        @include('navbar.nav')
        <br><br><br><br>

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
                        <div class="div">
                            <h5>{{ $notices->mensaje }}</h5>
                        </div>

    
                        @php
                            $file = $notices->archivos;
                            $extension = pathinfo($file, PATHINFO_EXTENSION);
                            
                        @endphp

                        <div class="div">
                            <a href="img/notices/{{ $notices->archivos}}" class="archivos" target="__blank">
                                <div>
                                    <img src="img/notices/{{ $notices->archivos}}" alt="">
                                </div>  
                                <div>
                                    {{ $notices->archivos }}
                                </div>
                            </a>
                        </div>
                        <button class=" btn_reac" onclick="ver()" id="btn_reac" style="">Me gusta</button>
                        <div>
                            <textarea name="" maxlength="250" id="mensaje" style="width: 100%; padding:1rem; margin-top:0.2rem;" class="form-control" placeholder="Comentar..."></textarea>
                            <span id="resultado"></span>

                            <div class="d-flex" style="justify-content: flex-end; margin:1rem;">
                                <button type="submit" class="btn btn-secondary" id="btn_submit" style="display:none">Enviar</button>
                            </div>
                        </div>
                    </div>

                </article>

            @endforeach
        </section>
        <aside>

        </aside>
    </main>
    <script>
    var mensaje = document.getElementById("mensaje");
    var btn_submit = document.getElementById("btn_submit");

    var limit = 1;
    var resultado = document.getElementById("resultado");

    resultado.textContent = 0 + " / " + limit;

    mensaje.addEventListener("input", function () {
        var textLength = mensaje.value.length;
        resultado.textContent = textLength + " / " + limit;
        if (textLength < limit) {
            mensaje.style.borderTop = "1px solid red";
            mensaje.style.borderBottom = "1px solid red";
            mensaje.style.borderRight = "1px solid red";
            mensaje.style.borderLeft = "1px solid red";
            mensaje.style.animation = "shake 300ms";

            mensaje.style.paddingLeft = "0.5rem";

            mensaje.style.outlineColor = "red";
            resultado.style.color = "red";
            btn_submit.style.display = "none"
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
            btn_submit.style.display = "block"

        }
    });
    </script>
</body>
</html>