<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\condinent;
use App\Models\country;



class CountryController extends Controller
{
    
    Public function index()
     {
        $countries = country::all();
        
        $countries = \DB::table('countries')
            ->join('condinents', 'condinents.id', '=', 'countries.condinent_id')
            ->select('countries.*','condinents.Condinent_Name')
            ->get();
        
        $condinent= \DB::table('condinents')->select('id','Condinent_Name')->get(); 


         return view('admin.country',['condinent'=>$condinent,'countries'=>$countries]);
             
    }

    public function store(Request $request)
{

    $validated = \Validator::make($request->all(),[
    'country_name' => 'required',
    'select_country' => 'required'
    ]);
    if($validated->fails()){

    return response()->json([
    'status'=>'error',
    'message'=>'Something is required'
    ]);
    }
        
         $country = new country();

         $country->condinent_id = $request->select_country;
         $country->country_name = $request->country_name;
         $country->slug=str_replace (' ','_',$request->country_name);

         $saved = $country->save();
          
         


        if(!$saved){
            return response()->json([
                'status'=>'error',
                'message'=>'Something went wrong',
            ]);
        }
        
        return response()->json([


            'message' => 'Country Added',
            'status'=>'Success',]);



        }

public function update(Request $request,$id)
        {

            $country = country::find($id);
            $country->country_name = $request->country_name;
            $country->condinent_id = $request->select_country;
            $country->slug=str_replace (' ','_',$request->country_name);
           

            $country->save(); 



            return response()->json([
                'status'=>'success',
                'message'=>'item is updated'
            ]);
            
        }

        public function delete($id){

            $deleted = country::find($id)->delete();
    
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
