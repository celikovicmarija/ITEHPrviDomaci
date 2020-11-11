<?php
$host = "localhost";
$db = "aerodrom";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_errno) {
    exit("Konekcija sa bazom nije uspela: " . $conn->connect_errno);
}