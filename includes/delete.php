<?php

require_once 'dbh.php';

if(isset($_POST['id']) && ctype_digit($_POST['id'])) {
    $id = $_POST['id'];

    $sql = $conn->prepare("DELETE FROM reservering WHERE id=? ");
    $sql->bind_param("s", $id);

    $sql->execute();
    $conn->query($sql);
    $conn->close();

    header("location: ../admin/welcome.php?verwijderd!");
    exit;

} else {
    header("location: ../admin/welcome.php");
}













