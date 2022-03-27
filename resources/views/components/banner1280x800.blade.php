{{-- <div id="video"> --}}
   <div id="banner">
      <div id="video">
         <video autoplay muted loop id="myVideo" >
            <source src="{{asset('images/bg_pasion.mp4')}}" type="video/mp4">
          </video>
      </div>
   

    <div class="container">
    
       <div class="search-container">

     
          <!-- Form -->
          <h2>¿ Qué estás buscando ?</h2>
          
          <form action="{{route('home.filtrado')}}" method="GET">
             <!-- Search Input -->
             <div class="col-md-4 col-sm-6 col-xs-12 no-padding">
                <div class="form-group">
                   <input type="text" class="form-control banner-icon-search" name="titulo" placeholder="buscar por nombre del anuncio" value=""> 
                </div>
             </div>
             <!-- Search Category -->
             <div class="col-md-3 col-sm-6 col-xs-12 no-padding">
                <div class="form-group">
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
             <!-- Search Location -->
             <div class="col-md-3 col-sm-9 col-xs-12 no-padding columnSelect">
                <div class="form-group">
                   <select class=" form-control" name="categoria" id="categoriaSelect">
                      @foreach ($categorias as $categoria)
                      <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                      @endforeach                      
                   </select>
                </div>
             </div>
             <div class="col-md-2 col-sm-3 col-xs-12 no-padding columnBuscar">
                <div class="form-group form-action">
                   <button type="submit" class="btn btn-theme btn-search-submit">Buscar</button>
                </div>
             </div>
          </form>
       </div>
    </div>
 </div>

