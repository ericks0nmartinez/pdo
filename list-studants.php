<?php

use Alura\Pdo\Infastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($pdo);
$studentsList = $repository->allStudents();
var_dump($studentsList);