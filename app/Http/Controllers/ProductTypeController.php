<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Catagory;

class ProductTypeController extends Controller
{
    public function ProductTypeAdd(){
        $catagories = Catagory::all();
        return view('admin.productType.ProductTypeAdd',['catagories'=>$catagories]);
    }
    
    public function ProductTypeSave(Request $request){
        
        $this->validate($request,[
            'catagory_id' => 'required',
            'productType_name' => 'required',
            'productType_description' => 'required'
            
        ]);
        
        $poductType = new ProductType();
        $poductType->catagory_id = $request->catagory_id;
        $poductType->productType_name = $request->productType_name;
        $poductType->productType_description = $request->productType_description;
        $poductType->save();
        
        return redirect('/product-type/add')->with('message','Product Type Added Successfully');
    }
    
    public function ProductTypeManage(){
        $productTypes = ProductType::all(); 
        return view('admin.productType.ProductTypeManage',['productTypes' => $productTypes]);
    }
    
    public function ProductTypeEdit($id){
        $productType = ProductType::find($id);
        $catagories = Catagory::all();
        $EditProductTypeCatagory = Catagory::find($productType->catagory_id); 
        
        return view('admin.productType.ProductTypeEdit',['productType' => $productType,'catagories'=> $catagories,'EditProductTypeCatagory'=>$EditProductTypeCatagory]);
    }
    
    public function ProductTypeUpdate(Request $request){
        
        $this->validate($request,[
            'catagory_id' => 'required',
            'productType_name' => 'required',
            'productType_description' => 'required'
            
        ]);
        
        $productType = ProductType::find($request->productType_id);
        
        //return $request;
        $productType->catagory_id = $request->catagory_id;
        $productType->productType_name = $request->productType_name;
        $productType->productType_description = $request->productType_description;
        $productType->save();
        
        return redirect('/product-type/manage')->with('message','Product Type Updated Successfully');
    }
    
    public function ProductTypeDelete($id){
        $productType = ProductType::find($id);
        $productType->delete();
        
        return redirect('/product-type/manage')->with('message','Product Type Deleted Successfully');
    }
}
