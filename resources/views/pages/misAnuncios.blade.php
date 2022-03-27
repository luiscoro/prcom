<!DOCTYPE html>
<html lang="es">

@include('templates.head')

<body>
    <!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->
    @include('templates.header2')
    <!-- Navigation Menu End -->
    <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
    <!-- Small Breadcrumb -->
    <div class="small-breadcrumb">
        <div class="container">
            <div class=" breadcrumb-link">
                <ul>
                    <li><a href="{{url('/')}}">Inicio</a></li>
                    <li><a href="{{route('cliente.miCuenta')}}">Perfil</a></li>
                    <li><a href="{{route('cliente.misAnuncios')}}">Mis anuncios</a></li>
                </ul>
            </div>
        </div>
    </div>
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" role="alert">
            <span aria-button="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- Small Breadcrumb -->
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <section class="section-padding gray">
            <!-- Main Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <!-- Middle Content Area -->
                    <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                        <!-- Sidebar Widgets -->
                        <div class="user-profile">
                            <a href="profile.html"><img src="{{$user->perfil->foto}}" alt=""></a>
                            <div class="profile-detail">
                                <h6>{{$user->name}}</h6>
                                <ul class="contact-details">
                                    <li>
                                        <i class="fa fa-envelope"></i>{{$user->email}}
                                    </li>
                                </ul>
                            </div>
                            <ul>
                                <li><a href="{{route('cliente.miCuenta')}}">Perfil</a></li>
                                <li class="active"><a href="{{route('cliente.misAnuncios')}}">Mis anuncios <span
                                            class="badge">{{count($anuncios)}}</span></a>
                                </li>
                                <li><a href="{{route('cliente.misOrdenes')}}">Mis ordenes</a></li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Cerrar sesión</a>

                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <!-- Row -->
                        <div class="row">
                            <!-- Sorting Filters -->
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                <!-- Sorting Filters Breadcrumb -->
                                <!-- Sorting Filters Breadcrumb End -->
                            </div>
                            <!-- Sorting Filters End-->
                            <div class="clearfix"></div>
                            <!-- Ads Archive -->
                            <div class="posts-masonry">
                                <div class="col-md-12 col-xs-12 col-sm-12 user-archives">
                                    <!-- Ads Listing -->

                                    <!-- Ads Listing -->

                                    <!-- Ads Listing -->
                                    @foreach ($anuncios as $anuncio)
                                    <div class="ads-list-archive">
                                        <!-- Image Block -->
                                        <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                            <!-- Img Block -->
                                            <div class="ad-archive-img">
                                                <a href="#">
                                                    {{-- <div class="ribbon expired">Expired</div> --}}
                                                    <img src="{{$anuncio->images->pluck('url')[0]}}" alt="foto">
                                                </a>
                                            </div>
                                            <!-- Img Block -->
                                        </div>
                                        <!-- Ads Listing -->
                                        <div class="clearfix visible-xs-block"></div>
                                        <!-- Content Block -->

                                        <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                                            <!-- Ad Desc -->
                                            <div class="ad-archive-desc">
                                                <!-- Price -->
                                                {{-- <div class="ad-price">$120</div> --}}
                                                <!-- Title -->
                                                <h3><a href="{{url('/detalle/'.$anuncio->id)}}">{{$anuncio->titulo}}</a>
                                                </h3>
                                                <!-- Category -->
                                                <div class="category-title"> <span><a
                                                            href="#">{{$anuncio->categoria->nombre}}</a></span>
                                                </div>
                                                <!-- Short Description -->
                                                <div class="clearfix visible-xs-block"></div>
                                                <p class="hidden-sm">{{$anuncio->descripcion}}
                                                </p>
                                                <!-- Ad Features -->
                                                <ul class="add_info">
                                                    <!-- Contact Details -->
                                                    <li>
                                                        <div class="custom-tooltip tooltip-effect-4">
                                                            <span class="tooltip-item"><i
                                                                    class="fa fa-phone"></i></span>
                                                            <div class="tooltip-content">
                                                                <h4>Contacto</h4>

                                                                <strong>Celular</strong> <span
                                                                    class="label label-success">{{$anuncio->telefono}}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- Address -->
                                                    <li>
                                                        <div class="custom-tooltip tooltip-effect-4">
                                                            <span class="tooltip-item"><i
                                                                    class="fa fa-map-marker"></i></span>
                                                            <div class="tooltip-content">
                                                                <h4>Dirección</h4>
                                                                {{$anuncio->direccion}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <!-- Ad History -->
                                                <div class="clearfix archive-history">
                                                    {{-- <div class="last-updated">Updated: 1 day ago</div> --}}

                                                    <div class="ad-meta">
                                                        @if($anuncio->estado=="desactivado")
                                                        <a href="{{route('cliente.estadoAnuncio',$anuncio->id)}}" class="btn save-ad">
                                                            <i class="fa fa-down"></i>Activar</a>
                                                            @else
                                                            <a href="{{route('cliente.estadoAnuncio',$anuncio->id)}}" class="btn save-ad">
                                                                <i class="fa fa-down"></i>Desactivar</a>
                                                        @endif
                                                        <a href="{{url('/editar-anuncio/'.$anuncio->id)}}"
                                                            class="btn btn-success"><i class="fa fa-pencil"></i>
                                                            Editar</a>
                                                        <a href="{{url('/anuncio/'.$anuncio->id)}}"
                                                            class="btn btn-danger"><i class="fa fa-times"></i>
                                                            Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Ad Desc End -->
                                        </div>


                                        <!-- Content Block End -->
                                    </div>
                                    @endforeach
                                    <!-- Ads Listing -->

                                </div>
                            </div>
                            <!-- Ads Archive End -->
                            <div class="clearfix"></div>
                            <!-- Pagination -->
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                {!! $anuncios->links() !!}

                            </div>
                            <!-- Pagination End -->
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Middle Content Area  End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Main Container End -->
        </section>
        <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
        <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
        @include('templates.footer')
        <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
    </div>
    <!-- SCRIPTS -->
    @include('templates.scripts')
</body>

</html>