<?php

$dataBasePath = __DIR__.'/banco.sqlite';
// $connection =  new PDO('mysql:host=192.168.100.4;dbnam=banco', root, '');
$connection =  new PDO('sqlite:' . $dataBasePath);

$createTableSql = '
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER  PRIMARY KEY,
        name TEXT,
        birth_date TEXT);
    CREATE TABLE IF NOT EXISTS phones (
        id INTEGER PRIMARY KEY,
        area_code TEXT,
        number TEXT,
        student_id INTEGER,
        foreign key(student_id) references students(id)
        );
';

$connection->exec($createTableSql);