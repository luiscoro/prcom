<footer class="footer-area no-bg">
    <!--Footer Upper-->
    <div class="footer-content">
       <div class="container">
          <div class="row clearfix">
             <!--Two 4th column-->
             <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="row clearfix">
                   <div class="col-lg-7 col-sm-6 col-xs-12 column">
                      <div class="footer-widget about-widget">
                         <div class="logo">
                            <a><img alt="" class="img-responsive" src="{{asset('images/logo_pasion.jpeg')}}"></a>
                         </div>
                         <div class="text">
                            <p>Encuentra tu libido</p>
                         </div>
                         {{-- <ul class="contact-info">
                            <li><span class="icon fa fa-map-marker"></span>España, ciudad, calles, etc</li>
                            <li><span class="icon fa fa-phone"></span>(+593) 0988703040</li>
                            <li><span class="icon fa fa-envelope-o"></span> correo@gmail.com</li>
                         </ul> --}}
                         {{-- <div class="social-links-two clearfix"> 
                            <a class="facebook img-circle" href="#"><span class="fa fa-facebook-f"></span></a>
                            <a class="twitter img-circle" href="#"><span class="fa fa-twitter"></span></a>
                            <a class="google-plus img-circle" href="#"><span class="fa fa-google-plus"></span></a>
                            <a class="linkedin img-circle" href="#"><span class="fa fa-pinterest-p"></span></a>
                            <a class="linkedin img-circle" href="#"><span class="fa fa-linkedin"></span></a> 
                         </div> --}}
                      </div>
                   </div>
                   <!--Footer Column-->
                   <div class="col-lg-5 col-sm-6 col-xs-12 column">
                      <div class="heading-panel">
                         <h3 class="main-title text-left">Categorías</h3>
                      </div>
                      <div class="footer-widget links-widget">
                         <ul>
                            @foreach ($categorias as $categoria)
                            <li><a href="{{route('home.find_by_categoria', $categoria->id)}}">{{$categoria->nombre}}</a></li>
                           
                            @endforeach
                           
                           
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
             <!--Two 4th column End-->
             <!--Two 4th column-->
             <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="row clearfix">
                   <!--Footer Column-->
                   <div class="col-lg-7 col-sm-6 col-xs-12 column">
                      <div class="footer-widget news-widget">
                         <div class="heading-panel">
                            <h3 class="main-title text-left">Normas</h3>
                         </div>
                         <!--News Post-->
                         <div >
                            <div class="news-content">
                               <a href="{{route('home.terminosCondiciones')}}">Terminos y condiciones</a>
                               <br/>
                               <a href="mailto:soporte@pasionreal.com">Soporte técnico: soporte@pasionreal.com</a>
                            </div>
                           
                         </div>
                         <!--News Post-->
                       
                      </div>
                   </div>
                   <!--Footer Column-->
                   <div class="col-lg-5 col-sm-6 col-xs-12 column">
                      <div class="footer-widget links-widget">
                         <div class="heading-panel">
                            <h3 class="main-title text-left"> Enlaces rápidos</h3>
                         </div>
                         <ul>
                            <li><a href="{{route('home.findAllCategorias')}}">Categorías</a></li>
                            <li><a href="{{route('register')}}">Registrarse</a></li>
                            <li><a href="{{route('login')}}">Iniciar sesión</a></li>
                            <li><a href="mailto:contactanos@pasionreal.com">Contáctanos: contactanos@pasionreal.com</a></li>
                            <li><a href="{{route('home.faq')}}">Preguntas frecuentes</a></li>
                             
                            
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
             <!--Two 4th column End-->
          </div>
       </div>
    </div>
    <!--Footer Bottom-->
    <div class="footer-copyright">
       <div class="container clearfix">
          <!--Copyright-->
          <div class="copyright text-center">Copyright {{date('Y')}} © Todos los derechos reservados</div>
       </div>
    </div>
 </footer>