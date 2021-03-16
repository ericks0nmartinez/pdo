<?php

use Alura\Pdo\Infastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$statement = $pdo->query('SELECT * FROM students;');
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC );
$studentList = [];
foreach ($studentDataList as $studentData){
    $studentDataList[] = new \Alura\Pdo\Domain\Model\Student(
        $studentData['id'],
        $studentData['name'],
        new \DateTimeImmutable($studentData['birth_date'])
    );
}
var_dump($studentDataList);
