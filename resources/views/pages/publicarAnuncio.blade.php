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
                        <h1>Publicar anuncio</h1>
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
                    <li><a href="{{url('/')}}">Inicio</a></li>
                    <li><a href="{{url('/publicar-anuncio')}}">Publicar anuncio</a></li>
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
                                    Publique su anuncio
                                </h3>
                            </div>

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
                            <p class="lead">Publicar un anuncio en <a href="#">Pasionreal.com</a> es gratis! Sin
                                embargo,
                                todos los anuncios deben seguir nuestras reglas:</p>
                            <form class="submit-form" action="{{route('cliente.guardarAnuncio')}}" method="POST"
                                enctype="multipart/form-data">
                                <!-- Title  -->
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        <label class="control-label">Titulo para el anuncio <small>Ingresar un título
                                                para tu anuncio</small></label>
                                        <input class="form-control" name="titulo" value="{{old('titulo')}}"
                                            placeholder="Ponle un titulo llamativo a tu anuncio" type="text">
                                    </div>
                                </div>
                                <!-- Ad Description  -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                        <label class="control-label">Descripción para el anuncio <small>Ingresar una
                                                descripción para tu anuncio </small></label>
                                        <textarea rows="4" class="form-control" name="descripcion"
                                            placeholder="Utiliza este espacio para decir cómo eres, describir tu cuerpo, mencionar tus destrezas y expresar tus gustos...">{{ old('descripcion') }}</textarea>
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
                                            <option {{ old('categoria_id') == $categoria->id ? 'selected' : '' }} value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Ciudad  -->
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">Provincia <small>Selecciona una provincia para tu
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
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">Zona/distrito/barrio </label>
                                        <input class="form-control" name="zona" value="">
                                    </div> --}}
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">

                                        <label class="control-label">Dirección </label>
                                        <input class="form-control" name="direccion" id="direccion" value="{{old('direccion')}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- end row -->
                                    <!-- Image Upload  -->
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                            <label class="control-label">Fotos para tu anuncio <small>Agregar imagenes. Dimensión mínima (800x200) |  máxima (1800x600)</small></label>
                                            <input value="{{old('images[]')}}" class="dropify" type="file" accept="image/*" name="images[]" id="images" multiple
                                                required>
                                             
                                        </div>

                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                            <label class="control-label">Tu edad</label>
                                            <input class="form-control" value="{{old('edad')}}" name="edad" placeholder="" type="number">
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                            <label class="control-label">Tu teléfono<small></small></label>
                                            <input class="form-control" value="{{old('telefono')}}" name="telefono" placeholder="" type="tel">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                            <label class="control-label">Paquete <small>Costo por activación de paquete
                                                    (1 crédito)</small></label>
                                            <select class="category form-control" name="paquete_id">
                                                <option label="Select Option"></option>
                                                @foreach ($paquetes as $paquete)
                                                <option  {{ old('paquete_id') == $paquete->id ? 'selected' : '' }} value="{{$paquete->id}}">Reactivación cada
                                                    {{$paquete->periodo_horas}} horas</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-theme pull-right">Publicar anuncio</button>
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