@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')


<div class = "card">
    <div class = "card-header">
        <h5 class = "text-start"><b>Disponibilità</b></h5>
    </div>
    <div class = "card-body">
        
        <div >
            <p>Importo attuale {{$viewData['balance']}} €</p>
        </div>

       
            <form method = "POST" action = "{{route('myaccount.updateBalance')}}">
            <!--la row è sempre 12 quadretti -->
            <div class = "row">
                @csrf
                <!-- la col occupa 1 quadretto di 12 della row-->
                <div class = "col-1">
                    <label>Importo</label>
                </div>
                <!-- la col occupa 6 quadretti di 12 della row-->
                <div class = "col-6">
                    <input type = "number" min = 0 name = "importo">
                </div>
                <!-- la col occupa i quadretti restanti di 12 della row-->
                <div class = "col text-end">
                    <button type = "submit" class = "btn btn-secondary">Ricarica</button>
                </div>
           
        </div>
        </form>
        
    </div>

</div>

@endsection
