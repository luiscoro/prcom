
<!DOCTYPE html>
<html lang="es">
    

    @include('templates.head')

<body>
    <!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->
    @include('templates.header2')
    <!-- Navigation Menu End -->
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
    <div class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-page">
                        @if(Request::path() == 'login')
                        <h1>Iniciar sesión</h1>
                        @elseif(Request::path() == 'validar-cuenta')
                        <h1>Validar cuenta</h1>
                        @elseif(Request::path() == 'register')
                        <h1>Registrarse</h1>
                        @else
                        <h1>Recuperar contraseña</h1>
                    @endif
                        {{-- @if(Request::url() === (env('APP_URL').':8000/login'))
                        <h1>Iniciar sesión</h1>
                        @else
                        <h1>Registrarse</h1>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="small-breadcrumb">
        <div class="container">
            <div class=" breadcrumb-link">
                <ul>
                    <li><a href="{{url('/')}}">Inicio</a></li>
                    @if(Request::path() == 'login'))
                    <li><a class="active">{{ __('Inicio de sesión') }}</a></li>
                    @elseif (Request::path() == 'register')
                    <li><a class="active">{{ __('Registro') }}</a></li>
                    @elseif (Request::path() == 'validar-cuenta')
                    <li><a class="active">{{ __('Validación de cuenta') }}</a></li>
                    @else
                    <li><a class="active">{{ __('Recuperación de contraseña') }}</a></li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
    <!-- Small Breadcrumb -->
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page" style="background-color: white;">
            @yield('content')
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


