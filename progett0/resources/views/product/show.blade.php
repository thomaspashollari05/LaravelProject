@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle',$viewData['subtitle'])
@section('content')

<!--mt st per top margin mb bottom margin-->
<div class = "card mt-3 mb-3">
    <div class ="row g-0">
        <div class ="col-md-4">
            <img src="{{asset('/storage/'.$viewData['product']->getImage()) }}" class = "img-fluid rounded-start"> 
        </div> 
        <div class="col-md-8">
            <div class="card-body">

                <h5 class="card-text" style="text-align:left"><small class="text-muted"><b>Nome:</b> {{$viewData["product"]["name"]}}</small></p>
                <p class="card-text" style="text-align:left"><small class="text-muted"><b>Prezzo:</b> {{$viewData["product"]["price"] }} €</small></p>
                <p class="card-text"style="text-align:left"><small class="text-muted"><b>Descrizione:</b> {{$viewData["product"]["description"]}}</small></p>
            
                <p class="card-text">
                    <form method = "POST" action="{{route('cart.add', ['id' => $viewData['product']->getId()]) }}">
                        <div class="row"> <!-- una row che contiene due col-auto -->
                            @csrf
                            <!-- prima colonna -->
                            <div class = "col-auto">
                                <div class = "input-group col-auto">
                                    <div class = "input-group-text">Quantita'</div>
                                    <input type = "number" min = "1" max = "10" class = "form-comtrol quantity-input" name = "qta" value = "1">
                                </div>
                            </div>
                            <!-- prima colonna -->
                            <div class = "col-auto">
                                <button class = "btn bg-secondary text-white" type = "submit">Aggiungi al carrello</button>
                            </div>
                        </div>
                    </form>
                </p> 
            </div> 
        </div>
    </div>
</div>  

    
@endsection