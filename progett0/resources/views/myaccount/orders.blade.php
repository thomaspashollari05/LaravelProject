@extends('layouts.app')
@section('title',$viewData['title'])
@section('subtitle',$viewData['subtitle'])
@section('content')


@foreach($viewData['orders'] as $order)
<div class="card mb-4" >

        <div class="card-header">
            <b> ORDINE - </b> {{$order->getId()}} 
        </div>
        <div class="card-body">


            <p class = "text-start"><b>Data ordine:</b> {{$order->getCreatedAt()}} </p>
            <p class = "text-start"><b>Totale euro:</b> {{$order->getTotal()}} </p>
            
            <table class="table table-bordered text-center mb-3">
                <tr>
                    <th>Prodotto</th>
                    <th>Nome</th>
                    <th>Prezzo</th>
                    <th>Quantità</th>
                </tr>
                @foreach ($order->getItems() as $item)
                <tr>
                    <td>{{ $item->getProduct()->getId() }}</td>
                    <td>{{ $item->getProduct()->getName() }}</td>
                    <td>{{ $item->getProduct()->getPrice() }}</td>
                    <td>{{ $item->getQuantity() }}</td>
                </tr>
                @endforeach
            </table>
        </div>
</div>
@endforeach
@endsection
