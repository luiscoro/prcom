@extends('admin.spaceadmin')
@section('contenido')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Agregar miembro para el sitio</h4>
<form method="post" action="{{route('miembro.store')}}">
<!-- //ESTO ME APUNTA A CATEGORIA.STORE -->
@csrf
@include('admin.miembros.form',['modo'=>'Crear'])
</form>
</div>
</div>
</div>
@endsection