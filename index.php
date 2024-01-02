<?php
global $pdo;
require(__DIR__ . '/inc/util.php');
require(__DIR__ . '/inc/db-connect.php');

$stmt = $pdo->prepare('SELECT * FROM `entries`');
$stmt->execute();

$entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

require(__DIR__ . '/views/index.view.php');
require(__DIR__ . '/submit.php');


