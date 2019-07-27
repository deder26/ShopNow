<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
use App\ProductType;
use App\Product;
use DB;
use Image;

class ProductController extends Controller
{
    public function ProductAdd(){
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        return view('admin.products.ProductAdd',['catagories'=>$catagories,'productTypes'=>$productTypes]);
    }
    
    public function ProductSave(Request $request){
        
        $this->validate($request,[
            'catagory_id' => 'required',
            'productType_id' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price'=>'required|numeric',
            'product_quantity'=>'required|numeric',
            'product_image' =>'required'
            
        ]);
        
        
        $productImage = $request->file('product_image');
        $ImageName = $productImage->getClientOriginalName();
        $directory = 'product-image/';
        $ImageUrl = $directory.$ImageName;
        //$productImage ->move($directory,$ImageName);
        Image::make($productImage)->resize(500,500)->save($ImageUrl);
        
        
        $product = new Product();
        
        $product->catagory_id = $request->catagory_id;
        $product->productType_id = $request->productType_id;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_image = $ImageUrl;
        
        $product->save();
        
        return redirect('/product/add')->with('message','Successfully Saved Product Info');
    }
    
    
    
    public function ProductManage(){
        $products = DB::table('products')
                  ->join('catagories','products.catagory_id','=','catagories.id')
                  ->join('product_types','products.productType_id','=','product_types.id')
                  ->select('catagories.catagory_name','product_types.productType_name','products.*')
                  ->paginate('10');
        return view('admin.products.ProductManage',['products'=>$products]);
    }
    
    public function ProductEdit($id){
        
        $product = Product::find($id);
        
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        
        $EditProductCatagory = Catagory::find($product->catagory_id);
        //return         $EditProductCatagory;
        $EditProductType = ProductType::find($product->productType_id);
        
        //$product = Product::find($id);
        //$catagory = Catagory::find($product->catagory_id);
        //$productTypes = ProductType::find($product->productType_id);
        
        
        return view('admin.products.ProductEdit',['product'=>$product,'catagories'=>$catagories,'productTypes'=>$productTypes,'EditProductCatagory'=>$EditProductCatagory,'EditProductType'=>$EditProductType]);
        
        
    }
    
    public function ProductUpdate(Request $request){
        
        
        $this->validate($request,[
            'catagory_id' => 'required',
            'productType_id' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price'=>'required|numeric',
            'product_quantity'=>'required|numeric',
            'product_image' =>'required'
            
        ]);
        $productImage = $request->file('product_image');
        $ImageName = $productImage->getClientOriginalName();
        $directory = 'product-image/';
        $ImageUrl = $directory.$ImageName;
        //$productImage ->move($directory,$ImageName);
        Image::make($productImage)->resize(500,500)->save($ImageUrl);
        
        
        $product = Product::find($request->product_id);
      
        
        $product->catagory_id = $request->catagory_id;
        $product->productType_id = $request->productType_id;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_image = $ImageUrl;
        
        $product->save();
        
        return redirect('/product/manage')->with('message','Successfully Updated Product Info');
        
    }
    
    public function ProductDelete($id){
        
        $product = Product::find($id);
        $product->delete();
        
        return redirect('/product/manage')->with('message','Successfully Deleted Product Info');
        
    }
    
    
}
