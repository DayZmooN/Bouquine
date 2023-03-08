<?php
require_once './front/header-front.php';
session_start();
if (!isset($_SESSION["user"])) {
    header("location: ./front/connexion.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once './model/connexion.php'

    ?>

</body>

</html>