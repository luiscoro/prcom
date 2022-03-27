

<!DOCTYPE html>
<html lang="en">
   @include('templates.head')
   <body>
      
    @include('templates.header2')
      <!-- Navigation Menu End -->
      <!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
      <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>Terminos y condiciones</h1>
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
                  <li><a>Terminos y condiciones</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding pattern_dots">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                     <div class="about-us-content">
                        <div class="heading-panel">
                           <h3 class="main-title text-left">
                              Pasion Real
                           </h3>
                        </div>
                        <h2></h2>
                       <p>Estas condiciones de servicio rigen la utilización de los servicios de pago y son adicionales a las descritas en las condiciones de uso y las normas de la publicación.</p>
                   <p style="text-align:justify;">1. Las autorenovaciones solo se efectuan desde las 09:00 am hasta las 00:00 (medianoche) hora española 
                    peninsular y por lo tanto no se consumen créditos entre medianoche y las nueve de la mañana aunque el servicio esta activado para el anuncio.</p>
                   
                <p style="text-align:justify;">2. Una vez activado el servicio de autorenovacion, el anuncio se auto renueva hasta que el anunciante desactive este servicio para el anuncio en cuestión, se terminen los créditos o el anuncio sea eliminado.
                    (bien porque caduque, sea borrado por el usuario o por Pasion Real.</p>
            <p style="text-align:justify;">3. Los créditos no son reembolsables. Una vez realizado el pago, este se cobrará integramente sin opción
                a devolución.</p>
            <p style="text-align:justify;">4. Los créditos adquiridos no son transferibles. Los créditos se asocian a la cuenta de correo electrónico
                que hay que indicar a la hora de comprar los créditos. Los créditos no se pueden transferir entre cuentas
                (es decir de un correo electrónico a otro) aunque el dueño de las cuentas sea el mismo.</p>

                <p style="text-align:justify;">5.Los créditos tienen una caducidad de 120 días. El uso de los créditos debe realizarse antes de 120 días desde que fueron adquiridos de otro modo se perderán.</p>
          <p style="text-align:justify;">6. En caso de que PasionReal.com borrase un anuncio porque considera, a su absoluta discreción, que dicho anuncio infrinja las Condiciones de Uso o las Normas de Publicación, PasionReal.com no 
            devolverá los créditos consumidos por dicho anuncio. Este anuncio simplemente deja de seguir consumiendo créditos.</p>
          <p style="text-align:justify;">7. En caso de que, por algún problema técnico o de otra índole, no se cumpliera con este servicio, nuestra responsabilidad se limitará únicamente a volver a subir tu anuncio sin coste adicional y a la mayor brevedad.</p>
            
        <p style="text-align:justify;">8. Los datos recabados por este servicio en la página de PasionReal.com se rigen por nuestra política de protección de datos.</p>
        
        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                     <div class="about-page-featured-image">
                        <a><img src="{{ asset('/images/logo_pasion2.png') }}" alt=""></a>
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
      
         <div class="clearfix"></div>
         <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
        @include('templates.footer')
         <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
      </div>
      <!-- Main Content Area End --> 
     
    
      <!-- Back To Top -->
      <a href="#0" class="cd-top">Top</a>
         <!-- SCRIPTS -->
    @include('templates.scripts')
   </body>
</html>

