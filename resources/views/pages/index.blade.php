<!DOCTYPE html>
<html lang="es">

@include('templates.head')


<body>
   

    <!-- =-=-=-=-=-=-= Transparent Header =-=-=-=-=-=-= -->
    @include('templates.header2')

    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" role="alert">
            <span aria-button="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- Navigation Menu End -->
    <!-- =-=-=-=-=-=-= Transparent Header =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Home Banner 2 =-=-=-=-=-=-= -->
    @include('components.banner1280x800')
    <!-- =-=-=-=-=-=-= Home Banner 2 End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Popular Categories =-=-=-=-=-=-= -->
    
        <!-- =-=-=-=-=-=-= Popular Categories End =-=-=-=-=-=-= -->
        <!-- =-=-=-=-=-=-= Featured Ads =-=-=-=-=-=-= -->
        {{-- @include('components.anuncios_destacados') --}}
        <!-- =-=-=-=-=-=-= Featured Ads End =-=-=-=-=-=-= -->
        <!-- =-=-=-=-=-=-= Trending Ads =-=-=-=-=-=-= -->
        <section class="custom-padding gray">
            <!-- Main Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <!-- Heading Area -->
                    <div class="heading-panel">
                        <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                            <!-- Main Title -->
                            <h1>Últimos <span class="heading-color">Anuncios </span>Más Recientes</h1>
                            <!-- Short Description -->
                            <p class="heading-text">Aquí encontrarás el libido que tanto estabas buscando</p>
                        </div>
                    </div>
                    <!-- Middle Content Box -->
                   
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <ul class="list-unstyled">
                            <!-- Listing Grid -->
                            <li>
                                @foreach ($anuncios as $anuncio)
                                <div class="well ad-listing clearfix">
                                    <div class="col-md-3 col-sm-5 col-xs-12 grid-style no-padding">
                                        <!-- Image Box -->
                                        <div class="img-box">

                                            @if(isset($anuncio->images->pluck('url')[0]))
                                            <img src="{{ $anuncio->images->pluck('url')[0] }}" class="img-responsive"
                                                alt="">
                                                @else
                                                <img src="{{asset('images/logo_pasion.jpeg')}}">
@endif
                                            @php
                                                $contv = 0;
                                                $conti = 0;
                                                foreach($anuncio->images as $image){
                                                    if(Str::endsWith($image->url,'mp4')){
                                                        $contv= $contv+1;
                                                    }else{
                                                        $conti = $conti+1;
                                                    }
                                                }
                                            @endphp

                                               
                                            <div class="total-images">  
                                                <strong>{{$conti}}</strong> fotos
                                            </div>
                                                
                                            <div class="total-images" style="margin-left:53px;">
                                                <strong>{{$contv}}</strong> videos
                                            </div>
                                            <div class="quick-view"> <a href="#ad-preview{{$anuncio->id}}"
                                                    data-toggle="modal" class="view-button"><i
                                                        class="fa fa-search"></i></a> </div>
                                        </div>
                                        <!-- Ad Status -->
                                        {{-- <span class="ad-status"> Top </span> --}}
                                        <!-- User Preview -->

                                        <div class="user-preview">
                                            <a href="{{route('home.detalle',$anuncio->id) }}"> 
                                                @if(isset($anuncio->images->pluck('url')[0]))
                                                <img src="{{ $anuncio->images->pluck('url')[0] }}" class="avatar avatar-small" alt="foto"> 
                                                  @else
                                                  <img src="{{asset('images/logo_pasion.jpeg')}}">
                                                @endif
                                                </a>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-7 col-xs-12">
                                        <!-- Ad Content-->
                                        <div class="row">
                                            <div class="content-area">
                                                <div class="col-md-9 col-sm-12 col-xs-12">
                                                    <!-- Category Title -->
                                                    <div class="category-title"> <span><a href="#">{{
                                                                $anuncio->categoria->nombre }}</a></span>
                                                    </div>
                                                    <!-- Ad Title -->
                                                    <h3><a href="{{ route('home.detalle',$anuncio->id)}}">
                                                    {{$anuncio->titulo}}</a>
                                                    </h3>
                                                    <!-- Info Icons -->
                                                    <ul class="additional-info pull-right">
                                                        <li>
                                                            <a data-toggle="tooltip" title="Enviar whatsapp"
                                                                    href="https://api.whatsapp.com/send?phone=+34{{$anuncio->telefono}}&text=Hola me encuentro interesado en tu anuncio {{$anuncio->titulo}}%20{{request()->fullUrl()}}" class="fab fa-whatsapp"></a>
                                                        </li>
                                                    </ul>
                                                    <!-- Ad Meta Info -->
                                                    <ul class="ad-meta-info">
                                                        <li> <i class="fa fa-map-marker"></i><a href="#">{{
                                                                $anuncio->ciudad }}</a>
                                                        </li>
                                                        <li> <i class="fa fa-user"></i>{{ $anuncio->user->name }}
                                                        </li>
                                                        @if ($anuncio->user->cta_validada == 'Si')
                                                        <li title="Cuenta verificada"><i class="fas fa-user-check"></i>
                                                        </li>
                                                        @else
                                                        <li title="Cuenta no verificada"><i
                                                                class="fas fa-user-times"></i></li>
                                                        @endif
                                                    </ul>
                                                    <!-- Ad Description-->
                                                    <div class="ad-details">
                                                        <p>
                                                            {{ $anuncio->descripcion }}</p>


                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-12 col-sm-12">
                                                    <!-- Ad Stats -->
                                                    <div class="short-info">
                                                        <div class="ad-stats hidden-xs"><span>Edad :
                                                            </span>{{ $anuncio->edad }} años
                                                        </div>
                                                        <div class="ad-stats hidden-xs"><span>Dirección :
                                                            </span>{{ $anuncio->direccion }}</div>
                                                    </div>
                                                    <a href="{{route('home.detalle',$anuncio->id)}}"
                                                        class="btn btn-block btn-success"><i class="fa fa-eye"
                                                            aria-hidden="true"></i> Ver
                                                        más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ad Content End -->
                                    </div>
                                </div>

                                <!-- VISTA PREVIA DEL PRODUCTO CON LA LUPA -->
                                <div class="quick-view-modal modalopen" id="ad-preview{{$anuncio->id}}" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg ad-modal">
                                        <button class="close close-btn popup-cls" aria-label="Close"
                                            data-dismiss="modal" type="button"> <i class="fa-times fa"></i> </button>
                                        <div class="modal-content single-product">
                                            <div class="diblock">
                                                <div class="col-lg-7 col-sm-12 col-xs-12">
                                                    <div class="clearfix"></div>
                                                    <div class="flexslider single-page-slider">
                                                        <div class="flex-viewport">
                                                            <ul class="slides slide-main">

                                                                @foreach($anuncio->images as $imagen)
