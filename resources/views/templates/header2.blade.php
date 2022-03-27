<div class="colored-header">
    <!-- Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Header Top Left -->
                <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
                    {{-- <ul class="listnone">
                        <li><a href="{{route('home.faq')}}"><i class="fa fa-folder-open-o" aria-hidden="true"></i>FAQS</a></li>
                     </ul> --}}

                </div>
                <!-- Header Top Right Social -->
                <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                    <div class="pull-right">
                        <ul class="listnone">
                            @guest
                                @if (Route::has('login'))
                                    <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>Iniciar sesión</a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}"><i class="fa fa-unlock"
                                                aria-hidden="true"></i>Registrarse</a></li>
                                @endif
                            @else
                                <li style="color: white"><a href="{{ url('/creditos') }}"><i style="color: white"
                                            class="fas fa-coins"></i>{{ Auth::user()->perfil->creditos }} créditos</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"><i class="icon-profile-male"
                                            aria-hidden="true"></i>{{ Auth::user()->name }}<span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">

                                        <li><a href="{{ route('cliente.miCuenta') }}">Mi cuenta</a></li>
                                        @if (Auth::check() &&
        Auth()->user()->hasRole('Admin'))
                                            <li><a href="{{ url('/admin') }}">Dashboard</a></li>
                                        @endif
                                        <li><a href="{{ route('cliente.misAnuncios') }}">Mis anuncios</a></li>
                                        <li><a href="{{ route('cliente.misOrdenes') }}">Mis ordenes</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesión') }}
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    <div class="clearfix"></div>
    <!-- Navigation Menu -->
    <nav id="menu-1" class="mega-menu">
        <!-- menu list items container -->
        <section class="menu-list-items">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <!-- menu logo -->
                        <ul class="menu-logo">
                            <li>
                                <a href="{{ route('home.inicio') }}">
                                    <div style="max-width:150px;">
                                        <img 
                                        src="{{ asset('/images/logo_pasion-mod.jpeg') }}" alt="logo">
                                    </div>
                                  

                                     </a>
                            </li>
                        </ul>
                        <!-- menu links -->
                        <ul class="menu-links">
                            <!-- active class -->
                            <li>
                                <a href="{{ url('/') }}"> Inicio <i class=" fa-indicator"></i></a>

                            </li>
                            <li>
                                <a>Categorías <i class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel">
                                    <li><a href="{{ route('home.findAllCategorias') }}">Todas</a></li>
                                    @foreach ($categorias as $categoria)
                                        <li><a href="{{ route('home.find_by_categoria', $categoria->id) }}">{{ $categoria->nombre }}
                                            </a></li>
                                    @endforeach

                                </ul>
                            </li>
                            <li>
                                <a href="{{route('home.faq')}}"> ¿Cómo funciona PR?<i class=" fa-indicator"></i></a>

                            </li>
                            @guest
                                &nbsp;
                            @else
                                <li><a href="{{ url('/creditos') }}"> Créditos <i class=" fa-indicator"></i></a></li>
                            @endguest

                        </ul>
                        <ul class="menu-search-bar">
                            <li>
                                <a href="{{ route('cliente.crearAnuncio') }}" class="btn btn-light"><i
                                        class="fa fa-plus" aria-hidden="true"></i> Publicar anuncio</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </nav>
</div>
