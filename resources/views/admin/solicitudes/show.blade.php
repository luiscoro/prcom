@extends('admin.spaceadmin')
@section('contenido')
<link rel="stylesheet" href="{{asset('css/hoverimg.css')}}">
<div class="contenedor">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{Session::get('mensaje')}}
<button type="button" class="close" data-dismiss="alert" role="alert">
<span aria-button="true">&times;</span>
</button>
</div>
@endif

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="container text-center pt-5">
            <div class="contenedor">
                @if(!isset($solicitud->image->url))
                <img style="max-width:200px;" class="image img-lg  mb-3" src="{{asset('images/user_default.png')}}" alt="foto">
                @else
                  <img style="max-width:200px;" class="image  mb-3" src="{{$solicitud->image->url}}" class="card-img-top" alt="...">
                 @endif
            </div>
          
          <h4 class="mb-3 mt-5">Solicitud de verificación de cuenta</h4>
          <p class="w-75 mx-auto mb-5"></p>
          <div class="row pricing-table">
            <div class="col-md-4 grid-margin stretch-card pricing-card">
            
            </div>
            <div class="col-md-4 grid-margin stretch-card pricing-card">
              <div class="card border border-success pricing-card-body">
                <div class="text-center pricing-card-head">
                  <h3 class="text-success">{{$cliente->name}}</h3>
                  <p></p>
                  <h1 class="font-weight-normal mb-4">Generado: {{$solicitud->codigo_generado}} <br> Enviado: {{$solicitud->codigo_enviado}}</h1>
                </div>
                <ul class="list-unstyled plan-features">
                  {{-- <li>{{$cliente->perfil->dni}}</li>
                  <li>{{$cliente->direccion}}</li> --}}
                
                </ul>
                <div class="wrapper">
                  <a href="{{route('reportar',$cliente->id)}}" class="btn btn-success btn-block">Banear cuenta</a>
                </div>
                <p class="mt-3 mb-0 plan-cost text-success"><a href="{{route('admin.reportes')}}">o dejar pasar</a></p>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card pricing-card">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



</div>


@endsection



