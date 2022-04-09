@extends('admin.spaceadmin')
{{--
<link rel="stylesheet" href="{!! asset('css/producto/productosInventario.css') !!}"> --}}
@section('contenido')
<div class="page-header">
  <h3 class="page-title">
    Publicidades
  </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Publicidades</li>
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

  @if(count($errors)>0)
  <div class="alert alert-danger" role="alert">
    <ul>
      @foreach($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
  </div>
  @endif


  <div class="menu__datos">
    <div class="botones">
      <a href="{{url('admin/publicidad/create')}}" class="btn btn-success mb-2">Registrar nueva publicidad</a>
      <!-- Se manda a llamar al metodo create que trae la vista del formulario -->
    </div>

  </div>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Publicidades</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">

            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Foto</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                @foreach($publicidades as $c)
                <tr>
                  <td>{{$c->id}}</td>
                  <td>

                    <img width="100px" src="{{$c->image->url}}" alt="foto de publicidad ">

                  </td>

                  <td>

                    <form method="post" action="{{url('admin/publicidad/'.$c->id)}}" class="d-inline">
                      <a href="{{url('admin/publicidad/'.$c->id.'/edit')}}" id="botoncol"
                        class="btn btn-warning  ">Editar</a>

                      @csrf
                      {{method_field('DELETE')}}
                      <input type="submit" value="Borrar" id="botoncol" class="btn btn-danger"
                        onclick="return confirm('Desea borrar?')">
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

</div>
@endsection