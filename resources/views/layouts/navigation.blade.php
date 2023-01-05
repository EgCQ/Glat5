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
                    <div id="nav-ul-li2">
                        <ul id="ul">

                            <div id="ul1" style="display: flex; align-items: center;">
                                <li>
                                    <a href="{{ route('home') }}" class="element_a">Publicar noticia</a>
                                </li>

                                <div class="dropdown" id="ul2">
                                    <button class="w-100 dropmenu btn btn-default dropdown-toggle text-black" type="button"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ventas
                                    </button>
                                    <div class="dropdown-menu w-100 dropmenu2" style="" aria-labelledby="dropdownMenuButton" role="menu">
                                        <div class="dropmenu3">
                                            <div class="bg-primary w-100" style="margin-right: -1rem !important;">
                                                <li>
                                                        <a href="{{ route('productos.create') }}" class="element_a">Productos</a>

                                                </li>
                                            </div>
                                            <div class="bg-primary w-100" style="margin-right: -1rem !important;">
                                                <li>
                                                    <a href="{{ route('home') }}" class="element_a">Ver Pedidos</a>
                                                </li>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center;" id="ul3">
                                <div class="dropdown" >
                                    <button class="w-100 dropmenu btn btn-default hover-text-white dropdown-toggle text-black shadow-none" type="button"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Bienvenido al dashboard <b>{{ Auth::user()->name }}</b>
                                    </button>
                                    <div class="dropdown-menu w-100 dropmenu2" style="" aria-labelledby="dropdownMenuButton" role="menu">
                                        <div class="dropmenu3">
                                            <div class="bg-primary w-50" style="margin-right: 2rem !important;">
                                                <li>
                                                    <a href="{{ route('perfil.show', Auth::user()) }}" class="element_a">Mi perfil</a>
                                                </li>
                                            </div>
                                            <div class="bg-primary w-50" style="margin-right: 2rem !important;">
                                                <li>
                                                    <form action="{{ route('logout') }}" method="post" style="width: 100% !important">
                                                        @csrf
                                                            <a href="route('logout')" class="element_a" style="width: 100% !important" onclick="event.preventDefault(); this.closest('form').submit();">Cerrar sesión</a>
                                                    </form>
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown" >
                                    <button class="w-100 h-100 dropmenu btn btn-default hover-text-white text-black shadow-none" 
                                    type="button"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-regular fa-bell" style="color: white; font-weight: bold; font-size: 24px; display: flex; justify-content: center; align-items: center;"></i>
                                        Notificaciones
                                    </button>
                                    <div class="dropdown-menu" style="width: 250% !important; height: fit-content;">
                                        <a href="" class="bg-secondary text-black notify">
                                            <div class="w-100" style="margin-left: 1rem; margin-top: 1rem; width: 200% !important;">
                                                <div class="n-title w-100" >
                                                    <p >Remitente* ha comentado</p>
                                                </div>
                                                <div class="n-title w-100" >
                                                    <h3 >Titulo*</h3>
                                                </div>
                                                <div class="n-p w-100">
                                                    <p style="font-size: 20px;">Mensaje*</p>
                                                </div>
                                            </div>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                            

                            
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
