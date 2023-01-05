<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelato</title>
    <style>
        
        section{
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            margin-top: 3rem;
            position: static !important;
            background-color: blue;
            width: 90%;
            max-width: 1400px;
            height: fit-content;
            padding: 2rem;
            margin-left: auto;
            margin-right: auto;
            padding-bottom: 1rem !important;
            margin-bottom: 1rem !important;
        }
        article{
            width: fit-content;
            margin-left: 1rem;
            margin-bottom: 1rem;
            min-width: 350px;
            background-color:blanchedalmond;
        }
        article div{
            width: 17rem;
            background-color: whitesmoke;
            text-align: center;
            margin-top: 1rem;
            margin-bottom: 1rem;
            margin-left: 0;
            margin-right: 0;

            padding-top: 1rem;
            padding-bottom: 1rem;
            padding-left: 3rem;
            padding-right: 3rem;
        }

        article .div:hover{
            background-color: black;
            color: white;
            transition: 0.3s;
        }

        article .img{
            border-radius: 15%;
            width: 17rem;
            height: 10rem;
        }
    </style>
</head>
<body>
    <main>
    @include('navbar.nav')

        <br><br><br><br>
        <section class="section">

        @foreach ($gelato as $gelatos)
                
                <article >
                    <a href="{{ route('getGelato', $gelatos->id) }}">

                    <div class="div">
                            {{ $gelatos->id }}
                    </div>
                </a>

                    <div class="img" style="background-image: url('/img/post/{{$gelatos->foto_perfil}}')">
                    </div>
                    <div class="div">
                        {{ $gelatos->color }}

                        <span>
                            Gelato
                        </span>
                    </div>
                    <div class="div">
                        {{ $gelatos->nombre }}
                    </div>
                    <div class="div">
                        {{ $gelatos->lema }}
                    </div>
                </article>
                
        @endforeach
        </section>


        <br><br><br><br><br>

    </main>
</body>
</html>