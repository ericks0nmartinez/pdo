<?php
use \Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';
$dataBasePath = __DIR__.'/banco.sqlite';
$pdo = new PDO('sqlite:' . $dataBasePath);
$statement = $pdo->query('SELECT * FROM students WHERE id = 2;');
$studentList = $statement->fetch(PDO::FETCH_ASSOC);

while ($studentList = $statement->fetch(PDO::FETCH_ASSOC)){
    $studant = new Student(
        $studentList['id'],
        $studentList['name'],
        new \DateTimeImmutable($studentList['birth_date'])
    );
    echo $studant->age() . PHP_EOL;
}
exit();
var_dump($studentList);