@if(isset($imagen->url))
                                                                <li class=""><img alt="" src="{{ $imagen->url }}"
                                                                        title="">
                                                                </li>
                                                                @else
                                                                <li class=""><img alt="foto del anuncio" src="{{asset('images/logo_pasion.jpeg')}}"
                                                                    title="foto del anuncio">
                                                            </li>
@endif
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="flexslider" id="carousels">
                                                        <div class="flex-viewport">
                                                            <ul class="slides slide-thumbnail">
                                                                @foreach($anuncio->images as $imagen)
                                                                @if(isset($imagen->url))
                                                                <li><img alt="" draggable="false"
                                                                        src="{{$imagen->url}}">
                                                                </li>
                                                                @else
                                                                <li><img alt="" draggable="false"
                                                                    src="{{asset('images/logo_pasion.jpeg')}}" alt="foto de anuncio">
                                                            </li>
@endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" col-sm-12 col-lg-5 col-xs-12">
                                                    <div class="summary entry-summary">
                                                        <div class="ad-preview-details">
                                                            <a href="#">
                                                                <h4>{{$anuncio->titulo}}</h4>
                                                            </a>

                                                            <div class="clearfix"></div>
                                                            <p>{{$anuncio->descripcion}}</p>
                                                            <ul class="car-info col-md-6 col-sm-6">
                                                                <li>
                                                                    <span>Publicado:</span>
                                                                    <p>{{$anuncio->created_at}}</p>
                                                                </li>
                                                                <li>
                                                                    <span>Edad:</span>
                                                                    <p>{{$anuncio->edad}}</p>
                                                                </li>
                                                                <li>
                                                                    <span>Ciudad:</span>
                                                                    <p>{{$anuncio->ciudad}}</p>
                                                                </li>
                                                                <li>
                                                                    <span>Teléfono:</span>
                                                                    <p>{{$anuncio->telefono}}</p>
                                                                </li>

                                                            </ul>
                                                            <ul class="ad-preview-info col-md-6 col-sm-6">
                                                            </ul>
                                                            <a href="{{route('home.detalle',$anuncio->id)}}">
                                                                <button class="btn btn-theme btn-block"
                                                                    type="submit">Contactar</button>
                                                            </a>

                                                        </div>
                                                    </div>
                                                    <!-- .summary -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </li>
                        </ul>
                        <div class="text-center">
                            {!! $anuncios->links() !!}
                        </div>
                    </div>
                    <!-- Middle Content Box End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Main Container End -->
        </section>

        <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
        @include('templates.footer')
        <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
    </div>

    <!-- SCRIPTS -->
    @include('templates.scripts')
</body>

</html>