<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getId(){
        return $this->attributes["id"];
    }
    public function getName(){
        return $this->attributes["name"];
    }
    public function getDescription(){
        return $this->attributes["description"];
    }
    public function getImage(){
        return $this->attributes["image"];
    }
    public function getPrice(){
        return $this->attributes["price"];
    }
    public function getUpdateAt(){
        return $this->attributes['updated_at'];
    }
    public function getAvailability(){
        return $this->attributes['availability'];
    }
    public function setId($id){
        $this->attributes["id"]=$id;
    }
    public function setName($name){
        $this->attributes["name"]=$name;
    }
    public function setDescription($description){
        $this->attributes["description"]=$description;
    }
    public function setImage($image){
        $this->attributes["image"]=$image;
    }
    public function setPrice($price){
        $this->attributes["price"] = $price;
    }
    public function setUpdateAt($updateAt){
        $this->attributes["updateAt"] = $updateAt;
    }
    public function setAvailability($availability){
        $this->attributes["availability"] = $availability;
    }

    public static function calcTotal($productsDetail,$productsInSession){

        $totale = 0;

        foreach($productsDetail as $product){

            //per ogni prodotto prendo prezzo e quantità dall'array nel file sessione
            $totale += $product->getPrice()*$productsInSession[$product->getId()];
        }
        return $totale;
    }

    public function items(): HasMany{
        return $this->hasMany(Item::class);
    }
    public function gerItems(){
        return $this->items;
    }
    
}
