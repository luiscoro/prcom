@extends('admin.spaceadmin')
@section('contenido')
<div class="contenedor">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{Session::get('mensaje')}}
<button type="button" class="close" data-dismiss="alert" role="alert">
<span aria-button="true">&times;</span>
</button>
</div>
@endif

<div class="row">
  <div class="col-lg-12">
      <div class="card px-2">
          <div class="card-body">
              <div class="container-fluid">
                @if(!isset($cliente->perfil->image->url))
                <img style="max-width:150px;" class="img-lg rounded-circle mb-3" src="{{asset('images/user_default.png')}}" alt="foto">
                @else
                  <img style="max-width:300px;" class="img-lg rounded-circle mb-3" src="{{$cliente->perfil->image->url}}" class="card-img-top" alt="...">
                 @endif

                
                <h3 class="text-right my-5">Orden&nbsp;&nbsp;# {{$orden->id}}</h3>
                <hr>
              </div>
              <div class="container-fluid d-flex justify-content-between">
                <div class="col-lg-3 pl-0">
                  <p class="mt-5 mb-2"><b>Pasion real</b></p>
                  <p>104,<br>Calles SK,<br>España, K1A 0G9.</p>
                </div>
                <div class="col-lg-3 pr-0">
                  <p class="mt-5 mb-2 text-right"><b>Emitida por</b></p>
                  <p class="text-right">{{$orden->nombre_completo}},<br> {{$orden->dni}},<br> {{$orden->telefono}}.</p>
                </div>
              </div>
              <div class="container-fluid d-flex justify-content-between">
                <div class="col-lg-3 pl-0">
                  <p class="mb-0 mt-5">Fecha de compra : {{date('d-m-Y', strtotime($orden->fecha_orden))}}</p>
                  
                  {{-- <p>Fecha de vencimiento : {{$orden->fecha_orden->addDays(3)}}</p> --}}
                </div>
              </div>
              <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                <div class="table-responsive w-100">
                    <table class="table">
                      <thead>
                        <tr class="bg-dark text-white">
                            <th>#</th>
                            <th>Descripción</th>
                            <th class="text-right">Cantidad</th>
                            <th class="text-right">Precio unitario</th>
                            <th class="text-right">Total</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr class="text-right">
                          <td class="text-left">{{$orden->id}}</td>
                          <td class="text-left">Compra de créditos</td>
                          <td>{{$orden->cantidad_creditos}} créditos</td>
                          <td>0.20 EUR C/C</td>
                          <td>${{$orden->cantidad_creditos*0.2}}</td>
                        </tr>
                       
                        
                        
                      </tbody>
                    </table>
                  </div>
              </div>
              <div class="container-fluid mt-5 w-100">
                <p class="text-right mb-2">Monto Sub-total: ${{$orden->subtotal}}</p>
                {{-- <p class="text-right">vat (10%) : $138</p> --}}
                <h4 class="text-right mb-5">Total : ${{$orden->subtotal}}</h4>
                <hr>
              </div>
              <div class="container-fluid w-100">
                <a href="{{route('admin.pdfOrden',$orden->id)}}" class="btn btn-primary float-right mt-4 ml-2"><i class="fa fa-print mr-1"></i>Imprimir</a>
                {{-- <a href="#" class="btn btn-success float-right mt-4"><i class="fa fa-share mr-1"></i>Send Invoice</a>
             --}}
              </div>
          </div>
      </div>
  </div>
</div>
</div>


@endsection



