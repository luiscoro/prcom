<!DOCTYPE html>
<html lang="es">
@include('templates.head')

<link rel="stylesheet" href="{{asset('css/rating.css')}}">

<body>


    <!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->
    @include('templates.header2')
    <!-- Navigation Menu End -->
    <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
    <div class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-page">
                        <h1>Detalles del anuncio </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Small Breadcrumb -->
    <div class="small-breadcrumb">
        <div class="container">
            <div class=" breadcrumb-link">
                <ul>
                    <li><a href="{{ route('home.inicio') }}">Inicio</a></li>
                    <li><a href="">Detalles del anuncio</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Small Breadcrumb -->
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <section class="section-padding error-page pattern-bgs gray ">
            <!-- Main Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <!-- =-=-=-=-=-=-= Advertizing Sidebar =-=-=-=-=-=-= -->
                    <div class="col-md-2 col-sm-2  hidden-xs hidden-sm  leftbar-stick">
                        <div class="theiaStickySidebar"> <img alt="" src="{{ asset('images/160x600.png') }}"> </div>

                    </div>

                    <!-- Middle Content Area -->
                    <div class="col-md-8 col-xs-12 col-sm-12">
                        <!-- Single Ad -->
                        <div class="single-ad">
                            <!-- Title -->
                            <div class="ad-box">
                                <h1>{{ $anuncio->titulo }}</h1>
                                <div class="short-history">
                                    <ul>
                                        <li>Nombre: <b>{{ $anuncio->user->name }}</b></li>
                                        <li>Categoría: <b><a href="#">{{ $anuncio->categoria->nombre }}</a></b></li>
                                        <li>Dirección: <b>{{ $anuncio->direccion }}</b></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Listing Slider  -->
                            <div class="flexslider single-page-slider">
                                <div class="flex-viewport">
                                    <ul class="slides slide-main">
                                        @foreach ($anuncio->images as $imagen)
                                        @if(Str::endsWith($imagen->url,'mp4'))
                                        <li><video src="{{$imagen->url}}" style="max-width: 350px;" autoplay muted loop controls></video></li>
                                        @else
                                       <li><img src="{{$imagen->url}}" alt="foto"></li> 
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- Listing Slider Thumb -->
                            <div class="flexslider" id="carousels">
                                <div class="flex-viewport">
                                    <ul class="slides slide-thumbnail">
                                        @foreach ($anuncio->images as $imagen)
                                        @if(!Str::endsWith($imagen->url,"mp4"))
                                        <li><img alt="foto" draggable="false" src="{{ $imagen->url }}"></li>
                                        @else
                                        <li><video style="max-width:150px;" src="{{$imagen->url}}" ></video></li>
                                        @endif
                                        @endforeach
                                        <!-- items mirrored twice, total of 12 -->
                                    </ul>
                                </div>
                            </div>


                            @if (Session::has('mensaje'))
                            <div class="alert alert-info alert-dismissible" style="margin-top:15px;" role="alert">
                                {{ Session::get('mensaje') }}
                                <button type="button" class="close" data-dismiss="alert" role="alert">
                                    <span aria-button="true">&times;</span>
                                </button>
                            </div>
                            @endif


                            <!-- Share Ad  -->
                            @if($anuncio->user->estado_comentar=="habilitado") 
                            <div class="ad-share text-center">
                                <div data-toggle="modal" data-target=".share-ad"
                                    class="ad-box col-md-3 col-sm-3 col-xs-12">
                                    <i class="fa fa-share-alt"></i> <span class="hidetext">Compartir</span>
                                </div>
                                <a class="ad-box col-md-3 col-sm-3 col-xs-12" href="tel:+34 {{$anuncio->user->telefono}}"><i
                                        class="fa fa-phone active"></i>
                                    <span class="hidetext">Contactar</span></a>
                                <div data-target=".report-quote" data-toggle="modal"
                                    class="ad-box col-md-3 col-sm-3 col-xs-12">
                                    <i class="fa fa-warning"></i> <span class="hidetext">Reportar</span>
                                </div>
                                <div data-target=".modal-comentar" data-toggle="modal"
                                class="ad-box col-md-3 col-sm-3 col-xs-12">
                                <i class="fa fa-comments"></i> <span class="hidetext">Comentar</span>
                            </div>
                            </div>
                            @else
                            <div class="ad-share text-center">
                                <div data-toggle="modal" data-target=".share-ad"
                                    class="ad-box col-md-4 col-sm-4 col-xs-12">
                                    <i class="fa fa-share-alt"></i> <span class="hidetext">Compartir</span>
                                </div>
                                <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="tel:+34 {{$anuncio->user->telefono}}"><i
                                        class="fa fa-phone active"></i>
                                    <span class="hidetext">Contactar</span></a>
                                <div data-target=".report-quote" data-toggle="modal"
                                    class="ad-box col-md-4 col-sm-4 col-xs-12">
                                    <i class="fa fa-warning"></i> <span class="hidetext">Reportar</span>
                                </div>
                                {{-- <div data-target=".modal-comentar" data-toggle="modal"
                                class="ad-box col-md-3 col-sm-3 col-xs-12">
                                <i class="fa fa-comments"></i> <span class="hidetext">Comentar</span>
                            </div> --}}
                            </div>
