<h1>{{$modo}} publicidad</h1>

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
    <!-- <label for="Foto">Foto</label> -->
    @if(isset($publicidad->image->url))
    <img class="img-thumbnail img-fluid" width="100px" src="{{$publicidad->image->url}}" alt=" ">
    @endif
    <input type="file" name="foto" id="Foto">
    <img id="FotoCargada" class="img-thumbnail img-fluid" style="max-width: 100px;">

</div>

<input type="submit" class="btn btn-success" value="{{$modo}} publicidad">
<a href="{{url('admin/publicidad/')}}" class="btn btn-primary">Regresar</a>

<script src="{{asset('/js/showImgLoaded.js')}}"></script>