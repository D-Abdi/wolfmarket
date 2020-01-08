<?php
include_once 'validation.php';
include_once 'dbh.php';

    $naam = mysqli_real_escape_string($conn, $_POST['naam']);
    $telefoon = mysqli_real_escape_string($conn,$_POST['telefoon']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $afspraak = mysqli_real_escape_string($conn,$_POST['afspraak']);


$sql = "INSERT INTO reservering (naam, telefoon, email, afspraak) VALUES ('$naam', '$telefoon', '$email', '$afspraak')";
mysqli_query($conn, $sql);

header("location: ../index.html?verzonden!");