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
</head>
<body>
<div class="header">
    <h1>Administrator</h1>
    <h2>Ingelogd als <?php echo htmlspecialchars($_SESSION["username"]); ?></h2>
</div>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Naam</th>
        <th>Telefoon</th>
        <th>E-mail</th>
        <th>Afspraak</th>
        <th>Geplaatst op</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="6">&copy; Aanvragen voor een afspraak</td>
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
        <td><a href="edit.php?id=<?= $reservering['id'] ?>">Edit</a></td>
        <td><a href="delete.php?id=<?= $reservering['id'] ?>">delete</a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<p>
    <a href="reset-password.php" >Reset je wachtwoord</a>
    <a href="logout.php" >Log uit</a>
</p>
</body>
</html>