@extends('admin.spaceadmin')
@section('contenido')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Agregar publicidad</h4>
            <form class="forms-sample" action="{{ route('publicidad.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @include('admin.publicidad.form',['modo'=>'Crear'])
            </form>
        </div>
    </div>
</div>
@endsection