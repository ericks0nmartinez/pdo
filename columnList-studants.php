<?php
require_once 'vendor/autoload.php';
$dataBasePath = __DIR__.'/banco.sqlite';
$pdo = new PDO('sqlite:' . $dataBasePath);
$statement = $pdo->query('SELECT * FROM students where id = 2;');

var_dump($statement->fetchColumn(1));
