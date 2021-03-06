<link rel="stylesheet" href="{{ asset('css/campoVisible.css') }}">
@extends('layouts.main')

@section('content')
    <!-- Main Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Middle Content Area -->
            <div class="col-md-6 col-md-push-3 col-sm-6 col-xs-12">

                @if (Session::has('mensaje'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ Session::get('mensaje') }}
                        <button type="button" class="close" data-dismiss="alert" role="alert">
                            <span aria-button="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('advertencia'))
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        {{ Session::get('advertencia') }}
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
                <!--  Form -->
                <div class="form-grid">
                    <div class="heading-panel">
                        <h3 class="main-title text-left">
                            Registra tu cuenta
                        </h3>
                    </div>
                    <form method="POST" action="{{ route('home.postValidarCuenta') }}" id="form-registro">
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Apellidos</label>

                            <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror"
                                name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                            @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tel??fono</label>

                            <input id="telefono" type="tel" class="form-control @error('telefono') is-invalid @enderror"
                             name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                            {{-- <small>Formato: 123-456-789</small> --}}
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Fecha de nacimiento</label>

                            <input id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                            @php
                            $anio_actual= date('Y');
                            $anio_actual = intval($anio_actual);
                            $anio_maximo = $anio_actual-18;
                            @endphp    
                            name="fecha_nacimiento" min="1975-01-01"  max="{{$anio_maximo}}-01-31" value="{{ old('fecha_nacimiento') }}" required autocomplete="fecha_nacimiento" autofocus>

                            @error('fecha_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label>Correo electr??nico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Contrase??a</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirmar contrase??a</label>
                            <input placeholder="Vuelve a ingresar tu contrase??a" id="password-confirm" type="password"
                                class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label>Deseas validar la cuenta a registrar?</label>
                            <select id="opcionValidar" class="form-select" {{-- onchange="opcion();" --}} name="opcionValidar">
                                <option value="Si">Si</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>

                        {{-- <div class="form-group hidden" id="telefono">
                     <label for="telefono">Ingresa el contacto al que quieres que te llegue el c??digo de verificaci??n</label>
                     <input type="tel" class="form-control" name="telefono" id="telefono" >
                  </div> --}}

                        {{-- @if (Request::get('minimal-checkbox-1'))
                 {
                    <div class="form-group">
                        <label>Fotos</label>
                        <input class="form-control" type="file" multiple>
                     </div>
                     <div class="form-group">
                        <label>N??mero de contacto</label>
                        <input placeholder="Ingresa tu n??mero de contacto" class="form-control" type="text">
                     </div>
                 }
                 @endif --}}

                        <button type="submit" class="btn btn-theme btn-lg btn-block">Registrarse</button>
                        <p></p>
                        <div class="row">
                            <div class="col-xs-12 center-block text-center">
                                <p class="help-block"><a  href="{{ route('login') }}">??Ya tienes una
                                        cuenta?</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Form -->
            </div>

            <!-- Middle Content Area  End -->
        </div>
        <!-- Row End -->
    </div>

    <!-- Main Container End -->

    {{-- <script>
    function opcion(){
  var op = document.getElementById("opcionValidar").value;
  console.log(op);
  var telefono = document.getElementById('telefono');
  if(op == "No"){
    telefono.className+=" hidden";
  }else{
    telefono.classList.remove('hidden');
  }
}
 </script> --}}


@endsection
