<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

   /* public static $products = [
        ["id"=>"1", "name"=>"pothos" , "description" => "Pianta cadente" , "image" => "pothos.png" , "price" => "5"],
        ["id"=>"2", "name"=>"spatafillo" , "description" => "Pianta con fioritura colore bianco" , "image" => "spatafillo.png" , "price" => "10"],
        ["id"=>"3", "name"=>"ficus" , "description" => "green plant ...." , "image" => "ficus.png" , "price" => "5"],
        ["id"=>"4", "name"=>"palma" , "description" => "green plant ...." , "image" => "palma.png" , "price" => "10"],
    ];
   */


    public function index(){
        $viewData = [];

        $viewData["title"] = "Prodotti - Online Store";
        $viewData["subtitle"] = "Lista prodotti";
        $viewData["products"] = Product::where('availability',1)->get();
        
        return view('product.index')->with("viewData",$viewData);

    }
    
    public function show($id) {
    
        $viewData = [];

        $product = Product::findOrFail($id);

        $viewData["title"] = $product['name']. " - Online Store";
        $viewData["subtitle"] = "Descrizione prodotto";
        $viewData["product"] = $product;
        
        return view('product.show')->with("viewData",$viewData);
    }
}