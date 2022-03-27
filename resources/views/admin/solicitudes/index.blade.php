@extends('admin.spaceadmin')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
      Solicitudes
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Solicitudes</li>
      </ol>
    </nav>
  </div>


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{Session::get('mensaje')}}
<button type="button" class="close" data-dismiss="alert" role="alert">
<span aria-button="true">&times;</span>
</button>
</div>
@endif

<div class="card">
    <div class="card-body">
      <h4 class="card-title">Solicitudes</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">

<table id="order-listing" class="table">
<thead>
<tr>
<th>#</th>
<th>Usuario</th>
<th>Cuenta verificada</th>
<th>Código recibido</th>
<th>Código enviado por el usuario</th>
<th>Foto</th>
<th>Acciones</th>
</tr>
</thead>

    <tbody>
    @foreach($solicitudes as $s)
        <tr>
            <td>{{$s->id}}</td>
            <td>{{$s->user->name}}</td>
            <td>{{$s->user->cta_validada}}</td>
            <td>{{$s->codigo_generado}}</td>
            <td>{{$s->codigo_enviado}}</td>
            <td>
                @if(!isset($s->image->url))
                <img  class="img-thumbnail img-fluid" width="100px" src="{{asset('images/default/solicitud.png')}}" alt="foto">
                @else
                <img   class="img-thumbnail img-fluid" width="100px" src="{{$s->image->url}}" alt="foto">
                @endif
              
              
            </td>
            
            <td>
              
                   <a class="btn btn-success" title="Cambiar estado" href="{{route('solicitud.aprobarCuenta',$s->user_id)}}"><i class="fas fa-user-check"></i></a>
                   <a class="btn btn-info" title="Ver solicitud" href="{{route('solicitud.show',$s)}}"><i class="fas fa-eye"></i></a>
      
           
            <form method="post" action="{{url('admin/solicitud/'.$s->id)}}" class="d-inline">
            @csrf
            {{method_field('DELETE')}}
                <input type="submit" value="Borrar" id="botoncol" class=" btn btn-danger" onclick="return confirm('Desea borrar?')">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
{!!$solicitudes->links() !!}

@endsection
