<?php

class Database
{
    public static function connect()
    {
        try {
            $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
       
        return $connection;
    }
}