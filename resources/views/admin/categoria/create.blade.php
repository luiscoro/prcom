@extends('admin.spaceadmin')
@section('contenido')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Agregar categoría para un anuncio</h4>
                <form class="forms-sample" action="{{ route('categoria.store') }}" method="POST"
                    enctype="multipart/form-data">
                    <!-- //ESTO ME APUNTA A CATEGORIA.STORE -->
                    @csrf
                    @include('admin.categoria.form',['modo'=>'Crear'])
                </form>
            </div>
        </div>
    </div>
@endsection
