@extends('admin.spaceadmin')
@section('contenido')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Agregar Rol para el sitio</h4>
<form method="post" action="{{route('roles.store')}}">
<!-- //ESTO ME APUNTA A CATEGORIA.STORE -->
@csrf
@include('admin.roles.form',['modo'=>'Crear'])
</form>
</div>
</div>
</div>
@endsection