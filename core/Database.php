<?php

class Database
{
    
    public function Connect()
    {
        try
        {
            $db = new PDO("mysql:host=localhost;dbname=db_pixorion","root","");
            return $db;            
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

$dbObject = new Database();
$dbObject->Connect();