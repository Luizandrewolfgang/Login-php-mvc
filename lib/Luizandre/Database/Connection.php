<?php

    namespace Luizandre\Database;

    abstract class Connection
    {
        private static $conn;

        public static function getConn()
        {
            if(!self::$conn) //self:: substitui o $this em variavel statica
            {
                self::$conn = new \PDO ('mysql: host=localhost; dbname=login', 'root' ,'');
                
            }

            return self::$conn;
        }
    }