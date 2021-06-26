<?php
use App\Models\frontentcontact;
use App\Models\commends;

function get_messages(){

    return frontentcontact::where('status','0')->get();

}

function get_comments(){
    return commends::where('status','0')->get();
}

?> 