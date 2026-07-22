<?php
$conn = new mysqli('127.0.0.1', 'root', '', '', 3306);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$sql = 'CREATE DATABASE IF NOT EXISTS denova_education CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
if ($conn->query($sql) === TRUE) {
    echo 'Database created successfully';
} else {
    echo 'Error: ' . $conn->error;
}
$conn->close();
