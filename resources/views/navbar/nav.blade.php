
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <script src="js/nav.js"></script>
</head>
<body>
    <header id="headernav" class="header">
        <nav id="navb">
            <div class="main">
                <div id="img">

                    <a href="{{ route('/') }}" id="img1" class="element_a">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Koi_wa_Sekai_Seifuku_no_Ato_de_Logo.png/280px-Koi_wa_Sekai_Seifuku_no_Ato_de_Logo.png" alt="gelato">
                    </a>
                </div>

                <div id="nav-ul">
                        <a href="#" id="btn-add">
                            <i class="fas fa-bars"></i>
                        </a>
                        <a href="#" id="btn-remove">
                            <i class="fa-solid fas fa-xmark"></i>
                        </a>
                    <div id="nav-ul-li" class="nav-li">
                        <ul id="ul">
                            <div id="ul1">
                                <li><a href="{{ route('gelato') }}"  class="element_a">Gelatos</a></li>
                                <li><a href="{{ route('contactos.contacto') }}"  class="element_a">Contactanos</a></li>
                                <li><a href="{{ route('noticias_gelato') }}" class="element_a">Noticias Gelato</a></li>
                                <div class="ul2">
                                    @if (Route::has('login'))
                                        @auth
                                            <li class="left" id="dashboard">
                                                <a href="{{ url('/home') }}" class="element_a">DASHBOARD</a>
                                            </li>
                                        @else
                                            <li class="left" id="login"><a href="{{ route('login') }}"  class="element_a">Ingresar a la plataforma</a></li>
        
                                            @if (Route::has('register.index'))
                                                <li class="left" id="register"><a href="{{ route('register.index') }}"  class="element_a">Registrar como Gelato</a></li>
                                            @endif
                                        @endauth
                                    @endif
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</body>
