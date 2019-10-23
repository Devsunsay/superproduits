<?php

namespace App;

use PDO;

class Utils {

    public static function redirect(string $location){
        header('Location:' . $location);
        exit;
    }
}