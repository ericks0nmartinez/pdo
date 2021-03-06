<?php


namespace Alura\Pdo\Infastructure\Repository;

use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use http\Exception\RuntimeException;
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
        $studentDataList = $stmt->fetchAll();
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
        $insertQuery = 'INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);';
        $stmt = $this->connection->prepare($insertQuery);
        if($stmt === false){
            throw new RuntimeException($this->connection->errorInfo()[2]);
        }

        $success = $stmt->execute([
           ':name' => $student->name(),
           ':birth_date' => $student->birthDate()->format('Y-m-d'),
        ]);
        $student->defineID($this->connection->lastInsertId());
        return $success;
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

    public function studentsWhithPhones(): array
    {
       $sqlQuery = "SELECT students.id,
                           students.name,
                           students.birth_date,
                           phones.id as phones_id,
                           phones.area_code,
                           phones.number
                    FROM students
                        join phones ON students.id = phones.student_id;";
       $stmt = $this->connection->query($sqlQuery);
       $result = $stmt->fetchAll();
       $studentsList = [];
       foreach ($result as $row) {
           if(!array_key_exists($row['id'], $studentsList)) {
               $studentsList[$row['id']] = new Student(
                   $row['id'],
                   $row['name'],
                   new \DateTimeImmutable($row['birth_date']),
               );
           }
           $phone = new Phone($row['phone_id'], $row['area_code'], $row['number']);
           $studentsList[$row['id']]->addPhone($phone);
       }
       return $studentsList;
    }
}