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
      <h4 class="card-title">Notificaciones</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">

            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>Notificación #</th>
                  <th>Tipo</th>
                  <th>Información</th>
                  <th>Emitida</th>
                  <th>Leido</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                @foreach($notificaciones as $notificacion)
                <tr>
                  <td>{{$notificacion->id}}</td>
                  <td>{{$notificacion->type}}</td>
                  <td>
                    @json($notificacion->data['titulo'])
                  </td>
                  <td>{{$notificacion->created_at}}</td>
                  <td>{{$notificacion->read_at}}</td>
                  <td style="display:flex; justify-content: space-between;">
                    @if($notificacion->type=="App\Notifications\NotificacionOrden")
                    <a class="btn btn-info" title="Ver notificación"
                      href="{{ route('marcar_una_leida', [$notificacion->id, $notificacion->data['id']]) }}">
                      <li class="fas fa-eye"></li>
                    </a>
                    @elseif($notificacion->type=="App\Notifications\NotificacionReporte")
                    <a class="btn btn-info" title="Ver notificación"
                      href="{{ route('marcar_un_reporte_leido', [$notificacion->id, $notificacion->data['id']]) }}">
                      <li class="fas fa-eye"></li>
                    </a>
                    @else
                    @endif
                    <a class="btn btn-danger mx-1" title="Eliminar notificación"
                      href="{{route('notificacion.eliminar',$notificacion->id)}}">
                      <li class="fas fa-trash"></li>
                    </a>
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

  {{-- {!!$notificaciones->links() !!} --}}
  </>
  @endsection