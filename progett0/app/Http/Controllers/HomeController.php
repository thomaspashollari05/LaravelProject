<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
   public function index(){

        $viewData = [];
        $viewData['title'] = "Home page sito";
        return view('home.index')->with("viewData",$viewData);
    
    }
    
    public function about() {
    

        /*$title = "Our story";
        $subtitle = ".....non so cosa scrivere...";
        $description = "descrizione....";
        $author = "autore...";
        

        return view('home.about')->with("title",$title)
        ->with("subtitle",$subtitle)
        ->with("description",$description)
        ->with("author",$author);*/

        $viewData = [];
        $viewData['title'] = "Our story";
        $viewData['subtitle'] = ".....non so cosa scrivere...";
        $viewData['description'] = "descrizione....";
        $viewData['author'] = "autore...";

        return view('home.about')->with("viewData",$viewData);
    
    }
}