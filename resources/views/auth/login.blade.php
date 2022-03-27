@extends('layouts.main')

@section('content')
 <!-- Main Container -->
 <div class="container" >
    <!-- Row -->
    <div class="row">
       <!-- Middle Content Area -->
       <div class="col-md-6 col-md-push-3 col-sm-6 col-xs-12">
        
          <!--  Form -->
          <div class="form-grid">
            <div class="heading-panel">
                <h3 class="main-title text-left">
                  Inicia sesión en tu cuenta  
                </h3>
             </div>
             @if (Session::has('mensaje'))
             <div class="alert alert-success alert-dismissible" role="alert">
                 {{ Session::get('mensaje') }}
                 <button type="button" class="close" data-dismiss="alert" role="alert">
                     <span aria-button="true">&times;</span>
                 </button>
             </div>
         @endif
             <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                   <label>Correo electrónico</label>
                   <input id="email" placeholder="Ingresa tu correo electrónico" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                   @error('email')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                </div>
                <div class="form-group">
                   <label>Contraseña</label>
                   <input id="password" placeholder="Ingresa tu contraseña" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                   @error('password')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                </div>
                <div class="form-group">
                    {{-- <div class="row"> --}}
                       {{-- <div class="col-xs-12 col-sm-7">
                          <div class="skin-minimal">
                             <ul class="list">
                                <li>
                                   <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                   <label for="minimal-checkbox-1">Guardar contraseña</label>
                                </li>
                             </ul>
                          </div>
                       </div> --}}
                       
                    {{-- </div> --}}
                 </div>
                <button class="btn btn-theme btn-lg btn-block" type="submit">Iniciar sesión</button>
                <p></p>
                <div class="row">
                  <div class="col-xs-6 center-block text-center">
                     <p class="help-block">
                        @if (Route::has('password.request')) 
                        <a  href="{{ route('password.request') }}">¿Olvidaste la contraseña?</a
                        >@endif
                     </p>
                  </div>
                <div class="col-xs-6 center-block text-center">
                   
                    <p class="help-block"> 
                        <a  href="{{ route('register') }}">¿No tienes una cuenta?</a>
                       
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
@endsection