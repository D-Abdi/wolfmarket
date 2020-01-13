<?php

require_once 'dbh.php';

if(isset($_POST['id']) && ctype_digit($_POST['id'])) {
    $id = $_POST['id'];

} else {
    header("location: ../admin/welcome.php");
}

require_once 'validation.php';

$sql = "UPDATE reservering SET naam = '$naam', telefoon = '$telefoon', email = '$email', afspraak = '$afspraak'
        WHERE id = '$id'";

$result = mysqli_query($conn, $sql);
$conn->query($sql);
$conn->close();

header("location: ../admin/welcome.php?bijgewerkt!");
exit;

