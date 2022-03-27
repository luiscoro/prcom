@extends('admin.spaceadmin')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
      Ordenes
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ordenes</li>
      </ol>
    </nav>
  </div>

    <div class="container">

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" role="alert">
                    <span aria-button="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Ordenes</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">

        <table id="order-listing" class="table">
            <thead >
                <tr>
                    <th>#</th>
                    <th>Fecha de orden</th>
                    <th>Teléfono</th>
                    <th>dni</th>
                    <th>Subtotal</th>
                    
                    <th>ID de usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($ordenes as $orden)
                    <tr>
                        <td>{{ $orden->id }}</td>
                        <td>{{ $orden->fecha_orden }}</td>
                        <td>{{$orden->telefono}}</td>
                        <td>{{$orden->dni}}</td>
                        <td>{{ $orden->subtotal }}</td>
                        <td>{{ $orden->user_id }}</td>
                        <td>
                            <a href="{{url('/admin/datos-cliente/' . $orden->id)}}" class="btn btn-success" title="Ver más"><li class="fa fa-eye"></li></a>
                            
                            <a target="_blank" class="btn btn-info" style="margin-left:10px;" href="{{route('admin.pdfOrden',$orden->id)}}" title="Descargar orden"><li class="fa fa-file-pdf"></li></a>
                        </td>
                        {{-- <td>
                            <a href="{{ url('admin/orden/' . $orden->id . '/edit') }}" id="botoncol"
                                class="btn btn-warning mb-2 "><i class="fas fa-edit"></i></a>

                            <form method="post" action="{{ url('admin/orden/' . $orden->id) }}" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Desea borrar?')"><i
                                        class="fas fa-trash-alt"></i></button>

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
        {!! $ordenes->links() !!}
    </div>
@endsection
