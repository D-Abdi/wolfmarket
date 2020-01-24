<?php
require_once '../includes/dbh.php';

if(isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = mysqli_escape_string($conn, $_GET['id']);

    $sql= "SELECT * FROM reservering WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $reserveringen = mysqli_fetch_assoc($result);

    /* Redirect naar Home pagina als er geen rijen zijn met hetzelfde id */
    if(mysqli_num_rows($result) == 0) {
        header("location: ../admin/welcome.php");
    }


} else {
    header("location: ../admin/welcome.php");
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="../style/admin.style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora|Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div>

    <form action="../includes/edit.php" method="POST" class="edit-form">
        <div class="data-field">
            <label for="naam">Naam</label><br><br>
            <input type="text" name="naam" value="<?= $reserveringen['naam'] ?>"><br><br>
        </div>
        <div class="data-field">
            <label for="telefoon">Telefoon</label><br><br>
            <input type="tel" name="telefoon" value="<?= $reserveringen['telefoon'] ?>"><br><br>
        </div>
        <div class="data-field">
            <label for="email">Email</label><br><br>
            <input type="email" name="email" value="<?= $reserveringen['email'] ?>"><br><br>
        <div class="data-field">
            <label for="afspraak">Afspraak</label><br><br>
            <textarea class="textarea" name="afspraak" rows="4" cols="50" maxlength="120" ><?= $reserveringen['afspraak'] ?></textarea><br><br>
            <input type="hidden" name="id" value="<?= $reserveringen['id'] ?>"/>
            <input type="submit" name="submit" value="Edit" id="submit">
        </div>
    </form>
</div>
</body>