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
                  Recupera el acceso a tu cuenta
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
             <form method="POST" action="{{ route('password.email') }}">
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
                <button class="btn btn-theme btn-lg btn-block" type="submit">Enviar enlace</button>
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