<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=springstof', 'root', '');
} catch (PDOException $e) {
    exit('Database error.');
}
?>