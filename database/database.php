<?php
    $dsn = 'mysql:host=localhost;dbname=D00190066';
    $username = 'D00190066';
    $password = '1YFBGARw';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>