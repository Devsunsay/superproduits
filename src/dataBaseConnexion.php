<?php

namespace App;

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
    private static $instance = null;

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
    public static function getInstance()
    {
        try {
            if (is_null(self::$instance)) {
                $dbConfig = new Config('config/db.ini');

                $dsn ='mysql:host=' . $dbConfig->host .
                    ';dbname=' . $dbConfig->dbname .
                    ';charset=' . $dbConfig->charset;

                self::$instance = new \PDO($dsn, $dbConfig->login, $dbConfig->pwd);
            }

            return self::$instance;

        } catch (Exception $e) {

            throw $e;

        }
    }
}
