<?php

global $pdo;
require_once(__DIR__ . '/inc/db-connect.php');
require_once(__DIR__ . '/inc/util.php');

if(!empty($_POST)){
    $name    = @(string) ($_POST['name']    ?? '');
    $title   = @(string) ($_POST['title']   ?? '');
    $comment = @(string) ($_POST['comment'] ?? '');


    if(!empty($name) && !empty($title) && !empty($comment)){
        $stmt = $pdo->prepare('INSERT INTO entries (`name`,`title`,`comment`) VALUES (:name, :title, :comment)');
        $stmt->bindValue('name', $name);
        $stmt->bindValue('title', $title);
        $stmt->bindValue('comment', $comment);
        $stmt->execute();

        header('Location: index.php?success=1');
        die();
    }
}

$errorMessage = 'Es ist ein Fehler aufgetreten ...';

require_once(__DIR__ . '/index.php');