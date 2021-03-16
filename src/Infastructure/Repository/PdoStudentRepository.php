<?php


namespace Alura\Pdo\Infastructure\Repository;

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use PDO;

class PdoStudentRepository implements StudentRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allStudents(): array
    {
        $sqlQuery = 'SELECT * FROM students;';
        $stmt = $this->connection->query($sqlQuery);
        return $this->hydrateStudentList($stmt);

    }

    public function studentBirthAt(\DateTimeInterface $birthDate): array
    {
        $sqlQuery = 'SELECT * FROM students WHERE birth_date = ?;';
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(1, $birthDate->format('Y-m-d'));
        $stmt->execute();

        return $this->hydrateStudentList($stmt);
    }

    public function hydrateStudentList(\PDOStatement $stmt): array
    {
        $studentDataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $studentList = [];
        foreach ($studentDataList as $studentData) {
            $studentList[] = new Student(
                $studentData['id'],
                $studentData['name'],
                new \DateTimeImmutable($studentData['birth_date'])
            );
        }
        return $studentList;
    }

    public function insert(Student $student): bool
    {
        $inserQuery = 'INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);';
        $stmt = $this->connection->prepare($inserQuery);

        $success = $stmt->execute([
           ':name' => $student->name(),
           ':birth_date' => $student->birthDate()->format('Y-md'),
        ]);
        $student->defineID($this->connection->lastInsertId());
    }

    public function update(Student $student): bool
    {
        $updateQuery = 'UPDATE students SET name = :name, birth_date = :birth_date WHERE id = :id;';
        $stmt = $this->connection->prepare($updateQuery);
        $stmt->bindValue(':name',$student->name());
        $stmt->bindValue(':birth_date',$student->birthDate()->format('Y-m-d'));
        $stmt->bindValue('id',$student->id(), PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function save(Student $student): bool
    {
       if($student->id() === null){
           return $this->insert($student);
       }
       return  $this->update($student);
    }

    public function remove(Student $student): bool
    {
        $stmt = $this->connection->prepare('DELETE FROM students where id = ?;');
        $stmt->bindValue(1,$student->id(), PDO::PARAM_INT);

        return $stmt->execute();
    }
}