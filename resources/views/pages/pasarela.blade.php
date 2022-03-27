@include('templates.head')

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
                        <h1>Pasarela de pagos </h1>
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
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a class="active" href="{{ route('cliente.pasarela') }}">Pagar créditos</a></li>
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
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Small Breadcrumb -->
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <section class="section-padding  gray ">
            <!-- Main Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                        <!-- end post-padding -->
                        <div class="post-ad-form postdetails">
                            <div class="heading-panel">
                                <h3 class="main-title text-left">
                                    Pagar créditos
                                </h3>
                            </div>

                            <div class="comment-info">
                                <h3 style="text-align:center; color: black; font-weight:700">Carrito</h4>
                                    <img style="margin-top:-20px;" class="pull-left hidden-xs img-circle" src="{{asset('/images/icons/credito.png')}}"
                                        alt="author">
                                        @if($idcredito == 0)
                                    <div class="author-desc">
                                        <div class="author-title">
                                            <strong>10 Créditos gratis</strong>
                                            
                                        </div>
                                    </div>
                                    @endif
                                    @if($creditosx>0)
                                    <div class="author-desc">
                                        <div class="author-title">
                                            
                                            <strong>{{$creditosx}} Créditos</strong>
                                            <ul class="list-inline pull-right">
                                                <li><a href="#">08-12-2021</a>
                                                </li>
                                                <li><a href="{{ route('cliente.creditos') }}"><i
                                                            class="fa fa-trash"></i> Remover</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                            </div>
                            <form method="POST" action="{{route('cliente.comprarCredito') }}">
                                <!-- Title  -->
                                @csrf
                                <input type="hidden" name="idcredito" value="{{$idcredito}}" >
                                <input type="hidden" name="creditos" value="{{$creditosx}}" >
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        <label class="control-label">Nombre completo <small>Ingresa tu nombre
                                                completo</small></label>
                                        <input name="nombre_completo" class="form-control" type="text" value="{{ old('nombre-completo') }}"  required>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:20px;">
                                    <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                                        <label class="control-label">Identificación<small> Ingresa tu número de
                                                identificación</small></label>
                                        <input name="dni" class="form-control" type="text" value="{{ old('dni') }}" required>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                                        <label class="control-label">Teléfono<small> Ingresa tu número de
                                                contacto</small></label>
                                        <input name="telefono" class="form-control" value="{{ old('telefono') }}" type="text" required>
                                    </div>
                                </div>

                                <!-- Featured Ad  -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        {{-- <label class="control-label">Selecciona la forma de pago</label> --}}
                                        {{-- <div class="skin-minimal">
                                            <ul class="list">
                                                <li>
                                                    <input type="radio" id="bank" name="radio" value="1">
                                                    <label for="bank">Tarjeta de crédito</label>
                                                </li>

                                                <li>
                                                    <input type="radio" id="paypal" name="radio" value="2" checked>
                                                    <label for="paypal">Paypal</label>
                                                </li>

                                            </ul>
                                        </div> --}}
                                    </div>
                                </div>

                                <!-- end row -->
                                <div style="display:flex; justify-content:center;">
                                    <button type="submit" class="btn btn-theme pull-right">Pagar</button>
                                </div>
                               
                            </form>
                        </div>
                        <!-- end post-ad-form-->
                    </div>
                    <!-- end col -->
                    <!-- Right Sidebar -->
                    <div class="col-md-4 col-xs-12 col-sm-12">
                        <!-- Sidebar Widgets -->
                        <div class="blog-sidebar">
                            <!-- Categories -->
                            <div class="widget">
                                <div class="widget-heading">
                                    <h4 class="panel-title text-center"><a>Resumen </a></h4>
                                </div>
                                @if($idcredito==0)
                                <div class="widget-heading">
                                    <h4 class="panel-title"><a>créditos gratis: 10 </a></h4>
                                </div>
                                @endif
                                <div class="widget-heading">
                                    <h4 class="panel-title"><a>N° créditos: {{ $creditosx }}</a></h4>
                                </div>
                                <div class="widget-heading">
                                @php
                                $creditosgratis=0;
                                    if($idcredito==0){
                                    $creditosgratis=10;
                                    }
                                @endphp

                                    <h4 class="panel-title"><a>Total créditos: {{ $creditosx+$creditosgratis }}</a></h4>
                              
                                </div>
                                <div class="widget-heading">
                                    <h4 class="panel-title"><a>Subtotal: ${{ $creditosx * 0.2 }} </a></h4>
                                </div>
                                <div class="widget-heading">
                                    <h4 class="panel-title"><a>Total: ${{ $creditosx * 0.2 }} </a></h4>
                                </div>
                            </div>


                            <!-- Latest News -->
                        </div>
                        <!-- Sidebar Widgets End -->
                    </div>
                    <!-- Middle Content Area  End -->
                    <!-- end col -->
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