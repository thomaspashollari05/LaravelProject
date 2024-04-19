@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

<div class = "card">
    <div class = "card-header">
        Ordine completato con successo!
    </div>
    <div class = "card-body">
        <p class="text-start"><b> Identificativo ordine </b> - {{$viewData["order"]->getId()}}</p>
        <p class="text-start"><b> Totale </b> - {{$viewData["order"]->getTotal()}} euro</p>
        <p class="text-start"><b> {{$viewData['strPagamento']}} </b></p>
        <p class="text-start"><b>{{$viewData['balance']}}</b></p>
        <p class="text-start"><b> Consegna prevista </b> - YYYY/MM/GG </p>

        <div class = "row">
            <div class = "col text-center">
                <a href = {{route('home.index')}} class="btn bg-primary text-white mb-2">Torna alla pagina iniziale</a>
            </div>
        </div>

    </div>
</div>
@endsection