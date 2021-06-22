<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subCategory;
use App\Models\category;

class SubCategoryController extends Controller
    {
    Public function index()
     {
         $sub_categories = subCategory::with('category')->get();

        // return $sub_categories;
        
         return view('admin.sub-category',['sub_categories'=>$sub_categories]);

     }

public function store(Request $request)
{

    $validated = \Validator::make($request->all(),[
    'sub_category_name' => 'required',
    'select_category' => 'required'
        ]);
    if($validated->fails()){
    return response()->json([
    'status'=>'error',
    'message'=>'Something is required'
    ]);
    }

    

         $sub_category = new subCategory();
         $sub_category->category_id = $request->select_category;
         $sub_category->Sub_Category_name = $request->sub_category_name;
         $sub_category->slug=str_replace (' ','_',$request->sub_category_name);

         $saved = $sub_category->save();

        if(!$saved){
            return response()->json([
                'status'=>'error',
                'message'=>'Something went wrong',
            ]);
        }
        return response()->json([

            'message' => 'Sub category Added',
            'status'=>'Success',

        ]);

}
    public function update(Request $request)
        {
             //foreach($request->select_category as $select){
            $sub_category = subCategory::find($request->id);
            
            $sub_category->category_id = $request->select_category;
            $sub_category->Sub_Category_name = $request->sub_category_name;
            $sub_category->slug=str_replace (' ','_',$request->sub_category_name);

            $sub_category->save();  


            return response()->json([
                'status'=>'success',
                'message'=>'item is updated'
                
            ]);
            
        }


        public function delete($id){

            $deleted = subCategory::find($id)->delete();
    
    if($deleted){
        return response()->json([
            'status'=>'success',
            'message'=>'deleted'
        ]);
    }
    return response()->json([
        'status'=>'error',
        'message'=>'error'
    ]);
           
    
}


    }



