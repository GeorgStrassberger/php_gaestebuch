<?php

try {
    $pdo = new PDO('mysql:host=localhost; dbname=php_guestbook', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e){
    echo 'Probleme mit der Datenbankverbindung...';
    die();
}

