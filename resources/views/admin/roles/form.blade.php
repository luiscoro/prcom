<h1>{{ $modo }} rol</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="nombre">Nombre del rol</label>
    <input type="text" class="form-control" name="nombre" id="nombre"
        value="{{ isset($rol->nombre) ? $rol->nombre : old('nombre') }}">
</div>

<input type="submit" class="btn btn-success" value="{{ $modo }} rol">
<a href="{{route('roles.index')}}" class="btn btn-primary">Regresar</a>