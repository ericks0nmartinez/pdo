<?php


namespace Alura\Pdo\Infastructure\Persistence;


use PDO;

class ConnectionCreator
{
   static function createConnection() :PDO
   {
       $dataBasePath = __DIR__.'/../../../banco.sqlite';

       return new PDO('sqlite:' . $dataBasePath);
   }

}