<?php


namespace Alura\Pdo\Infastructure\Persistence;

use PDO;

class ConnectionCreator
{
   static function createConnection() :PDO
   {
       $dataBasePath = __DIR__.'/../../../banco.sqlite';

       $connection =  new PDO('sqlite:' . $dataBasePath);
       $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $connection;
   }

}