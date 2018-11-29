<?php
    $dsn = 'mysql:host=localhost;dbname=mphelan264_tech_support';
    $username = 'mphelan264';
    $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>