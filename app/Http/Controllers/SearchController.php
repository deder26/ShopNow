<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Catagory;
use App\ProductType;
use App\Product;
class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->search;
        if($query)
        {
            //return $query;
            $catagories = Catagory::all();
            $productTypes = ProductType::all();
            $products = DB::table('products')
            ->where('product_name','LIKE','%'.$query.'%')
            ->orWhere('product_description','LIKE','%'.$query.'%')
            ->orWhere('product_price','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(15);
            if(!$products->isEmpty())
                return view('front-end.productView',['catagories'=>$catagories,'productTypes'=>$productTypes,'products'=>$products]);
            else
                return redirect('/search-doesnt-exist');
        }
        else return redirect('/');
    }
    public function SearchDoesntExist(){
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $products = Product::all();
        return view('front-end.queryDoesntExist',['catagories'=>$catagories,'productTypes'=>$productTypes,'products'=>$products]);
    }
} 
