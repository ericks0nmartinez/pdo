<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

$connection->beginTransaction();
$aStudent = new Student(
    12,
    'Jaqueline Martinez',
    new DateTimeImmutable('1987-03-02')
);
$anotherStudent = new Student(
    null,
    'Erickson Martinez',
    new DateTimeImmutable('1988-08-09')

);
if($studentRepository->save($anotherStudent) && $studentRepository->save($aStudent)){
    $connection->commit();
}else{
    $connection->commit();
}
