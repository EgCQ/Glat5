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
                                <a href="{{ route('productos.create') }}" class="element_a" tooltip="Productos" flow="down">
                                    <i class="fa-solid fa-shop" ></i>
                                </a>
                            </li>
                        </div>
                        <div style="display: flex; align-items: center;" id="ul2">
                            @auth

                            <div class="dropdown">
                                    <button class="w-100 dropmenu btn btn-default hover-text-white dropdown-toggle text-black shadow-none" type="button"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Bienvenido al dashboard <b>{{ Auth::user()->name }}</b>
                                    </button>
                                <div class="dropdown-menu w-100 dropmenu2" style="" aria-labelledby="dropdownMenuButton" role="menu">
                                    <div class="dropmenu3">
                                        <div class="bg-primary w-50 dropmenu4" style="margin-right: 2rem;">
                                            <li>
                                                <a href="{{ route('perfil.show', Auth::user()) }}" class="element_a" tooltip="Ver perfil">
                                                    <i class="fa-solid fa-address-card"></i>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="bg-primary w-50 dropmenu5" style="margin-right: 2rem;">
                                            <li>
                                                <form action="{{ route('logout') }}" method="post" style="width: 100% !important">
                                                    @csrf
                                                        <a href="route('logout')" class="element_a" style="width: 100% !important" tooltip="Cerrar sesión" flow="down" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <i class="fa-solid fa-right-from-bracket"></i>
                                                        </a>
                                                </form>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endauth

                            <div class="dropdown" >
                                <button class="w-100 h-100 dropmenu btn btn-default hover-text-white text-black shadow-none"
                                type="button"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" tooltip="Notificaciones" flow="left">
                                    <i class="fa-regular fa-bell" style="font-weight: bold; font-size: 24px; display: flex; justify-content: center; align-items: center;"></i>
                                </button>
                                <div class="dropdown-menu dp2" style="height: fit-content; ">
                                    <a href="" class="bg-secondary text-black ">
                                        <div class="" style="margin-top: 1rem; width: 200% !important;">
                                            <div class="" style="">
                                                <p class="mx-4">Remitente* ha comentado</p>
                                            </div>
                                            <div class="" >
                                                <h4 class="mx-4">Titulo*</h4>
                                            </div>
                                            <div class="n-p" >
                                                <p class="mx-4" style="font-size: 20px; ">Mensaje*</p>
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
