<h1>{{ $modo }} miembro</h1>

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


    
<div class="form-group my-5">
    <label for="rol">Rol</label>
        <select class="category form-control" name="rol_id">
            <option label="Seleccione el rol"></option>
            @foreach ($roles as $rol)
            <option {{ old('rol_id') == $rol->id ? 'selected' : '' }} value="{{$rol->id}}">{{$rol->name}}</option>
            @endforeach
        </select>
    </div>
   
   


<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" id="name"
        value="{{ isset($miembro->name) ? $miembro->name : old('name') }}">
</div>
<div class="form-group">
    <label for="email">Correo electrónico</label>
    <input type="text" class="form-control" name="email" id="email"
        value="{{ isset($miembro->email) ? $miembro->email : old('email') }}">
</div>
<div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" name="password" id="password"
        value="{{ isset($miembro->password) ? $miembro->password : old('password') }}">
</div>

<input type="submit" class="btn btn-success" value="{{ $modo }} miembro">
<a href="{{route('miembro.index')}}" class="btn btn-primary">Regresar</a>