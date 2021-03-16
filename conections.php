<?php

use Alura\Pdo\Infastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

echo 'Conectei';

$pdo->exec('CREATE TABLE students (id INTEGER  PRIMARY KEY, name TEXT, birth_date TEXT)');

