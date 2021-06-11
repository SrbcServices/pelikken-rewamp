<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\NewsArrangment;
use Illuminate\Http\Request;
use PDO;

class NewsArrangmentController extends Controller
{
    public function index(){
        $ar = NewsArrangment::with('get_category')->get();
       //return $ar;
        return view('admin.ArrangeNews',['sections'=>$ar]);
    }
    //store
    public function store(Request $request){
        
        $validator = \Validator::make($request->all(),[
            'section_name'=>'required',
            'section_order'=>'required',
            'select_type'=>'required',
            'select_category'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>'All Field Is Required'
            ]);
        }
        $found = NewsArrangment::where('category',$request->select_category)->get();
        if(count($found)>0){
            return response()->json([
                'status'=>'error',
                'message'=>'category alraedy taken pleese choose another one'
            ]);
        }
        $arrangment = new NewsArrangment();
        $arrangment->section_name = $request->section_name;
        $arrangment->order = $request->section_order;
        $arrangment->type = $request->select_type;
        $arrangment->category = $request->select_category;
        $saved = $arrangment->save();
        if($saved){
            return response()->json([
                'status'=>'success',
                'message'=>'New section added'
            ]);
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'Something went wrong'
            ]);
        }

    }
    //delete a section
    public function delete(Request $request){
        $deleted = NewsArrangment::where('id',$request->sec_id)->delete();
        if($deleted){
            return response()->json([
                'status'=>'success',
                'message'=>'Successfully deleted the section'
            ]);
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'Error while deleting. Please try again'
            ]);
        }
    }
}