@endif
                            <div class="clearfix"></div>

                            <!-- Short Description  -->
                            <div class="ad-box">
                                <div class="short-features">
                                    <!-- Heading Area -->
                                    <div class="heading-panel">
                                        <h3 class="main-title text-left">
                                            Descripción
                                        </h3>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xs-12 no-padding">
                                        <span><strong></strong></span> {{ $anuncio->descripcion }}
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span><strong>Ciudad</strong>:</span> {{ $anuncio->ciudad }}
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span><strong>Edad</strong> :</span> {{ $anuncio->edad }}
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span><strong>Contacto</strong> :</span>{{ $anuncio->user->telefono }}
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span><strong>Publicado</strong> :</span>{{ $anuncio->created_at }}
                                    </div>
                                </div>

                            </div>

                            {{-- VALORACION CON ESTRELLAS - SECCION COMENTARIOS --}}
                            @if($anuncio->user->estado_comentar=="habilitado")
                            <div class="ad-box" style="margin-top:20px;">
                                <div class="short-features">
                                    <!-- Heading Area -->
                                    <div class="heading-panel">
                                        <h3 class="main-title text-left">
                                            Comentarios
                                        </h3>
                                    </div>
                                    @if(count($anuncio->ratings)==0)
                                    <p class="lead">Aún no hay comentarios. Se el primero en comentar.</p>
                                    @else
                                    
                                    @foreach($anuncio->ratings as $rating)
                                    <div class="col-sm-12 col-md-12 col-xs-12 no-padding" style="display:flex; justify-content:space-between;"> 
                                        <div style="text-align: left">
                                        {{ $rating->created_at }}
                                         </div>
                                 
                                            <div class="rate"  >
                                            @for($i=1; $i<=$rating->rating; $i++)
                                                <input type="radio" id="star1" name="rate" value="1" />
                                                <label for="star1" style="color:#ffc700" title="text">1 star</label>
                                    
                                            @endfor
                                        </div>
                                       
                                       
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span><strong>{{$rating->user->name}}</strong>:</span> {{ $rating->comment }}
                                    </div>
                                   @endforeach

                                   @endif
                                </div>

                            </div>
                            @endif


                        </div>

                    </div>
                    <div class="col-md-2 col-sm-2 hidden-xs hidden-sm rightbar-stick">
                        <div class="theiaStickySidebar"> <img alt="" src="{{ asset('images/160x600.png') }}"> </div>
                    </div>
                    <!-- Main Container End -->
        </section>

        <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
        <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
        @include('templates.footer')
        <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
    </div>
    <!-- Main Content Area End -->
    <!-- Post Ad Sticky -->

    <!-- Back To Top -->
    <a href="#0" class="cd-top">Top</a>

    <!-- =-=-=-=-=-=-= Share Modal =-=-=-=-=-=-= -->
    <div class="modal fade share-ad" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span
                            class="sr-only">Close</span></button>
                    <h3 class="modal-title">Compartir</h3>
                </div>
                <div class="modal-body">
                    <div class="recent-ads">
                        <div class="recent-ads-list">
                            <div class="recent-ads-container">
                                <div class="recent-ads-list-image">
                                    <a href="#" class="recent-ads-list-image-inner">
                                        <img src="{{$anuncio->images->pluck('url')[0]}}" alt="">
                                    </a><!-- /.recent-ads-list-image-inner -->
                                </div>
                                <!-- /.recent-ads-list-image -->
                                <div class="recent-ads-list-content">
                                    <h3 class="recent-ads-list-title">
                                        <a href="#">Titulo anuncio</a>
                                    </h3>
                                    <ul class="recent-ads-list-location">
                                        <li><a href="#"></a>Ciudad: {{$anuncio->ciudad}}</li>
                                        <br/>
                                        <li><a href="#"></a>Dirección: {{$anuncio->direccion}}</li>
                                    </ul>
                                    <div class="recent-ads-list-price">

                                    </div>
                                    <!-- /.recent-ads-list-price -->
                                </div>
                                <!-- /.recent-ads-list-content -->
                            </div>
                            <!-- /.recent-ads-container -->
                        </div>
                    </div>
                    <h3>Descripcion</h3>
                    <p>{{$anuncio->descripcion}}.</p>
                    <h3>Enlace</h3>
                    <p><a href="{{request()->fullUrl()}}">{{request()->fullUrl()}}</a></p>
                </div>
                <div class="modal-footer">
                    <a target="_blank"
                        href="http://www.facebook.com/sharer.php?u={{request()->fullUrl()}}&t=Pasionreal.com"
                        target="_blank" class="btn btn-fb btn-md"><i class="fab fa-facebook"></i></a>
                    <a target="_blank"
                        href="https://twitter.com/intent/tweet?url={{request()->fullUrl()}}&text={{$anuncio->titulo}}&via={{config('app.name,Pasionreal.es')}}&hashtags={{config('app.name,Pasionreal.es')}}"
                        class="btn btn-twitter btn-md"><i class="fab fa-twitter"></i></a>
                    <a style="background-color:#25DB30!important" target="_blank"
                        href="https://api.whatsapp.com/send?text={{request()->fullUrl()}}  ,  {{$anuncio->descripcion}}"
                        class="btn btn-gplus btn-md"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- =-=-=-=-=-=-= Report Ad Modal =-=-=-=-=-=-= -->
    <div class="modal fade report-quote" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Cerrar</span></button>
                    <h3 class="modal-title">Porqué razón quieres reportar este anuncio?</h3>
                </div>
                <div class="modal-body">
                    <!-- content goes here -->
                    <form action="{{route('cliente.reportar')}}" method="POST">
                        @csrf
                        <div class="skin-minimal">
                            <div class="form-group col-md-6 col-sm-6">
                                <ul class="list">
                                    <li>
                                        <input type="radio" id="spam"  value="1" name="minimal-radio">
                                        <label for="spam">Spam</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="duplicated" value="2" name="minimal-radio">
                                        <label for="duplicated">No asiste a los encuentros</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <ul class="list">
                                    <li>
                                        <input type="radio" id="spam" value="3" name="minimal-radio">
                                        <label for="spam">Duplicación de identidad</label>
                                        
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="form-group  col-md-12 col-sm-12">
                            <label>Agrega un comentario</label>
                            <textarea name="comentario" placeholder="El contenido del anuncio me pertenece..." rows="3"
                                class="form-control">El contenido del anuncio me pertenece...</textarea>
                        <input name="anuncio_id" type="text" value="{{$anuncio->id}}" style="display:none">
                            </div>
                        
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 margin-bottom-20 margin-top-20">
                            <button type="submit" class="btn btn-theme btn-block">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


   @include('components.modalComentar')

    <!-- SCRIPTS -->
    @include('templates.scripts')
</body>

</html>