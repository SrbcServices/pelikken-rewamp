<?php
use App\Models\category;
use App\Models\condinent;

function menu_helper(){
    return category::with('get_subcategories')->get();
}
function quantinent()
{
    return condinent::with('country')->get();
}


?>