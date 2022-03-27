@extends('admin.spaceadmin')
@section('contenido')

<div class="page-header">
    <h3 class="page-title">
      Reportes
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Reportes</li>
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



<div class="card">
    <div class="card-body">
      <h4 class="card-title">Reportes</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">

<table id="order-listing" class="table">
<thead >
<tr>
<th>Reporte #</th>
<th>Motivo</th>
<th>Comentario</th>
<th>Autor de anuncio</th>
<th>Acciones</th>
</tr>
</thead>

    <tbody>
    @foreach($reportes as $reporte)
        <tr>
            <td>{{$reporte->id}}</td>
            <td>{{$reporte->motivo}}</td>
            <td>{{$reporte->comentario}}</td>
            <td><a>{{$reporte->user->name}}</a></td>
            <td>
            {{-- <a href="{{route('reportar',$reporte->user->id)}}" id="botoncol" class="btn btn-warning mb-2 "><i class="fas fa-edit">Banear</i></a>
        <br/> --}}
        <a href="{{route('admin.usuarioReportado',$reporte->user->id)}}" class="btn btn-success mb-2"><i class=" fas fa-eye"></i></a>    
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

{!!$reportes->links() !!}
</>
@endsection
