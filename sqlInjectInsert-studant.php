<?php

use Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';
$dataBasePath = __DIR__.'/banco.sqlite';
$pdo = new PDO('sqlite:'.$dataBasePath);

$studant = new Student(
    null, "Erickson''); DROP TABLE students; --dias",
    new \DateTimeImmutable('1988-09-08'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $studant->name());
$statement->bindValue(2, $studant->birthDate()->format('Y-m-d'));

if($statement->execute()){
    echo 'Aluno incluido';
}