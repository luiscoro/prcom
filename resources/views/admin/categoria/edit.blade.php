@extends('admin.spaceadmin')
@section('contenido')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Editar categoría</h4>
<form method="post" class="forms-sample" enctype="multipart/form-data" action="{{url('admin/categoria/'.$categoria->id)}}">
    @csrf
    {{method_field('PATCH')}}

@include('admin.categoria.form',['modo'=>'Editar'])
</form>
</div>
</div>
</div>
@endsection