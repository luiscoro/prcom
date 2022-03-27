



<div class="modal fade modal-comentar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                        class="sr-only">Cerrar</span></button>
                <h3 class="modal-title">Agrega un comentario para este anuncio</h3>
            </div>
            <div class="modal-body" >
                <!-- content goes here -->
                <form action="{{route('cliente.comentarAnuncio',$anuncio)}}" method="POST">
                    @csrf
                  
                    <div class="rate" >
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                      </div>
                   
                   
  
                    <div class="form-group  col-md-12 col-sm-12">
                        <label>Agrega un comentario</label>
                        <textarea name="comentario" placeholder="El anuncio me parece..." rows="3"
                            class="form-control"></textarea>
                    <input name="anuncio_id" type="text" value="{{$anuncio->id}}" style="display:none">
                        </div>
                    
                    <div class="clearfix"></div>
                    <div class="col-md-12 col-sm-12 margin-bottom-20 margin-top-20">
                        <button type="submit" class="btn btn-theme btn-block">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('templates.scripts')
<script src="{{asset('bootstrap_star_rating/js/star-rating.js')}}"></script>
<script src="{{asset('bootstrap_star_rating/js/locales/es.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $('#input-1').rating({
        language: 'es',
        step: 1,
        starCaptions:{1:'Muy malo', 2:'Malo', 3:'Esta bien', 4:'Bueno', 5:'Muy bien'},
        starCaptionClasses:{1:'text-danger', 2:'text-warning', 3:'text-info', 4:'text-primary', 5:'text-success'},
    });
})
</script>

@endpush