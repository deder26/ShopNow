<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;

class CatagoryController extends Controller
{
    public function CatagoryAdd(){
        return view('admin.catagory.CatagoryAdd');
    }
    
    public function SaveCatagory(Request $request){
        
        $this->validate($request,[
            'catagory_name' => 'required',
            'catagory_description' => 'required'
        ]);
        
        $catagory = new Catagory();
        $catagory->catagory_name = $request->catagory_name;
        $catagory->catagory_description = $request->catagory_description;
        $catagory->save();

        return redirect('/catagory/add')->with('message','Catagory Added Successfully');
    }
    
    
    public function CatagoryManage(){
        $catagories = Catagory::all();
        return view('admin.catagory.CatagoryManage',['catagories'=>$catagories]);
    }
    
    public function CatagoryEdit($id){
        $catagory = Catagory::find($id);
        return view('admin.catagory.CatagoryEdit',['catagory'=>$catagory]);
    }
    
    public function CatagoryUpdate(Request $request){
        
        $this->validate($request,[
            'catagory_name' => 'required',
            'catagory_description' => 'required'
        ]);
        
        $catagory = Catagory::find($request->catagory_id);
        $catagory->catagory_name = $request->catagory_name;
        $catagory->catagory_description = $request->catagory_description;
        $catagory->save();
        
        return redirect('/catagory/manage')->with('message','Catagory Updated Successfully');
    }
    
    public function CatagoryDelete($id){
        $catagory = Catagory::find($id);
        $catagory->delete();
        return redirect('/catagory/manage')->with('message','Catagory Deleted Successfully');
    }
    
    
    
    
}
