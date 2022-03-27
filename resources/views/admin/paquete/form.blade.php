<h1>{{ $modo }} paquete</h1>

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
    <label for="Paquete">Lapso de horas entre cada activación</label>
    <input type="text" class="form-control" name="periodo_horas" id="periodo_horas"
        value="{{ isset($paquete->periodo_horas) ? $paquete->periodo_horas : old('periodo_horas') }}">
</div>

<input type="submit" class="btn btn-success" value="{{ $modo }} paquete">
<a href="{{ url('admin/paquete/') }}" class="btn btn-primary">Regresar</a>
