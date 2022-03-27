@extends('layouts.main')

@section('content')
 <!-- Main Container -->
 
 <div class="container">
    <!-- Row -->
    <div class="row">
       <!-- Middle Content Area -->
       <div class="col-md-6 col-md-push-3 col-sm-6 col-xs-12">
        
          <!--  Form -->
          <div class="form-grid">
            <div class="heading-panel">
                <h3 class="main-title text-left">
                  Recuperar contraseña
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
            
             
             <form method="POST" action="{{ route('home.postPasswordReset') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
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
                   <label>Nueva Contraseña</label>
                   <input id="password" placeholder="Ingresa tu contraseña" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                   @error('password')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                </div>

                <div class="form-group">
                    <label>Confirmar nueva contraseña</label>
                    <input id="password-confirm" placeholder="Confirma tu contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                     @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                 </div>
               
                <button class="btn btn-theme btn-lg btn-block" type="submit">Iniciar sesión</button>
                <p></p>
              
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