@extends('layouts.main')
@section('content')

<link rel="stylesheet" href="{{asset('css/visible_info.css')}}">
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
                 Validar cuenta  
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
             <form method="POST" action="{{route('home.validacionCuenta')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                   <label>Código</label>
                   <input id="codigo" placeholder="Ingrese el código que llegará a tu celular" class="form-control @error('codigo') is-invalid @enderror" type="codigo" name="codigo_enviado" value="{{ old('codigo_enviado') }}" required >
                   @error('codigo_enviado')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                </div>
                <div class="form-group">
                   <label>Foto de ti   </label>
                   <input type="checkbox" title="ayuda" class="ayuda" name="ayuda" id="ayuda">

                   <div class="info hidden" id="info">
                      <ul>
                         <p>Para facilitar la validación de tu cuenta, la foto deberá ser tomada:</p>
                         <li>1. De frente*</li>
                         <li>2. Desde la cintura a la cabeza*</li>
                         <li>3. Mostrando en una hoja el código que será enviado a su correo electrónico*</li>
                      </ul>
                   </div>

                   <input id="foto" class="form-control @error('foto') is-invalid @enderror" type="file" name="foto"  autocomplete="current-foto">
                   @error('foto')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
                </div>
              
                <button class="btn btn-theme btn-lg btn-block" type="submit">Enviar código</button>
             </form>
          </div>
          <!-- Form -->
       </div>
       <!-- Middle Content Area  End -->
    </div>
    <!-- Row End -->
 </div>
 <!-- Main Container End -->

 <script>
   
    function change(e){
      var info = document.getElementById('info');
      if(e.currentTarget.checked)
         info.classList.remove('hidden');
      else
         info.className += " hidden";
      
    }

    document.addEventListener('DOMContentLoaded', e => {
    document.querySelector('.ayuda').addEventListener('change',change);
});
 </script>
@endsection