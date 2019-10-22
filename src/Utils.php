<?php

class Utils {

    public function redirect($location){
        header('Location:' . $location);
        exit;
    }
    
}