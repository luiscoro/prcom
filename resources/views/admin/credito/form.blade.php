<h1>{{ $modo }} crédito</h1>

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
    <label for="Credito"> cantidad de créditos </label>
    <input type="text" class="form-control" name="cantidad" id="cantidad"
        value="{{ isset($credito->cantidad) ? $credito->cantidad : old('cantidad') }}">
</div>
<div class="form-group">
    <label for="Credito"> valor por la cantidad de créditos </label>
    <input type="text" class="form-control" name="valor" id="valor"
        value="{{ isset($credito->valor) ? $credito->valor : old('valor') }}">
</div>
<div class="form-group">
    <label for="Credito"> Descuento % (Opcional) </label>
    <input type="text" class="form-control" name="descuento" id="descuento"
        value="{{ isset($credito->descuento) ? $credito->descuento : old('descuento') }}">
</div>

<input type="submit" class="btn btn-success" value="{{ $modo }} credito">
<a href="{{ url('admin/credito/') }}" class="btn btn-primary">Regresar</a>
