<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class MyAccountController extends Controller
{

    public function orders(){

        $viewData['title'] = "I miei ordini";
        $viewData['subtitle'] = 'Riepilogo ordini';

        $user_id = Auth::user()->getId();
        //where equivale alla readById() '-> get()' equivale alla fetchAll()
        $viewData['orders'] = Order::where('user_id',Auth::user()->getId())->get();
       

        return view('myaccount.orders')->with('viewData', $viewData);
        
    }

    public function balance()
    {
        $viewData['title'] = "Portafoglio virtuale";
        $viewData['subtitle'] = 'Portafoglio virtuale';
        $viewData['balance'] = Auth::user()->getBalance();

        return view('myaccount.balance')->with('viewData', $viewData);
    }

    public function updateBalance(Request $request){
        
        $balance = Auth::user()->getBalance() + $request -> importo;
        Auth::user()->setBalance($balance);
        Auth::user()->save();
        
        return back();
    }
    

}