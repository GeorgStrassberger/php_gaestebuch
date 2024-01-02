<?php

global $pdo;
require_once(__DIR__ . '/inc/db-connect.php');
require_once(__DIR__ . '/inc/util.php');

if(!empty($_POST)){
    $name = '';
    if (isset($_POST['name'])){
        $name = @(string) $_POST['name'];
    }

    $title = '';
    if (isset($_POST['title'])){
        $title = @(string) $_POST['title'];
    }

    $comment = '';
    if (isset($_POST['comment'])){
        $comment = @(string) $_POST['comment'];
    }

    if(!empty($name) && !empty($title) && !empty($comment)){
        $stmt = $pdo->prepare('INSERT INTO entries (`name`,`title`,`comment`) VALUES (:name, :title, :comment)');
        $stmt->bindValue('name', $name);
        $stmt->bindValue('title', $title);
        $stmt->bindValue('comment', $comment);
        $stmt->execute();

        echo '<a href="index.php">Zurück zum Gästebuch.</a>';
        die();
    }
}

$errorMessage = 'Es ist ein Fehler aufgetreten ...';

require_once(__DIR__ . '/index.php');