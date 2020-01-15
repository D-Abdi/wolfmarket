<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once '../includes/dbh.php';

$sql = "SELECT * FROM reservering; ";
$result = mysqli_query($conn, $sql);

    $reserveringen = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $reserveringen[] = $row;
    }

mysqli_close($conn);
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
<body id="table-body">
<div class="header">
    <h2>Ingelogd als <?php echo htmlspecialchars($_SESSION["username"]); ?> [Admin]</h2>
</div>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Naam</th>
        <th>Telefoon</th>
        <th>E-mail</th>
        <th>Afspraak</th>
        <th>Geplaatst</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="8">&copy; Aanvragen voor een afspraak</td>
    </tr>
    </tfoot>
    <tbody>
    <?php foreach ($reserveringen as $reservering) { ?>
    <tr>
        <td><?= $reservering['id']?></td>
        <td><?= $reservering['naam']?></td>
        <td><?= $reservering['telefoon']?></td>
        <td><?= $reservering['email']?></td>
        <td><?= $reservering['afspraak']?></td>
        <td><?= $reservering['datum']?></td>
        <td class="edit-delete"><a href="edit.php?id=<?= $reservering['id'] ?>">Edit</a></td>
        <td class="edit-delete"><a href="delete.php?id=<?= $reservering['id'] ?>">Delete</a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<p>
   <span class="rpassword"><a href="reset-password.php" >Reset wachtwoord</a></span>
    <span class="logout"><a href="logout.php" >Log uit</a></span>
</p>
</body>
</html>