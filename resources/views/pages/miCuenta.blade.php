<!DOCTYPE html>
<html lang="es">

@include('templates.head')

<body>

    <!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->
    @include('templates.header2')
    <!-- Navigation Menu End -->
    <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
    <!-- Small Breadcrumb -->
    <div class="small-breadcrumb">
        <div class="container">
            <div class=" breadcrumb-link">
                <ul>
                    <li><a href="{{url('/')}}">Inicio</a></li>
                    <li><a href="{{route('cliente.miCuenta')}}">Mi cuenta</a></li>
                </ul>
            </div>
        </div>
    </div>
    @foreach (auth()->user()->unreadNotifications as $notification)
    @if($notification->type=="App\Notifications\NotificacionVerificacion")
    @if ($loop->first && $notification->data['respuesta']==1)
    <div class="alert alert-success alert-dismissible" role="alert">
        @if($notification->data['respuesta']==1)
        Felicidades, tu cuenta ha sido verificada con éxito.
        @endif
        <a href="{{ route('marcar_notificacion_leida', [$notification->id]) }}" type="button" class="close"
            data-dismiss="alert" role="alert">
            <span aria-button="true">&times;</span>
        </a>
    </div>
    @endif
    @endif
    @endforeach
    <!-- Small Breadcrumb -->
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <section class="section-padding gray">
            <!-- Main Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <!-- Middle Content Area -->
                    <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                        <!-- Sidebar Widgets -->
                        <div class="user-profile">
                            <a>
                                @if(!isset($perfil->image->url))
                                <img src="{{asset('images/user_default.png')}}" alt="foto">
                                @else
                                <img src="{{$perfil->image->url}}" alt="foto">
                                @endif
                            </a>
                            <div class="profile-detail">
                                <h6>{{$user->name}}</h6>
                                <ul class="contact-details">

                                    <li>
                                        <i class="fa fa-envelope"></i>{{$user->email}}
                                    </li>
                                    <li>
                                        <i class="fa fa-phone"></i>{{$user->telefono}}
                                    </li>
                                    <li>
                                        <i class="fas fa-coins"></i>{{$perfil->creditos}} créditos
                                    </li>
                                </ul>
                            </div>
                            <ul>
                                <li class="active"><a href="">Perfil</a></li>
                                <li><a href="{{route('cliente.misAnuncios')}}">Mis anuncios</a></li>
                                <li><a href="{{route('cliente.misOrdenes')}}">Mis ordenes</a></li>
                                <li><a href="{{route('cliente.crearAnuncio')}}">Publicar anuncio</a></li>
                                <li><a href="{{route('cliente.creditos')}}">Comprar creditos</a></li>
                                {{-- <li><a href="messages.html">Messages</a></li> --}}
                                <li><a href="{{route('logout')}}">Cerrar sesión</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <!-- Row -->
                        @if (Session::has('mensaje'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('mensaje') }}
                            <button type="button" class="close" data-dismiss="alert" role="alert">
                                <span aria-button="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if (Session::has('advertencia'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            {{ Session::get('advertencia') }}
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
                        <div class="profile-section margin-bottom-20">
                            <div class="profile-tabs">
                                <ul class="nav nav-justified nav-tabs">
                                    <li class="active"><a href="#profile" data-toggle="tab">Perfil</a></li>
                                    <li><a href="#edit" data-toggle="tab">Editar perfil</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="profile-edit tab-pane fade in active" id="profile">
                                        <h2 class="heading-md">Administre sus datos.</h2>
                                        <p>A continuación se muestran el nombre y las direcciones de correo electrónico
                                            registradas para su cuenta.</p>
                                        <dl class="dl-horizontal">
                                            <dt><strong>Su nombre </strong></dt>
                                            <dd>
                                                {{$user->name}}
                                            </dd>
                                            <dt><strong>Su edad </strong></dt>
                                            <dd>
                                                {{$user->edad}}
                                            </dd>
                                            <dt><strong>Dirección de correo </strong></dt>
                                            <dd>
                                                {{$user->email}}
                                            </dd>
                                            <dt><strong>Número de teléfono </strong></dt>
                                            <dd>
                                                {{$user->telefono}}
                                            </dd>
                                            <a>
                                                <dt><strong>Usuario verificado: </strong></dt>
                                            </a>


                                            <dd>
                                                {{$user->cta_validada}}
                                            </dd>
                                            @if(auth()->user()->cta_validada=="No")
                                            <a href="{{route('home.getValidarCuenta')}}"> ¿Deseas validar tu cuenta?</a>
                                            @endif
                                        </dl>
                                    </div>
                                    <div class="profile-edit tab-pane fade" id="edit">
                                        <h2 class="heading-md">Administra tu configuración de seguridad</h2>
                                        <p>Gestiona tu cuenta</p>
                                        <div class="clearfix"></div>
                                        <form method="POST" action="{{route('cliente.editarMiPerfil')}}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <label>Nombres<span class="color-red">*</span> </label>
                                                    <input name="nombre" type="text" value="{{$user->name}}"
                                                        class="form-control margin-bottom-20">
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <label>Apellidos<span class="color-red">*</span> </label>
                                                    <input name="apellidos" type="text" value="{{$user->apellidos}}"
                                                        class="form-control margin-bottom-20">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <label>Edad <span class="color-red">*</span></label>
                                                    <input name="edad" min="18" max="70" type="number"
                                                        value="{{$user->edad}}" class="form-control margin-bottom-20">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <label>Número de móvil <span class="color-red">*</span></label>
                                                    <input name="telefono" type="text" value="{{$user->telefono}}"
                                                        class="form-control margin-bottom-20">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <label>Foto <span class="color-red">*</span></label>

                                                    @if(!isset($perfil->image->url))
                                                    <img style="max-width:40%"
                                                        src="{{asset('images/user_default.png')}}" alt="foto">
                                                    @else
                                                    <img src="{{$perfil->image->url}}" alt="foto">
                                                    @endif
                                                    <input type="file" name="foto" id="foto" value="{{$perfil->image}}"
                                                        class="form-control margin-bottom-20">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                    <label>Visibilidad de comentarios<span
                                                            class="color-red">*</span></label>
                                                    <select class="category form-control" name="estado_comentario"
                                                        required>
                                                        @if(isset($user->estado_comentar))
                                                        <option selected disabled>Estado actual:
                                                            {{$user->estado_comentar}}</option>
                                                        <option value="1">Activar comentarios</option>
                                                        <option value="2">Desactivar comentarios</option>

                                                        @endif

                                                    </select>

                                                </div>

                                            </div>

                                            <div class="clearfix"></div>
                                            <div class="row"
                                                style="padding-top:20px; display:flex; justify-content:center;">
                                                <div class="col-md-4 col-sm-4 col-xs-12 text-right">
                                                    <button type="submit" class="btn btn-theme btn-sm">Actualizar mis
                                                        datos</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="profile-edit tab-pane fade" id="settings">
                                        <h2 class="heading-md">Manage your Notifications.</h2>
                                        <p>Below are the notifications you may manage.</p>
                                        <br>
                                        <form>
                                            <div class="skin-minimal">
                                                <ul class="list">
                                                    <li>
                                                        <input type="checkbox" id="minimal-checkbox-1">
                                                        <label for="minimal-checkbox-1">Send me email notification when
                                                            Ad is processed</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="minimal-checkbox-2">
                                                        <label for="minimal-checkbox-2">Send me email notification when
                                                            user comment</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="minimal-checkbox-3">
                                                        <label for="minimal-checkbox-3">Send me email notification for
                                                            the latest update</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="minimal-checkbox-4">
                                                        <label for="minimal-checkbox-4"> Receive our monthly
                                                            newsletter</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="minimal-checkbox-5">
                                                        <label for="minimal-checkbox-5">Email notification</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="button-group margin-top-20">
                                                <button class="btn btn-sm btn-default" type="button">Reset</button>
                                                <button type="submit" class="btn btn-sm btn-theme">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Middle Content Area  End -->
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