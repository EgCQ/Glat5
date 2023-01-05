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
    </style>
</head>
<body>
    <main>
        @include('navbar.nav')
        <br><br><br><br>

        <section>
            @foreach ($notice as $notices)

                <article >

                    <div class="diva">
                        <div class="div">
                            <h2>{{ $notices->titulo }}</h2>
                        </div>
                        <div class="div">
                            <h5>{{ $notices->mensaje }}</h5>
                        </div>
                        <a href="{{ $notices->archivos }}" class="archivos" target="__blank">
                            <div>
                                <img src="img/post/{{ $notices->archivos}}" alt="">
                            </div>  
                            <div>
                                {{ $notices->archivos }}
                            </div>
                        </a>
                        <div>
                            <br><br>
                            <h4>
                                Fecha: <br>{{ $notices->created_at->format('d-m-Y')}}
                            </h4>
                        </div>
                    </div>
                    <br>
                </article>

            @endforeach
        </section>
        <aside>

        </aside>
    </main>
</body>
</html>