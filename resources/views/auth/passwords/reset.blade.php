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
                  Restablece tu contraseña
                </h3>
             </div>
             <form method="POST" action="{{ route('password.update') }}">
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
                   <label>Contraseña</label>
                   <input id="password" placeholder="Ingresa tu contraseña" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                   @error('password')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                </div>
                <div class="form-group">
                    <label>Confirmar contraseña</label>
                   <input id="password-confirm" placeholder="Ingresa tu contraseña" class="form-control @error('password') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password">
                   @error('password')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                 </div>
                <button class="btn btn-theme btn-lg btn-block" type="submit">Restablecer</button>
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