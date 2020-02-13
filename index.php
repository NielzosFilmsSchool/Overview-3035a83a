<?php

echo "<h1>Welkom op het netland beheerderspaneel</h1>";

$host = '127.0.0.1';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     $stmt = $pdo->query('SELECT title, rating FROM series');
     $table = "<table><tr><th>Titel</th><th>Rating</th></tr>";
     while ($row = $stmt->fetch())
     {
          $table .= "<tr><td>".$row['title']."</td><td>".$row['rating']."</td></tr>";
     }
     $table .= "</table>";
     echo "<h2>Series</h2>";
     echo $table;

     $stmt = $pdo->query('SELECT titel, duur FROM films');
     $table = "<table><tr><th>Titel</th><th>Duur</th></tr>";
     while ($row = $stmt->fetch())
     {
          $table .= "<tr><td>".$row['titel']."</td><td>".$row['duur']."</td></tr>";
     }
     $table .= "</table>";
     echo "<h2>Films</h2>";
     echo $table;
     
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>