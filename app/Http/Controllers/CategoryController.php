<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class Categorycontroller extends Controller
{
    Public function index()
    {
        $categories = category::all();
        return view ('admin.category',['categories'=>$categories]);
    }


    
    public function store(Request $request)
    {
      $validated = \Validator::make($request->all(),[
       'category_name' => 'required',
]);
        if($validated->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>'Category name is required'
            ]);
        }
        
        $category = new Category();
        $category->Category_name = $request->category_name;
        $category->slug=str_replace (' ','_',$request->category_name);
        $saved = $category->save();

        

        if(!$saved){
            return response()->json([
                'status'=>'error',
                'message'=>'Something went wrong',
            ]);
        }

        return response()->json([
         
            'message' => 'category Added',
            'status'=>'Success',
        ]);
    }

    //update
    public function update(Request $request)
        {

            $category = Category::find($request->id);
            $category->category_name = $request->category_name;
            $category->slug=str_replace (' ','_',$request->category_name);
           

            $category->save(); 

            return response()->json([
                'status'=>'success',
                'message'=>'item is updated'
            ]);
            
        }

        // deleted section

    public function delete($id){

        $deleted = category::find($id)->delete();

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

