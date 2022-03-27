@extends('admin.spaceadmin')
@section('contenido')
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
          @if(!isset($cliente->perfil->image->url))
          <img style="max-width:150px;" class="img-lg rounded-circle mb-3" src="{{asset('images/user_default.png')}}" alt="foto">
          @else
            <img style="max-width:300px;" class="img-lg rounded-circle mb-3" src="{{$cliente->perfil->image->url}}" class="card-img-top" alt="...">
           @endif
          <h4 class="mb-3 mt-5">Titulo del anuncio</h4>
          <p class="w-75 mx-auto mb-5">Descripción del anuncio</p>
          <div class="row pricing-table">
            <div class="col-md-4 grid-margin stretch-card pricing-card">
            
            </div>
            <div class="col-md-4 grid-margin stretch-card pricing-card">
              <div class="card border border-success pricing-card-body">
                <div class="text-center pricing-card-head">
                  <h3 class="text-success">{{$cliente->name}}</h3>
                  <p>{{$cliente->email}}</p>
                  <h1 class="font-weight-normal mb-4">{{$cliente->perfil->telefono}}</h1>
                </div>
                <ul class="list-unstyled plan-features">
                  <li>{{$cliente->perfil->dni}}</li>
                  <li>{{$cliente->direccion}}</li>
                
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



