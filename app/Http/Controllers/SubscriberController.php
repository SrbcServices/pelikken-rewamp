<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscriber;
class SubscriberController extends Controller
{
    public function index(){
        $su = subscriber::all();
        return view('admin.subscribed_users',['suscribers'=>$su]);
    }

    public function store(Request $request){
        $validated = \Validator::make($request->all(),[
            'subs'=>'required | email'
        ]);

       
            
//check valid
if($validated->fails()){
    return response()->json([
        'status'=>'errror',
        'message'=>'A valid Email Address is Required'
    ]);
}

$subscriber =new subscriber();
$subscriber->email = $request->subs;
$subscriber->status = 0;
$subscriber->save();

return response()->json([
    'status'=>'success',
    'message'=>'Thanks for Your Subscription'
]);

    }

    public function update($id,$status){
        $subscriber = subscriber::find($id);
        $subscriber->status =$status;
        $subscriber->save();

        return response()->json([
            'status'=>'success',
            'message'=>'Successully updated'
        ]);
    }
    

}
