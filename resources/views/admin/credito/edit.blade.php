@extends('adminlte::page')
@section('content')
<div class="container">
<form method="post" enctype="multipart/form-data" action="{{url('admin/credito/'.$credito->id)}}">
    @csrf
    {{method_field('PATCH')}}

@include('admin.credito.form',['modo'=>'Editar'])
</form>
</div>
@endsection