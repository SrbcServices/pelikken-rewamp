<?php
use App\Models\category;

function menu_helper(){
    return category::with('get_subcategories')->get();
}


?>