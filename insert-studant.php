<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';
$pdo = ConnectionCreator::createConnection();


$studant = new Student(null, 'Erickson', new \DateTimeImmutable('1988-09-08'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$studant->name()}', '{$studant->birthDate()->format('Y-m-d')}');";
$sqlSelect = "SELECT * FROM students;";

var_dump($pdo->query($sqlSelect)->fetchAll(PDO::FETCH_ASSOC));