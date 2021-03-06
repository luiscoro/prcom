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
                                        <label class="control-label">Titulo para el anuncio <small>Ingresar un t??tulo
                                                para tu anuncio</small></label>
                                        <input class="form-control" name="titulo" value="{{old('titulo')}}"
                                            placeholder="Ponle un titulo llamativo a tu anuncio" type="text">
                                    </div>
                                </div>
                                <!-- Ad Description  -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                        <label class="control-label">Descripci??n para el anuncio <small>Ingresar una
                                                descripci??n para tu anuncio </small></label>
                                        <textarea rows="4" class="form-control" name="descripcion"
                                            placeholder="Utiliza este espacio para decir c??mo eres, describir tu cuerpo, mencionar tus destrezas y expresar tus gustos...">{{ old('descripcion') }}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row">
                                    <!-- Category  -->
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">Categor??a <small>Selecciona la categor??a para tu
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
                                                    <option value="??lava/Araba" {{ old('ciudad') == '??lava/Araba' ? 'selected' : '' }}>??lava/Araba</option>
                                                    <option value="Albacete"{{ old('ciudad') == 'Albacete' ? 'selected' : '' }}>Albacete</option>
                                                    <option value="Alicante"{{ old('ciudad') == 'Alicante' ? 'selected' : '' }}>Alicante</option>
                                                    <option value="Almer??a"{{ old('ciudad') == 'Almer??a' ? 'selected' : '' }}>Almer??a</option>
                                                    <option value="Asturias"{{ old('ciudad') == 'Asturias' ? 'selected' : '' }}>Asturias</option>
                                                    <option value="??vila"{{ old('ciudad') == '??vila' ? 'selected' : '' }}>??vila</option>
                                                    <option value="Badajoz"{{ old('ciudad') == 'Badajoz' ? 'selected' : '' }}>Badajoz</option>
                                                    <option value="Baleares"{{ old('ciudad') == 'Baleares' ? 'selected' : '' }}>Baleares</option>
                                                    <option value="Barcelona"{{ old('ciudad') == 'Barcelona' ? 'selected' : '' }}>Barcelona</option>
                                                    <option value="Burgos"{{ old('ciudad') == 'Burgos' ? 'selected' : '' }}>Burgos</option>
                                                    <option value="C??ceres"{{ old('ciudad') == 'C??ceres' ? 'selected' : '' }}>C??ceres</option>
                                                    <option value="C??diz"{{ old('ciudad') == 'C??diz' ? 'selected' : '' }}>C??diz</option>
                                                    <option value="Cantabria"{{ old('ciudad') == 'Cantabria' ? 'selected' : '' }}>Cantabria</option>
                                                    <option value="Castell??n"{{ old('ciudad') == 'Castell??n' ? 'selected' : '' }}>Castell??n</option>
                                                    <option value="Ceuta"{{ old('ciudad') == 'Ceuta' ? 'selected' : '' }}>Ceuta</option>
                                                    <option value="Ciudad Real"{{ old('ciudad') == 'Ciudad' ? 'selected' : '' }}>Ciudad Real</option>
                                                    <option value="C??rdoba"{{ old('ciudad') == 'C??rdoba' ? 'selected' : '' }}>C??rdoba</option>
                                                    <option value="Cuenca"{{ old('ciudad') == 'Cuenca' ? 'selected' : '' }}>Cuenca</option>
                                                    <option value="Gerona/Girona"{{ old('ciudad') == 'Gerona/Girona' ? 'selected' : '' }}>Gerona/Girona</option>
                                                    <option value="Granada"{{ old('ciudad') == 'Granada' ? 'selected' : '' }}>Granada</option>
                                                    <option value="Guadalajara"{{ old('ciudad') == 'Guadalajara' ? 'selected' : '' }}>Guadalajara</option>
                                                    <option value="Guip??zcoa/Gipuzkoa"{{ old('ciudad') == 'Guip??zcoa/Gipuzkoa' ? 'selected' : '' }}>Guip??zcoa/Gipuzkoa</option>
                                                    <option value="Huelva"{{ old('ciudad') == 'Huelva' ? 'selected' : '' }}>Huelva</option>
                                                    <option value="Huesca"{{ old('ciudad') == 'Huesca' ? 'selected' : '' }}>Huesca</option>
                                                    <option value="Ja??n"{{ old('ciudad') == 'Ja??n' ? 'selected' : '' }}>Ja??n</option>
                                                    <option value="La Coru??a/A Coru??a"{{ old('ciudad') == 'La Coru??a/ A Coru??a' ? 'selected' : '' }}>La Coru??a/A Coru??a</option>
                                                    <option value="La Rioja"{{ old('ciudad') == 'La Rioja' ? 'selected' : '' }}>La Rioja</option>
                                                    <option value="Las Palmas"{{ old('ciudad') == 'Las Palmas' ? 'selected' : '' }}>Las Palmas</option>
                                                    <option value="Le??n"{{ old('ciudad') == 'Le??n' ? 'selected' : '' }}>Le??n</option>
                                                    <option value="L??rida/Lleida"{{ old('ciudad') == 'L??rida/Lleida' ? 'selected' : '' }}>L??rida/Lleida</option>
                                                    <option value="Lugo"{{ old('ciudad') == 'Lugo' ? 'selected' : '' }}>Lugo</option>
                                                    <option value="Madrid"{{ old('ciudad') == 'Madrid' ? 'selected' : '' }}>Madrid</option>
                                                    <option value="M??laga"{{ old('ciudad') == 'M??laga' ? 'selected' : '' }}>M??laga</option>
                                                    <option value="Melilla"{{ old('ciudad') == 'Melilla' ? 'selected' : '' }}>Melilla</option>
                                                    <option value="Murcia"{{ old('ciudad') == 'Murcia' ? 'selected' : '' }}>Murcia</option>
                                                    <option value="Navarra"{{ old('ciudad') == 'Navarra' ? 'selected' : '' }}>Navarra</option>
                                                    <option value="Orense/Ourense"{{ old('ciudad') == 'Orense/Ourense' ? 'selected' : '' }}>Orense/Ourense</option>
                                                    <option value="Palencia"{{ old('ciudad') == 'Palencia' ? 'selected' : '' }}>Palencia</option>
                                                    <option value="Pontevedra"{{ old('ciudad') == 'Pontevedra' ? 'selected' : '' }}>Pontevedra</option>
                                                    <option value="Salamanca"{{ old('ciudad') == 'Salamanca' ? 'selected' : '' }}>Salamanca</option>
                                                    <option value="Segovia"{{ old('ciudad') == 'Segovia' ? 'selected' : '' }}>Segovia</option>
                                                    <option value="Sevilla"{{ old('ciudad') == 'Sevilla' ? 'selected' : '' }}>Sevilla</option>
                                                    <option value="Soria"{{ old('ciudad') == 'Soria' ? 'selected' : '' }}>Soria</option>
                                                    <option value="Tarragona"{{ old('ciudad') == 'Tarragona' ? 'selected' : '' }}>Tarragona</option>
                                                    <option value="Tenerife"{{ old('ciudad') == 'Tenerife' ? 'selected' : '' }}>Tenerife</option>
                                                    <option value="Teruel"{{ old('ciudad') == 'Teruel' ? 'selected' : '' }}>Teruel</option>
                                                    <option value="Toledo"{{ old('ciudad') == 'Toledo' ? 'selected' : '' }}>Toledo</option>
                                                    <option value="Valencia"{{ old('ciudad') == 'Valencia' ? 'selected' : '' }}>Valencia</option>
                                                    <option value="Valladolid"{{ old('ciudad') == 'Valladolid' ? 'selected' : '' }}>Valladolid</option>
                                                    <option value="Vizcaya/Bizkaia"{{ old('ciudad') == 'Vizcaya/Bizkaia' ? 'selected' : '' }}>Vizcaya/Bizkaia</option>
                                                    <option value="Zamora"{{ old('ciudad') == 'Zamora' ? 'selected' : '' }}>Zamora</option>
                                                    <option value="Zaragoza"{{ old('ciudad') == 'Zaragoza' ? 'selected' : '' }}>Zaragoza</option>
                                                  </select>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">Zona/distrito/barrio </label>
                                        <input class="form-control" name="zona" value="">
                                    </div> --}}
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">

                                        <label class="control-label">Direcci??n </label>
                                        <input class="form-control" name="direccion" id="direccion" value="{{old('direccion')}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- end row -->
                                    <!-- Image Upload  -->
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                            <label class="control-label">Fotos para tu anuncio <small>Agregar imagenes. Dimensi??n m??nima (800x200) |  m??xima (1800x600)</small></label>
                                            <input value="{{old('images[]')}}" class="dropify" type="file" accept="image/*" name="images[]" id="images" multiple
                                                required>
                                             
                                        </div>

                                    </div>
                                  

                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                            <label class="control-label">Paquete <small>Costo por activaci??n de paquete
                                                    (1 cr??dito)</small></label>
                                            <select class="category form-control" name="paquete_id">
                                                <option label="Select Option"></option>
                                                @foreach ($paquetes as $paquete)
                                                <option  {{ old('paquete_id') == $paquete->id ? 'selected' : '' }} value="{{$paquete->id}}">Reactivaci??n cada
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