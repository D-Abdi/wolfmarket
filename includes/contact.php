<?php
include_once 'validation.php';
include_once 'dbh.php';

$sql = $conn->prepare( "INSERT INTO reservering (naam, telefoon, email, afspraak) VALUES (?, ?, ?, ?)");

$sql->bind_param("ssss", $naam, $telefoon, $email, $afspraak);

    $naam = mysqli_real_escape_string($conn, $_POST['naam']);
    $telefoon = mysqli_real_escape_string($conn,$_POST['telefoon']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $afspraak = mysqli_real_escape_string($conn,$_POST['afspraak']);

$sql->execute();
$sql->close();
$conn->close();
header("location: ../index.html?verzonden!");
