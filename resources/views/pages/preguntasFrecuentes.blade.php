

<!DOCTYPE html>
<html lang="en">
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
                     <h1>Preguntas frecuentes</h1>
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
                  <li><a href="{{route('home.inicio')}}">Inicio</a></li>
                  <li><a >Preguntas frecuentes</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page pattern-bg ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-8 col-xs-12 col-sm-12">
                     <ul class="accordion">
                        <li>
                            <h3 class="accordion-title"><a >¿En que consiste el servicio?</a></h3>
                            <div class="accordion-content">
                                <p>Este servicio renueva tu anuncio de forma automática con la frecuencia del paquete de renovación seleccionado, para ello debes disponer de créditos en tu cuenta, de no ser el caso, deberás comprarlos en la sección de <strong>créditos</strong> para poder publicar tu anuncio seleccionando el paquete de renovación que más te agrade. Un anuncio renovado vuelve a subir a las primeras posiciones de los listados de anuncios, disminuyendo en 1 tus créditos disponibles pero aumentando la visibilidad de tu anuncio considerablemente. Cuando más visible es el anuncio, más contactos te puede generar.</p>
                          </div>
                         </li>

                        <li class="">
                           <h3 class="accordion-title"><a>¿Cómo puedo comprar créditos?</a></h3>
                           <div class="accordion-content">
                               <p>Los créditos los podrás comprar en PasionReal.com en la sección de <strong>créditos</strong>. No te fíes de ninguna comunicación que te sugiere que puedas adquirir créditos de otra manera que accediendo a la página de PasionReal.com</p>
                                                        </div>
                        </li>
                        <li class="">
                           <h3 class="accordion-title"><a>¿Voy a recibir una factura por la compra de mis créditos?</a></h3>
                           <div class="accordion-content">
                           <p>En PasionReal.com emitimos una factura con cada recarga de créditos. Para ello el anunciante deberá proporcionarnos los datos necesarios.

                            Actualmente el servicio no esta habilitado para empresas fuera de España.</p>
                            </div>
                        </li>
                        <li class="">
                           <h3 class="accordion-title"><a >¿Cómo puedo contratarlo?</a></h3>
                           <div class="accordion-content">
                          <p>Para disfrutar de este servicio es necesario disponer de créditos en PasionReal.com. La cantidad de créditos que se necesita depende de la frecuencia de la autorenovacion elegida. Puedes comprar los créditos pagando con la tarjeta de crédito o débito.</p>
                            </div>
                        </li>
                        <li class="">
                           <h3 class="accordion-title"><a >¿Cuánto vale este servicio?</a></h3>
                           <div class="accordion-content">
                           <p>Cada vez que el anuncio se autorenueva, se consume un crédito. Los créditos pueden ser adquiridos a razón de 0.20 euros cada crédito. El usuario puede elegir con que frecuencia quiere que su anuncio se autorenueve. Por ejemplo, el anuncio puede ser autorenovado cada hora, 2 horas, 3 horas, 6 horas, 12 horas o 24 horas. Los anuncios no se autorenuevan entre las 00:00 y las 00:09 am.

                            Ejemplo ilustrativo: si eliges a las 11h que tu anuncio se autorenueve cada 3 horas, la primera autorenovacion se efectua a las 11h, las siguientes a las 14h, a las 17h, a las 20h y a las 23h. El día siguiente, el anuncio se autorenueva a las 11:00, etc. La autorenovación es válida hasta que el anunciante desactive este servicio para el anuncio en cuestión, se terminen los créditos o el anuncio sea eliminado (bien porque caduque, sea borrado por el usuario o por PasionReal.com a causa de no cumplir las normas).</p>
                            </div>
                        </li>
                       
                    
                     </ul>
                  </div>
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="blog-sidebar">
                        <!-- Categories --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Consejos de seguridad</a></h4>
                           </div>

                           <div class="widget-content">
                             <ol>
                                 <li>Nunca compartas una cuenta de ordenador</li>
                                 <li>Nunca utilices la misma contraseña en mas de una cuenta</li>
                                 <li>Nunca menciones tu contraseña a nadie, ni siquera a personas que afirmen ser del servicio al usuario de PasionReal.com</li>
                                 <li>Nunca apuntes una contraseña</li>
                                 <li>Nunca comuniques tu contraseña por teléfono, e-mail o mensajería instantanea.</li>
                                 <li>Asegúrate siempre de hacer el log-out antes de dejar tu ordenador libre.</li>
                                 <li>Pide una nueva contraseña si tienes la sensación de que la seguridad de tu cuenta es débil.</li>
                                 <li>Actualiza siempre tu software anti-virus</li>
                              </ol>
                           </div>
                        </div>
                        <!-- Latest News --> 
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
             <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
             @include('templates.footer')
             <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
      </div>
      <!-- Main Content Area End --> 
   
      <!-- Back To Top -->
      <a href="#0" class="cd-top">Top</a>
         <!-- SCRIPTS -->
    @include('templates.scripts')
   </body>
</html>

