@extends('admin.spaceadmin')
{{-- <link rel="stylesheet" href="{!! asset('css/producto/productosInventario.css') !!}"> --}}
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
      Miembros
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Miembros</li>
      </ol>
    </nav>
  </div>

<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{Session::get('mensaje')}}
<button type="button" class="close" data-dismiss="alert" role="alert">
<span aria-button="true">&times;</span>
</button>
</div>
@endif

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
@foreach($errors->all() as $error)
<li>
{{$error}}
</li>
@endforeach
</ul>
</div>
@endif


      <div class="menu__datos">
<div class="botones">
<a href="{{route('miembro.create')}}" class="btn btn-success mb-2">Registrar nuevo miembro</a>
<!-- Se manda a llamar al metodo create que trae la vista del formulario -->
</div>

</div>

<div class="card">
    <div class="card-body">
      <h4 class="card-title">Miembros</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">

<table id="order-listing" class="table">
<thead >
<tr>
<th>#</th>
<th>Nombre</th>
<th>Correo electrónico</th>
<th>Foto</th>

{{-- <th>Acciones</th> --}}
</tr>
</thead>

    <tbody>
    @foreach($miembros as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->name}}</td>
            <td>{{$c->email}}</td>
            <td>
                @if(!isset($c->perfil->image->url))
                <img src="{{asset('images/user_default.png')}}" alt="foto">
                @else
                <img src="{{$c->perfil->image->url}}" alt="foto">
                @endif
            </td>
            {{-- <td>{{$c->password}}</td>     --}}
            {{-- <td>
            <a href="{{url('admin/categoria/'.$c->id.'/edit')}}" id="botoncol" class="btn btn-warning mb-2 ">Editar</a>

            <form method="post" action="{{url('admin/categoria/'.$c->id)}}" class="d-inline">
            @csrf
            {{method_field('DELETE')}}
                <input type="submit" value="Borrar" id="botoncol" class="btn btn-danger" onclick="return confirm('Desea borrar?')">
            </form>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</div>
</div>
</div>
</div>

</div>
@endsection
