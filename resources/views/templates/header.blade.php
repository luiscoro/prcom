<div class="transparent-header">
    <!-- Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Header Top Left -->
                <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
                    {{-- <ul class="listnone">
                   <li><a href="about.html"><i class="fa fa-heart-o" aria-hidden="true"></i> About</a></li>
                   <li><a href="faqs.html"><i class="fa fa-folder-open-o" aria-hidden="true"></i> FAQS</a></li>
                   <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe" aria-hidden="true"></i> Language <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                         <li><a href="#">English</a></li>
                         <li><a href="#">Swedish</a></li>
                         <li><a href="#">Arabic</a></li>
                         <li><a href="#">Russian</a></li>
                         <li><a href="#">chinese</a></li>
                      </ul>
                   </li>
                </ul> --}}
                </div>
                <!-- Header Top Right Social -->
                <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                    <div class="pull-right">
                        <ul class="listnone">
                            @guest
                                @if (Route::has('login'))
                                    <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>Iniciar sesión</a></li>
                                @endif
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}"><i class="fa fa-unlock"
                                                aria-hidden="true"></i>Registrarse</a></li>
                                @endif
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"><i class="icon-profile-male"
                                            aria-hidden="true"></i>{{ Auth::user()->name }}<span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">

                                        <li><a href="">Mi cuenta</a></li>
                                        @if (Auth::check())
                                            <li><a href="{{ url('/admin') }}">Dashboard</a></li>
                                        @endif
                                        <li><a href="">Anuncios</a></li>
                                        <li><a href="">Anuncios pendientes</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesión') }}
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- Navigation Menu -->
    <div class="clearfix"></div>
    <!-- menu start -->
    <nav id="menu-1" class="mega-menu">
        <!-- menu list items container -->
        <section class="menu-list-items">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <!-- menu logo -->
                        <ul class="menu-logo">
                            <li>
                                <a ><img style="width: 100px"
                                        src="{{ asset('/images/logo/logoPassionReal.jpeg') }}" alt="logo"> </a>
                            </li>
                        </ul>
                        <!-- menu links -->
                        <ul class="menu-links">
                            <!-- active class -->
                            <li>
                                <a href="javascript:void(0)"> Inicio <i class=" fa-indicator"></i></a>
                                {{-- <div class="drop-down grid-col-8">
                               <!--grid row-->
                               <div class="grid-row">
                                  <!--grid column 3-->
                                  <div class="grid-col-4">
                                     <ul>
                                        <li><a href="index.html">Home 1 - Default </a></li>
                                        <li><a href="index-transparent.html">Home 2 (Transparent)</a></li>
                                        <li><a href="index-2.html">Home 3 (Variation)</a></li>
                                        <li><a href="index-3.html">Home 4 (Master Slider)</a></li>
                                     </ul>
                                  </div>
                                  <div class="grid-col-4">
                                     <ul>
                                        <li><a href="index-4.html">Home 5 (With Map Listing)</a></li>
                                        <li><a href="index-5.html">Home 6 (Modern Style)</a></li>
                                        <li><a href="index-6.html">Home 7 (Variation)</a></li>
                                        <li><a href="index-7.html">Home 8 (Category Slider)</a></li>
                                     </ul>
                                  </div>
                                  <div class="grid-col-4">
                                     <ul>
                                        <li><a href="index-10.html">Home 11 (Modern Home)</a></li>
                                        <li><a href="index-8.html">Home 9 (Landing Page)</a></li>
                                        <li><a href="index-9.html">Home 10 (Variation)</a></li>
                                     </ul>
                                  </div>
                               </div>
                            </div> --}}
                            </li>
                            <li>
                                <a href="javascript:void(0)">Categorías <i
                                        class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel">
                                    @foreach ($categorias as $categoria)
                                        <li><a href="{{ route('home.find_by_categoria', $categoria->nombre) }}">{{ $categoria->nombre }}
                                            </a></li>
                                    @endforeach

                                </ul>
                            </li>
                            {{-- <li>
                            <a href="javascript:void(0)">Categories <i class="fa fa-angle-down fa-indicator"></i></a>
                            <!-- drop down multilevel  -->
                            <ul class="drop-down-multilevel">

                               <li><a href="category-2.html">Modern Variation</a></li>
                               <li><a href="category-3.html">Minimal Variation</a></li>
                               <li><a href="category-4.html">Fancy Variation</a></li>

                               <li><a href="category-6.html">Flat Variation</a></li>
                            </ul>
                         </li> --}}
                            {{-- <li>
                            <a href="javascript:void(0)">Dashboard <i class="fa fa-angle-down fa-indicator"></i></a>
                            <!-- drop down multilevel  -->
                            <ul class="drop-down-multilevel">
                               <li><a href="profile.html">User Profile</a></li>
                               <li><a href="profile-2.html">User Profile 2</a></li>
                               <li><a href="archives.html">Archives</a></li>
                               <li><a href="active-ads.html">Active Ads</a></li>
                         <li><a href="pending-ads.html">Pending Ads</a></li>
                               <li><a href="favourite.html">Favourite Ads</a></li>
                               <li><a href="messages.html">Message Panel</a></li>
                               <li><a href="deactive.html">Account Deactivation</a></li>
                            </ul>
                         </li> --}}
                            {{-- <li>
                            <a href="javascript:void(0)">Pages <i class="fa fa-angle-down fa-indicator"></i></a>
                            <!-- drop down full width -->
                            <div class="drop-down grid-col-12">
                               <!--grid row-->
                               <div class="grid-row">
                                  <!--grid column 2-->
                                  <div class="grid-col-3">
                                     <h4>Blog</h4>
                                     <ul>
                                        <li><a href="blog.html">Blog With Right Sidebar</a></li>
                                        <li><a href="blog-1.html">Blog With Masonry Style</a></li>
                                        <li><a href="blog-2.html">Blog Without Sidebar</a></li>
                                        <li><a href="blog-details.html">Single Blog </a></li>
                                        <li><a href="blog-details-1.html">Single Blog (Adsense) </a></li>
                                     </ul>
                                  </div>
                                  <!--grid column 2-->
                                  <div class="grid-col-3">
                                     <h4>Miscellaneous</h4>
                                     <ul>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="cooming-soon.html">Comming Soon</a></li>
                                        <li><a href="elements.html">Shortcodes</a></li>
                                        <li><a href="error.html">404 Page</a></li>
                                        <li><a href="faqs.html">FAQS</a></li>
                                     </ul>
                                  </div>
                                  <!--grid column 2-->

                                  <div class="grid-col-3">
                                     <h4>Others</h4>
                                     <ul>
                                        <li><a href="login.html">Iniciar sesión</a></li>
                                        <li><a href="register.html">Registrarse</a></li>
                                        <li><a href="pricing.html">Pricing</a></li>
                                        <li><a href="site-map.html">Site Map</a></li>
                                        <li><a href="post-ad-1.html">Post Ad</a></li>
                                     </ul>
                                  </div>
                                  <!--grid column 2-->
                                  <div class="grid-col-3">
                                     <h4>Detail Page</h4>
                                     <ul>
                                        <li><a href="post-ad-2.html">Post Ad 2</a></li>
                                        <li><a href="single-page-listing.html">Single Ad Detail</a></li>
                                        <li><a href="single-page-listing-2.html">Single Ad 2</a></li>
                                        <li><a href="single-page-listing-3.html">Single Ad (Adsense)</a></li>
                                        <li><a href="single-page-expired.html">Single Ad (Closed)</a></li>
                                     </ul>
                                  </div>
                                  <!--grid column 2-->
                               </div>
                            </div>
                         </li> --}}
                            {{-- <li>
                            <a href="javascript:void(0)">Drop Down <i class="fa fa-angle-down fa-indicator"></i></a>
                            <!-- drop down multilevel  -->
                            <ul class="drop-down-multilevel">
                               <li><a href="#">Item one</a></li>
                               <li>
                                  <a href="javascript:void(0)">Items Right Side <i class="fa fa-angle-right fa-indicator"></i> </a>
                                  <!-- drop down second level -->
                                  <ul class="drop-down-multilevel">
                                     <li>
                                        <a href="javascript:void(0)"> <i class="fa fa-buysellads"></i> Level 2 <i class="fa fa-angle-right fa-indicator"></i></a>
                                        <!-- drop down third level -->
                                        <ul class="drop-down-multilevel">
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                        </ul>
                                     </li>
                                     <li>
                                        <a href="javascript:void(0)"> <i class="fa fa-dashcube"></i> Level 2 <i class="fa fa-angle-right fa-indicator"></i></a>
                                        <!-- drop down third level -->
                                        <ul class="drop-down-multilevel">
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                        </ul>
                                     </li>
                                     <li>
                                        <a href="javascript:void(0)"> <i class="fa fa-heartbeat"></i> Level 2 <i class="fa fa-angle-right fa-indicator"></i></a>
                                        <!-- drop down third level -->
                                        <ul class="drop-down-multilevel">
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                        </ul>
                                     </li>
                                     <li>
                                        <a href="javascript:void(0)"> <i class="fa fa-medium"></i> Level 2 <i class="fa fa-angle-right fa-indicator"></i></a>
                                        <!-- drop down third level -->
                                        <ul class="drop-down-multilevel">
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                        </ul>
                                     </li>
                                     <li>
                                        <a href="javascript:void(0)"> <i class="fa fa-leanpub"></i> Level 2 <i class="fa fa-angle-right fa-indicator"></i> </a>
                                        <!-- drop down third level -->
                                        <ul class="drop-down-multilevel">
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                        </ul>
                                     </li>
                                  </ul>
                               </li>
                               <li><a href="#">Item 2</a></li>
                               <li>
                                  <a href="javascript:void(0)">Items Left Side <i class="fa fa-angle-left fa-indicator"></i> </a>
                                  <!-- add class left-side -->
                                  <ul class="drop-down-multilevel left-side">
                                     <li>
                                        <a href="#"> <i class="fa fa-forumbee"></i> Level 2</a>
                                     </li>
                                     <li>
                                        <a href="#"> <i class="fa fa-hotel"></i> Level 2</a>
                                     </li>
                                     <li>
                                        <a href="#"> <i class="fa fa-automobile"></i> Level 2</a>
                                     </li>
                                     <li>
                                        <a href="javascript:void(0)"> <i class="fa fa-heartbeat"></i> Level 2 <i class="fa fa-plus fa-indicator"></i> </a>
                                        <!--drop down second level-->
                                        <ul class="drop-down-multilevel">
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                           <li><a href="#">Level 3</a></li>
                                        </ul>
                                     </li>
                                     <li>
                                        <a href="#"> <i class="fa fa-bookmark"></i> Level 2</a>
                                     </li>
                                     <li>
                                        <a href="#"> <i class="fa fa-bell"></i> Level 2</a>
                                     </li>
                                     <li>
                                        <a href="#"> <i class="fa fa-soccer-ball-o"></i> Level 2</a>
                                     </li>
                                     <li>
                                        <a href="#"> <i class="fa fa-life-ring"></i> Level 2</a>
                                     </li>
                                  </ul>
                               </li>
                               <li><a href="#">Item 4</a>
                               </li>
                            </ul>
                         </li> --}}
                            {{-- <li><a href="contact.html">Fotos</a></li> --}}
                        </ul>
                        <ul class="menu-search-bar">
                            <li>
                                <a href="{{ route('cliente.crearAnuncio') }}" class="btn btn-light"><i
                                        class="fa fa-plus" aria-hidden="true"></i> Publicar anuncio</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </nav>
    <!-- menu end -->
</div>
