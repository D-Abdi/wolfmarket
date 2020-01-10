<?php
require_once '../includes/dbh.php';

if (isset($_POST['submit'])) {
    $query = "SELECT * FROM reservering WHERE id = " . mysqli_escape_string($conn, $_POST['id']);
    $result = mysqli_query($conn, $query) or die ('Error: ' . $query );
    $album = mysqli_fetch_assoc($result);
}

$query = "DELETE FROM reservering WHERE id = " . mysqli_escape_string($conn, $_POST['id']);
mysqli_query($conn, $query) or die ('Error: '.mysqli_error($conn));

mysqli_close($conn);

header("location: welcome.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM albums WHERE id = " . mysqli_escape_string($conn, $_POST['id']);
    mysqli_query($conn, $query) or die ('Error: '.mysqli_error($conn));

    if(mysqli_num_rows($result) == 1) {
        $reserveringen = mysqli_fetch_assoc($result);
    } else {
        header('location: welcome.php');
        exit;
    }
}else {
    header('location: welcome.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete - <?= $reserveringen['naam'] ?></title>
    <link href="../style/admin.style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h2>Delete - <?= $reserveringen['naam'] ?></h2>
</body>
