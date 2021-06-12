<?php
use App\Models\settings;
function generalDetails(){
    return settings::first();
}


?>