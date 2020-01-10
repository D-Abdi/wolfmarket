<?php
require_once '../includes/dbh.php';



if (isset($_POST['submit'])) {
    $id =  mysqli_real_escape_string($conn, $_POST['id']);
    $naam =  mysqli_real_escape_string($conn, $_POST['naam']);
    $telefoon =  mysqli_real_escape_string($conn, $_POST['telefoon']);
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $afspraak =  mysqli_real_escape_string($conn, $_POST['afspraak']);

}

require_once '../includes/validation.php';

//    $reserveringen = [
//    'naam' => $naam,
//    'telefoon' => $telefoon,
//    'email' => $email,
//    'afspraak' => $afspraak
//
//];

$query = "UPDATE reservering 
          SET naam = '$naam', telefoon = '$telefoon', email = '$email', afspraak = '$afspraak'
          WHERE id = '$id'";


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM reservering WHERE id = " . mysqli_escape_string($conn, $id);
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1)
    {
        $album = mysqli_fetch_assoc($result);
    }
}

mysqli_close($conn);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="../style/admin.style.css" type="text/css" rel="stylesheet">
</head>
<body>

<div>

    <form action="" method="POST">
        <div class="data-field">
            <label for="naam">Naam</label>
            <input type="text" name="naam" placeholder="<?= $reserveringen['naam'] ?>"><br><br>
        </div>
        <div class="data-field">
            <label for="telefoon">Telefoon</label>
            <input type="tel" name="telefoon" placeholder="<?= $reserveringen['telefoon'] ?>"><br><br>
        </div>
        <div class="data-field">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="<?= $reserveringen['email'] ?>"><br><br>
        <div class="data-field">
            <label for="naam">Afspraak</label>
            <textarea class="textarea" name="afspraak" rows="4" cols="50" pattern="[a-zA-Z0-9._%+-]" maxlength="120" placeholder="<?= $reserveringen['afspraak'] ?>"></textarea><br><br>
            <input type="submit" name="submit" value="Update" id="submit">
        </div>
    </form>
</div>
</body>