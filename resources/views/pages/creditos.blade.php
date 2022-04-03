<!DOCTYPE html>
<html lang="es">

@include('templates.head')

<body>

    <!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->

    @include('templates.header2')
    <!-- Navigation Menu End -->
    <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
    <div class="page-header-area">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-page">
                        <h1>Comprar crédito</h1>
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
                    <li><a href="{{ url('/creditos') }}">Comprar</a></li>
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
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <section class="section-padding  gray ">
            <!-- Main Container -->
            <div class="container" style="padding-bottom:20px;">
                <!-- Row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- end post-padding -->
                        <div class="post-ad-form extra-padding postdetails">
                            <div class="heading-panel">
                                <h3 class="main-title text-left">
                                    Compra créditos
                                </h3>
                            </div>
                            <form method="post" action="{{ route('cliente.creditosGratis') }}" id="formGratis">
                                @csrf
                                <input type="hidden" name="creditos_gratis" value="20">
                            </form>
                            <form method="POST" id="formPaga" action="{{ route('cliente.comprarCredito') }}">
                            @csrf
                                
                                <!-- Select Package  -->
                                @if ($count_users != 100)
                                    <div class="select-package">

                                        @if (Auth::user()->credito_gratis == '0')
                                            <h3 class="margin-bottom-20">Créditos gratis</h3>
                                        @endif
                                        <div class="no-padding col-md-12 col-lg-12 col-xs-12 col-sm-12">

                                            {{-- @foreach ($creditos as $credito) --}}
                                            @if (Auth::user()->credito_gratis == '0')
                                                <div class="pricing-list">

                                                    <div class="row">
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <h3>
                                                                {{-- {{$credito->cantidad}} --}}
                                                                20 créditos </h3>
                                                            <p>Por la aquisición de cada crédito tendrás la posibilidad
                                                                de
                                                                ubicar a tus anuncios en lo más alto.</p>
                                                        </div>
                                                        <!-- end col -->
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <div class="pricing-list-price text-center">

                                                                <h2>Gratis</h2>
                                                                {{-- @if ($credito->valor == 0)
                                                        <h4 style="color:green">Gratis</h4>
                                                        @else
                                                        <h4>€ {{$credito->valor}} c/crédito </h4>
                                                        @endif --}}
                                                                <a id="0" {{-- id="{{$credito->id}}" --}}
                                                                    class="btn btn-theme btn-sm btn-block selection">Seleccionar</a>
                                                            </div>
                                                        </div>

                                                        <!-- end col -->
                                                    </div>


                                                    <!-- end row -->
                                                </div>
                                            @endif
                                            {{-- @endforeach --}}
                                            <input type="hidden" id="idcredito" value="-1" name="idcredito"
                                                style="display: none">
                                        </div>
                                    </div>

                                @endif
                                <div>
                                    <label class="" style="font-size:24px;">Comprar créditos <small
                                            style="font-size:14px;">Indique la cantidad de créditos a
                                            adquirir</small></label>
                                    <input type="number" class="creditos" min="0" max="100" name="creditos"
                                        value="0" id="creditos">
                                </div>

                                <div 
                                    style="display: flex; justify-content:flex-end; color:black; font-weight:700;">
                                    <p>Total:EUR <small id="total" class="total" style="color:black; font-weight:700;">0</small></p>
                                </div>
                                <a id="btn_pagar" onclick="go();" class="btn btn-theme pull-right btn_pagar">Adquirir
                                    créditos</a>
                            </form>
                        </div>
                        <!-- end post-ad-form-->
                    </div>
                    <!-- end col -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Main Container End -->
            @include('templates.footer')
            <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
    </div>


   

    @include('templates.scripts')

<script>
    function calcularTotal(e)
    {
        let cant_creditos = e.target.value;
        let total = cant_creditos*0.20;
       
         document.querySelector('.total').textContent=total.toFixed(2);
    }

      document.addEventListener('DOMContentLoaded', e => {
        
        document.querySelector('.creditos').addEventListener('change', calcularTotal);
        document.querySelector('.selection').addEventListener('click', selectGratis);
      
    });
    function go() {
        
        var textBtnGratis = document.getElementById('0');
        var creditosPaga = document.getElementById('creditos');

        var formGratis = document.getElementById("formGratis");
        var formPaga = document.getElementById("formPaga");

        if (creditosPaga.value > 0) {
            formPaga.submit();
        }

        if (textBtnGratis.textContent === "Seleccionado" && creditosPaga.value == 0) {
            document.getElementById('idcredito').value = "0";
            // alert('primera opcion');
            formGratis.submit();
        }

        if (textBtnGratis.textContent === "Seleccionado" && creditosPaga.value > 0) {
            document.getElementById('idcredito').value = "0";
            // alert('segunda opcion');
            formPaga.submit();
        }

        if (textBtnGratis.textContent === "Seleccionar" && creditosPaga.value > 0) {
            // alert('tercera opcion');
            formPaga.submit();
        }

    }

    function selectGratis(e) {
        if (e.currentTarget.textContent === "Seleccionar") {
            e.currentTarget.textContent = "Seleccionado";
        } else {
            e.currentTarget.textContent = "Seleccionar";
        }
    }

    // function calcularTotal(e) {
    //     alert("calculando");
    // }
</script>

</body>

</html>
