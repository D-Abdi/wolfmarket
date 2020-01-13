<?php

require_once 'dbh.php';

if(isset($_POST['id']) && ctype_digit($_POST['id'])) {
    $id = $_POST['id'];

} else {
    header("location: ../admin/welcome.php");
}


$sql = "DELETE FROM reservering WHERE id= $id";
$conn->query($sql);
$conn->close();

header("location: ../admin/welcome.php?verwijderd!");
exit;










