<?php
require_once '../includes/dbh.php';

if(isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];

} else {
    header("location: ../admin/welcome.php");
}

$sql= "SELECT * FROM reservering WHERE id = $id";
$result = mysqli_query($conn, $sql);
$reserveringen = mysqli_fetch_assoc($result);

/* Redirect naar Home pagina als er geen rijen zijn met hetzelfde id */
if(mysqli_num_rows($result) == 0) {
    header("location: ../admin/welcome.php");
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
<form action="../includes/delete.php" method="post">
    <p> Weet u zeker dat u de reservering van "<?=  $reserveringen['naam']?>" wilt verwijderen?</p>
    <input type="hidden" name="id" value="<?= $reserveringen['id'] ?>"/>
    <input type="submit" name="submit" value="Verwijderen"/>
</form>
</body>
</html>


