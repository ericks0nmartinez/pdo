<?php
require_once 'vendor/autoload.php';
$dataBasePath = __DIR__.'/banco.sqlite';
$pdo = new PDO('sqlite:' . $dataBasePath);
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
