<?php

namespace App;

use PDO;

/**
 * Singleton
 */
class dataBaseConnexion
{

    /**
     * @var Singleton
     * @access private
     * @static
     */
    private static $_instance = null;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    private function __construct()
    { }

    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     *
     * @param void
     * @return Singleton
     */
    public static function getInstance(Config $dbConfig)
    {
        try {

            $dsn ='mysql:host=' . $dbConfig->host .
                ';dbname=' . $dbConfig->dbname .
                ';charset=' . $dbConfig->charset;

            if (is_null(self::$_instance)) {
                self::$_instance = new PDO($dsn, $dbConfig->login, $dbConfig->pwd);
            }

            return self::$_instance;
        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());

        }
    }
}
