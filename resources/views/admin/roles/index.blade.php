@extends('admin.spaceadmin')
{{-- <link rel="stylesheet" href="{!! asset('css/producto/productosInventario.css') !!}"> --}}
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Roles
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Roles</li>
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
<a href="{{route('roles.create')}}" class="btn btn-success mb-2">Registrar nuevo rol</a>
<!-- Se manda a llamar al metodo create que trae la vista del formulario -->
</div>

</div>

<div class="card">
    <div class="card-body">
      <h4 class="card-title">Roles</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">

<table c id="order-listing" class="table">
<thead >
<tr>
<th>#</th>
<th>Rol</th>
<th>Acciones</th>
</tr>
</thead>

    <tbody>
    @foreach($roles as $rol)
        <tr>
            <td>{{$rol->id}}</td>
            <td>{{$rol->name}}</td>
          
            
            <td>
           

            <form method="post" action="" class="d-inline">
                <a href="" id="botoncol" class="btn btn-warning" title="Editar rol"><li class="fas fa-edit"></li></a>
            @csrf
            {{method_field('DELETE')}}
                <input type="submit" value="Borrar" id="botoncol" class="btn btn-danger" onclick="return confirm('Desea borrar?')">
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

</div>
@endsection