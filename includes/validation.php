<?php
include_once 'dbh.php';
include_once 'contact.php';

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