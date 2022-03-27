<!DOCTYPE html>
<html lang="es">

@include('templates.head')

<body>


    <!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->
    @include('templates.header2')
    <!-- Navigation Menu End -->
    <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
    <div class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-page">
                        <h1>Editar anuncio</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Small Breadcrumb -->
    <div class="small-breadcrumb">
        <div class="container">
            <div class=" breadcrumb-link">
                <ul>
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/editar-anuncio') }}">Editar anuncio</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Small Breadcrumb -->
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <section class="section-padding  gray ">
            <!-- Main Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- end post-padding -->
                        <div class="post-ad-form extra-padding postdetails">
                            <div class="heading-panel">
                                <h3 class="main-title text-left">
                                    Edita tu anuncio
                                </h3>
                            </div>

                            @if (Session::has('mensaje'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {{ Session::get('mensaje') }}
                                    <button type="button" class="close" data-dismiss="alert" role="alert">
                                        <span aria-button="true">&times;</span>
                                    </button>
                                </div>
                            @endif
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

                            <form class="submit-form" action="{{ route('cliente.postEditarAnuncio') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" value="{{ $anuncio->id }}" name="anuncio_id" style="display:none">

                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        <label class="control-label">Titulo para el anuncio <small>Ingresar un título
                                                para tu anuncio</small></label>
                                        <input class="form-control" name="titulo"
                                            value="{{ old('titulo', $anuncio->titulo) }}"
                                            placeholder="Ponle un titulo llamativo a tu anuncio" type="text">
                                    </div>
                                </div>
                                <!-- Ad Description  -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                        <label class="control-label">Descripción para el anuncio <small>Ingresar una
                                                descripción para tu anuncio </small></label>
                                        <textarea rows="4" class="form-control"
                                            name="descripcion">{{ old('descripcion', $anuncio->descripcion) }}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row">
                                    <!-- Category  -->
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">Categoría <small>Selecciona la categoría para tu
                                                anuncio</small></label>
                                        <select class="category form-control" name="categoria_id">
                                            <option label="Select Option"></option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"
                                                    {{                                                     old('categoria_id', $anuncio->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                                    {{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Ciudad  -->
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">Ciudad <small>Selecciona una provincia para tu
                                                anuncio</small></label>
                                                <select required name="ciudad" class="form-control">
                                                    <option value="">Elige Provincia</option>
                                                    <option value="Álava/Araba">Álava/Araba</option>
                                                    <option value="Albacete">Albacete</option>
                                                    <option value="Alicante">Alicante</option>
                                                    <option value="Almería">Almería</option>
                                                    <option value="Asturias">Asturias</option>
                                                    <option value="Ávila">Ávila</option>
                                                    <option value="Badajoz">Badajoz</option>
                                                    <option value="Baleares">Baleares</option>
                                                    <option value="Barcelona">Barcelona</option>
                                                    <option value="Burgos">Burgos</option>
                                                    <option value="Cáceres">Cáceres</option>
                                                    <option value="Cádiz">Cádiz</option>
                                                    <option value="Cantabria">Cantabria</option>
                                                    <option value="Castellón">Castellón</option>
                                                    <option value="Ceuta">Ceuta</option>
                                                    <option value="Ciudad Real">Ciudad Real</option>
                                                    <option value="Córdoba">Córdoba</option>
                                                    <option value="Cuenca">Cuenca</option>
                                                    <option value="Gerona/Girona">Gerona/Girona</option>
                                                    <option value="Granada">Granada</option>
                                                    <option value="Guadalajara">Guadalajara</option>
                                                    <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                                                    <option value="Huelva">Huelva</option>
                                                    <option value="Huesca">Huesca</option>
                                                    <option value="Jaén">Jaén</option>
                                                    <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                                                    <option value="La Rioja">La Rioja</option>
                                                    <option value="Las Palmas">Las Palmas</option>
                                                    <option value="León">León</option>
                                                    <option value="Lérida/Lleida">Lérida/Lleida</option>
                                                    <option value="Lugo">Lugo</option>
                                                    <option value="Madrid">Madrid</option>
                                                    <option value="Málaga">Málaga</option>
                                                    <option value="Melilla">Melilla</option>
                                                    <option value="Murcia">Murcia</option>
                                                    <option value="Navarra">Navarra</option>
                                                    <option value="Orense/Ourense">Orense/Ourense</option>
                                                    <option value="Palencia">Palencia</option>
                                                    <option value="Pontevedra">Pontevedra</option>
                                                    <option value="Salamanca">Salamanca</option>
                                                    <option value="Segovia">Segovia</option>
                                                    <option value="Sevilla">Sevilla</option>
                                                    <option value="Soria">Soria</option>
                                                    <option value="Tarragona">Tarragona</option>
                                                    <option value="Tenerife">Tenerife</option>
                                                    <option value="Teruel">Teruel</option>
                                                    <option value="Toledo">Toledo</option>
                                                    <option value="Valencia">Valencia</option>
                                                    <option value="Valladolid">Valladolid</option>
                                                    <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                                                    <option value="Zamora">Zamora</option>
                                                    <option value="Zaragoza">Zaragoza</option>
                                                  </select>
                                        {{-- <select class="category form-control" name="ciudad">
                                            <option label="Select Option"></option>
                                            <option value="Quito">Quito</option>
                                            <option value="Esmeraldas">Esmeraldas</option>
                                            <option value="Riobamba">Riobamba</option>
                                            <option value="Cuenca">Cuenca</option>
                                            <option value="Guayaquil">Guayaquil</option>
                                            <option value="Ambato">Ambato</option>
                                            <option value="Ibarra">Ibarra</option>
                                            <option value="Latacunga">Latacunga</option>
                                            <option value="Loja">Loja</option>
                                            <option value="Machala">Machala</option>
                                            <option value="Salinas">Salinas</option>
                                            <option value="Portoviejo">Portoviejo</option>
                                            <option value="Durán">Durán</option>
                                            <option value="Manta">Manta</option>
                                            <option value="Sangolqui">Sangolqui</option>
                                        </select> --}}
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">Zona/distrito/barrio </label>
                                        <input class="form-control" name="zona" value="">
                                    </div> --}}
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">

                                        <label class="control-label">Dirección </label>
                                        <input class="form-control" name="direccion" id="direccion"
                                            value="{{ old('direccion', $anuncio->direccion) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                           <div class="form-control">
                                            <label class="control-label">Agregar nueva foto o video para tu anuncio <label>
                                     
                                                <input type="file" name="image" id="image">  
                                            </div>    
                                            
                                    </div>
                                </div>

                              
                                    <!-- end row -->
                                    <!-- Image Upload  -->
                                    <label class="control-label">Imágenes de tu anuncio<small>Puedes retirar o añadir más</small></label>

                                    <div class="row">
    @foreach ($anuncio->images as $imagen)
    @if(!Str::endsWith($imagen->url,'mp4'))
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="opciones">
            <a
                href="{{ url('/retirar/' . $imagen->id) }}"><i
                    title="Retirar imagen"
                    class="fas fa-calendar-times"></i></a>
        </div>
            <div class="minimal-category">
                <div class="minimal-img"> 
                    <img alt="imagen de anuncio" class="img-responsive" src="{{ $imagen->url }}">
                </div>
                {{-- <div class="minimal-overlay"></div>    --}}
            </div>
    </div>
    @endif
    @endforeach
</div>
@php
$contv = 0;
foreach($anuncio->images as $imagen){
    if(Str::endsWith($imagen->url,'mp4')){
        $contv=$contv+1;
        $video = $imagen; //se guarda el archivo de tipo video
    }
}
@endphp
@if($contv>0)
    <label class="control-label">Video de tu anuncio<small>1 video permitido por anuncio. Peso máximo permitido: 6KB.</small></label>
    <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="opciones">
                <a
                  href="{{ url('/retirar/' . $video->id) }}"><i
                    title="Retirar video"
                    class="fas fa-calendar-times"></i></a>
            </div>
            <div class="minimal-category"> 
                <div class="minimal-img">   
                    <video src="{{$imagen->url}}" width="200" height="200" autoplay muted loop controls></video>
                </div>
                {{-- <div class="minimal-overlay"></div> --}}
            </div>
        </div>
    </div>
@endif

                                   

                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                            <label class="control-label">Tu edad</label>
                                            <input class="form-control" value="{{ old('edad', $anuncio->edad) }}"
                                                name="edad" placeholder="" type="text">
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                            <label class="control-label">Tu teléfono<small></small></label>
                                            <input class="form-control"
                                                value="{{ old('telefono', $anuncio->telefono) }}" name="telefono"
                                                placeholder="" type="tel">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    {{-- <div class="row">
                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                            <label class="control-label">Paquete <small>Costo por activación de paquete
                                                    (1 crédito)</small></label>
                                            <select class="category form-control" name="paquete_id">
                                                <option label="Select Option"></option>
                                                @foreach ($paquetes as $paquete)
                                                    <option value="{{ $paquete->id }}"
                                                        {{                                                         old('paquete_id', $anuncio->paquete_id) == $paquete->id ? 'selected' : '' }}>
                                                        Reactivación cada {{ $paquete->periodo_horas }} horas
                                                    </option>

                                                @endforeach
                                            
                                            </select>
                                        </div>
                                    </div> --}}

                                

                                    <!-- end row -->
                                    <button class="btn btn-theme pull-right">Guardar cambios</button>
                            </form>
                        </div>
                        <!-- end post-ad-form-->
                    </div>
                    <!-- end col -->
                </div>
                <!-- Row End -->

               



            </div>
            <!-- Main Container End -->



        </section>


        <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
        <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
        @include('templates.footer')
        <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
    </div>
    <!-- SCRIPTS -->
    @include('templates.scripts')
</body>

</html>
