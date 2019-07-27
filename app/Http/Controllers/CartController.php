<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
use App\ProductType;
use App\Product;
use Cart;


class CartController extends Controller
{
    public function addCart(Request $request){
        //return $request;
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $product = Product::find($request->product_id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'qty' => $request->qty,
            'options' => [
                'image' => $product->product_image
            ]
        ]);
        
        
        //return $cartProducts;
        return redirect('/cart');
        
    }
    
    public function showcart(){
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $products = Product::all();
        $cartProducts = Cart::content();
        return view('front-end.MyCart',['catagories'=>$catagories,'productTypes'=>$productTypes,'products'=>$products,'cartProducts'=>$cartProducts]);
  
        
    }
    
    public function updateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
        return redirect('/cart');
        
    }
    public function cartDelete($rowId){
        
        Cart::remove($rowId);
        
        return redirect('/cart');
    }
}
