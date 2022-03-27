



<h1>{{$modo}} categoría</h1>

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

<div class="form-group">
<label for="Nombre">Nombre</label>
<input type="text" class="form-control" name="nombre" id="nombre" value="{{isset($categoria->nombre)?$categoria->nombre:old('nombre')}}">
</div>
<div class="form-group">
    <!-- <label for="Foto">Foto</label> -->
    @if(isset($categoria->image->url))
    <img class="img-thumbnail img-fluid" width="100px" src="{{$categoria->image->url}}"  alt=" ">
    @endif
    <input type="file" name="foto" id="Foto" >
    <img id="FotoCargada" class="img-thumbnail img-fluid" style="max-width: 100px;">
    
    </div>

<input type="submit" class="btn btn-success" value="{{$modo}} categoria">
<a href="{{url('admin/categoria/')}}" class="btn btn-primary">Regresar</a>

<script src="{{asset('/js/showImgLoaded.js')}}"></script>

