<?php
include_once 'dbh.php';

$naam = mysqli_real_escape_string($conn, $_POST['naam']);
$telefoon = mysqli_real_escape_string($conn,$_POST['telefoon']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$afspraak = mysqli_real_escape_string($conn,$_POST['afspraak']);


$errors = [];

if($naam == "") {
    $errors['naam'] = 'Naam mag niet leeg zijn.';
}

if($telefoon == "") {
    $errors['telefoon'] = 'Telefoon mag niet leeg zijn.';
}

if($email == "") {
    $errors['email'] = 'email mag niet leeg zijn.';
}

if($afspraak == "") {
    $errors['afspraak'] = 'afspraak mag niet leeg zijn.';
}