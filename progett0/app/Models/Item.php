<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public static function validate($request){
        $request->validate([
            "price" => "required | numeric | gt:0", //'price' => ['numeric','gt:0']
            "quantity" => "required | numeric | gt:0",
            "order_id" => "required | exists:orders,id",
            "product_id" => "required | exists:products,id",
        ]);
    }

    public function getId(){
        return $this->attributes["id"];
    }
    public function getQuantity(){
        return $this->attributes["quantity"];
    }
    public function getPrice(){
        return $this->attributes["price"];
    }
   
    public function setId($id){
        $this->attributes["id"] = $id;
    }
    public function setQuantity($quantity){
        $this->attributes["quantity"] = $quantity;
    }
    public function setPrice($price){
        $this->attributes["price"] = $price;
    }
    
   
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function getOrder(){
        return $this->order;
    }
    public function setOrder($order){
        $this->order = $order;
    }
    public function setOrderId($id){
        $this->attributes["order_id"] = $id;
    }
   
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function getProduct(){
        return $this->product;
    }
    public function setProduct($product){
        $this->orders = $product;
    }
    public function setProductId($id){
        $this->attributes["product_id"] = $id;
    }

    
}
