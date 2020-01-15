<?php
require_once '../includes/dbh.php';

if(isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = mysqli_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM reservering WHERE id = $id; ";
    $result = mysqli_query($conn, $sql);

    $reserveringen = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    /* Antoine vragen over de prepared statements */
//    if ($sql = $conn->prepare( "SELECT * FROM reservering WHERE id = ?")) {
//        $sql->bind_param("i", $id);
//        if ($sql->execute()) {
//
//            $sql->bind_result($reserveringen);
//            while ($sql->fetch()) {
//                printf ("%s \n", $reserveringen);
//            }
//        }
//        $sql->close();
//    }
//    $conn->close();

} else {
    exit;
     header("location: ../admin/welcome.php");
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete - <?= $reserveringen['naam'] ?></title>
    <link href="../style/admin.style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora|Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="delete-form">
<form action="../includes/delete.php" method="post" >
    <p> Weet u zeker dat u de reservering van "<?=  $reserveringen['naam']?>" wilt verwijderen?</p>
    <input type="hidden" name="id" value="<?= $reserveringen['id'] ?>"/>
    <input type="submit" name="submit" value="Verwijderen"/>
</form>
</div>
</body>
</html>


