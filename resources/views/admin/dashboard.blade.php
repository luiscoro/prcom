@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Bienvenido al panel de administración</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script>
    Swal.fire(
  {title:`Saludos, bienvenido al panel de administración`  ,
  timer:4000
  }
)
</script>
@stop