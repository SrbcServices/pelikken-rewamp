<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ads;

class AdsController extends Controller
{

    Public function index()
    {
        $ads = ads::all();
        return view('admin.ads',['ads'=>$ads]);
  
    }     



     public function store(Request $request){
        
        $image = $request->image;
        list($type, $image) = explode(';',$image);
        list(, $image) = explode(',',$image);
        $image = base64_decode($image);
        $image_name = time().'.png';
        file_put_contents(public_path('uploads/ads/').$image_name, $image);



        $ads = new ads();
        $ads->adHeading = $request->heading;
        $ads->adDiscription = $request->discription;
        $ads->adImage = $image_name;
        $saved = $ads->save();
        
        if(!$saved){
            return response()->json([
                'status'=>'error',
                'message'=>'Something went wrong',
            ]);
        }

        return response()->json([
         
            'message' => 'Ads Added',
            'status'=>'success',
        ]);
    }
//delete


    public function delete($id){

        $deleted = ads::find($id)->delete();

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