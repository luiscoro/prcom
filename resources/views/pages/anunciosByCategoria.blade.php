<!DOCTYPE html>
<html lang="es">
@include('templates.head')

<body>

    <!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->
    @include('templates.header2')
    {{-- @include('templates.header') --}}

    <!-- Navigation Menu End -->
    <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
    @include('components.banner1280x330',['titulo'=>'Anuncios'])
    <!-- Small Breadcrumb -->
    <div class="small-breadcrumb">
        <div class="container">
            <div class=" breadcrumb-link">
                <ul>
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a class="active" href="">Categorías</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Small Breadcrumb -->
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Featured Listing =-=-=-=-=-=-= -->
        <section class="custom-padding pattern-bg">
            <!-- Main Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    @foreach ($anunciosByCategoria as $anuncio)


                    <!-- Minimal Category -->
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <a href="{{route('home.detalle',$anuncio->id) }}">
                            <div class="minimal-category">
                                <div class="minimal-img">
                                    <img alt="imagen de categoria" class="img-responsive"
                                        src="{{ $anuncio->images->pluck('url')[0] }}">
                                </div>
                                <div class="minimal-overlay"></div>
                                <div class="description">
                                    <span>{{ $anuncio->titulo }}</span>
                                    {{-- <div class="ads-count">2,768 Ads</div> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Minimal Category -->
                    @endforeach

                </div>

                <!-- Row End -->
            </div>
            <!-- Main Container End -->
        </section>
        <!-- =-=-=-=-=-=-= Featured Listing End =-=-=-=-=-=-= -->
        <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
        @include('templates.footer')
        <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
    </div>
    <!-- SCRIPTS -->
    @include('templates.scripts')
</body>

</html>