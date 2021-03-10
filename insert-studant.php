<?php

use Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';
$dataBasePath = __DIR__.'/banco.sqlite';
$pdo = new PDO('sqlite:'.$dataBasePath);

$studant = new Student(null, 'Erickson', new \DateTimeImmutable('1988-09-08'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$studant->name()}', '{$studant->birthDate()->format('Y-m-d')}');";
$sqlSelect = "SELECT * FROM studants;";

var_dump($pdo->query($sqlSelect));