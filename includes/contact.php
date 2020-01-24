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

$to = "$email";
$subject = "Afspraak bevestiging Wolffmarket";
$txt = "Bedankt voor het maken van een afspraak. Wij zullen op de gewenste datum contact met u opnemen.";
$headers = "From: no-reply@wolfmarket.com" . "\r\n";

mail($to,$subject,$txt,$headers);

header("location: ../index.html?verzonden!");
