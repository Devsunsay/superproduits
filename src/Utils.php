<?php

namespace App;

class Utils {

    public static function redirect(string $location){
        header('Location:' . $location);
        exit;
    }

    public static function dbConnexion(string $dbname, string $login, string $pwd) {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=' . $dbname . ';charset=utf8', $login, $pwd);
            
            return $db;
        } catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }
    
}