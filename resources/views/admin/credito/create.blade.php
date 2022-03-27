@extends('adminlte::page')
@section('content')
<div class="container">
<form method="post" action="{{url('/admin/credito')}}" enctype="multipart/form-data">
<!-- //ESTO ME APUNTA A CATEGORIA.STORE -->
@csrf
@include('admin.credito.form',['modo'=>'Crear'])
</form>
</div>
@endsection