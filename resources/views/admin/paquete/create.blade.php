@extends('admin.spaceadmin')
@section('contenido')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Agregar categoría para un anuncio</h4>
<form method="post" action="{{url('/admin/paquete')}}" enctype="multipart/form-data">
<!-- //ESTO ME APUNTA A CATEGORIA.STORE -->
@csrf
@include('admin.paquete.form',['modo'=>'Crear'])
</form>
</div>
</div>
</div>
@endsection