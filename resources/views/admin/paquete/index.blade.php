@extends('admin.spaceadmin')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Paquetes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Paquetes</li>
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


        <div class="menu__datos">
            <div class="botones">
                <a href="{{ url('admin/paquete/create') }}" class="btn btn-success mb-2">Registrar nuevo paquete</a>
                <!-- Se manda a llamar al metodo create que trae la vista del formulario -->
            </div>

        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Paquetes</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead >
                                    <tr>
                                        <th>#</th>
                                        <th>Lapso de activación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($paquetes as $paquete)
                                        <tr>
                                            <td>{{ $paquete->id }}</td>
                                            <td>{{ $paquete->periodo_horas }}</td>
                                            <td>
                                                <a href="{{ url('admin/paquete/' . $paquete->id . '/edit') }}" id="botoncol"
                                                    class="btn btn-warning  "><i class="fas fa-edit"></i></a>

                                                <form method="post" action="{{ url('admin/paquete/' . $paquete->id) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Desea borrar?')"><i
                                                            class="fas fa-trash-alt"></i></button>

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
        {!! $paquetes->links() !!}
    </div>
@endsection
