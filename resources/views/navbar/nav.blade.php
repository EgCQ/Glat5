
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
                <div id="nav-ul">
                    <a href="#" id="btn-add">
                        <i class="fas fa-bars"></i>
                    </a>
                    <a href="#" id="btn-remove">
                        <i class="fa-solid fas fa-xmark"></i>
                    </a>
                    <div id="nav-ul-li">
                        <ul id="ul">
                            <div id="ul1" style="display: flex; align-items: center;">
                                <li id="img">
                                    <a href="{{ route('/') }}" id="img1" class="element_a" tooltip="Inicio" flow="down">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Koi_wa_Sekai_Seifuku_no_Ato_de_Logo.png/280px-Koi_wa_Sekai_Seifuku_no_Ato_de_Logo.png" alt="gelato">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contactos.contacto') }}"  class="" tooltip="Contactanos" flow="down">
                                        <i class="fa-solid fa-envelope-open element_a"></i>                                    
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('noticias_gelato') }}" class="" tooltip="Noticias" flow="down">
                                        <i class="fa-solid fa-message fa-message-quote element_a"></i>
                                    </a>
                                </li>
                                
                            </div>
                            <div id="ul2">
                                @if (Route::has('login'))
                                    @auth
                                        <li id="dashboard">
                                            <a href="{{ url('/home') }}" class="element_a" tooltip="Entrar al Dashboard" flow="down">DASHBOARD</a>
                                        </li>
                                    @else
                                    <div class="d-flex" id="log_reg">
                                        <li  id="login">
                                            <a href="{{ route('login') }}"  class="element_a" tooltip="Inicia sesion" flow="down">
                                                <i class="fa-sharp fa-solid fa-door-open"></i>
                                            </a>
                                        </li>
    
                                        @if (Route::has('register.index'))
                                            <li  id="register">
                                                <a href="{{ route('register.index') }}"  class="element_a" tooltip="Registrate" flow="down">
                                                    <i class="fa-solid fa-user-plus"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </div>
                                        
                                    @endauth
                                @endif
                            </div>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</body>
