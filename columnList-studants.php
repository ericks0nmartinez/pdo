<?php

use Alura\Pdo\Infastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$statement = $pdo->query('SELECT * FROM students where id = 2;');

var_dump($statement->fetchColumn(1));
