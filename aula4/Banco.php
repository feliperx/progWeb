<?php

class Banco {
    private static $dbName = 'dbprogweb';
    private static $dbHost = 'localhost';
    private static $dbUser = 'root';
    private static $dbPassword = 'vasco';  
    private static $connect = null; 
    
    public function __construct() {
        die('A funcao Init nao eh permitida');
    } 
    
    public static function connect() {
        
        if(null == self::$connect){
            try { 
                self::$connect = new PDO("mysql:host=".self::$dbHost.";".
                        "dbname".self::$dbName, self::$dbUser, self::$dbPassword); 
                
            } catch (PDOException $exception) {
                die($exception->getMessage());
                
            }
        }
        return self::$connect;
    } 
    
    public static function desconect(){ 
        self::$connect = null;
        
    }
    
}