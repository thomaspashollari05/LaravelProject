@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="card">
        <div class="card-header">
            Elenco prodotti
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
            
                <tr>
                    <th>Id</th>
                    <th>Immmagine</th>
                    <th>Name</th>
                    <th>Prezzo</th>
                    <th>Quantità</th>
                    <th>Elimina</th>
                </tr>
          
          
                @foreach ($viewData["products"] as $product)
                <tr>
                    <td>{{ $product->getId() }}</td>
                    <td class = "w-25"><img src = "{{ asset('storage/'.$product->getImage() )}}" class="img-fluid w-25" ></img></td>
                    <td>{{ $product->getName() }}</td>
                    <td>${{ $product->getPrice() }}</td>
                    <td>{{ session('products')[$product->getId()] }}</td>
                    <td>
                        <form method = "POST" action = "{{route('cart.deleteProduct', $product->getId()) }}">
                            @csrf
                            @method('DELETE')
                            <button type = "submit" class="btn bg-danger text-white mb-2">Elimina</button>
                        </form>  
                    </td>
                </tr>
                @endforeach
           
            </table>

            @if(count($viewData['products'])>0)
            
            <form method = "POST" action = "{{route('cart.purchase')}}" >
            @csrf

                <!-- ROW 0 -->
                <div class = "row">
                    <!-- colonna che sta a sx-->
                    <div class = "col-6 text-start">
                            <a><b>Totale {{ $viewData["total"] }} €</b></a>
                    </div>
                    
                    @if($viewData['balanceUpdate']<0)
                    
                    <div class = "col-4">
                        <a><b>Portafoglio {{ $viewData["balanceUpdate"] }} €</b></a>
                    </div>
                    
                    <div class = "col">
                        <a href = "{{route('myaccount.balance')}}" class = "btn btn-secondary text-white" style = "width:100%">Aggiorna portafoglio</a>
                    </div>
                    
                    @endif
                </div>

                <!-- ROW 1 -->
                 <!-- la row è suddivisa in 12 spazi-->
                <div class="row mt-3">
                    <!-- la colonna col-6 occupa 6 di 12 spazi-->
                    <div class = "col-6"></div>
                    
                    <!-- la colonna col-6 occupa 4 di 12 spazi-->
                    <div class = "col-4">
                            <select class="form-select" name = "tipologia" id = "tipologia">
                                <option selected value="Portafoglio virtuale">Portafoglio virtuale</option>
                                <option value="Alla consegna">Alla consegna</option>
                            </select>
                    </div>
                    
                    <!-- la colonna col-6 occupa restanti spazi-->
                    <div class = "col text-end">
                            <button type = "submit" class = "btn bg-secondary text-white" style = "width: 100%">Acquista</button>
                    </div> 
                </div>
            </form>    
            
                <!-- ROW 2 -->
                <div class = "row mt-3">

                    <div class = "col-6"></div>
                    <div class = "col-4"></div>
                    
                    <div class = "col">
                        <form method = "POST" action = "{{route('cart.delete')}}" >
                            @csrf
                            @method('DELETE')
                            <button type = "submit" class="btn bg-danger text-white mb-2" style = "width: 100%">Svuota carrello</button>
                        </form>
                    </div>        
                
                </div>  
            @endif   
        <!-- chiusura div card-->
        </div>

@endsection
