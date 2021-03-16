<?php

use Alura\Pdo\Infastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();


$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$preparedStatement->bindValue(1,4,PDO::PARAM_INT);

if($preparedStatement->execute()){
    echo 'Student sucess delete';
}