<?php

namespace App;

class Utils {

    public static function redirect(string $location){
        header('Location:' . $location);
        exit;
    }
    
}