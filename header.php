<?php
include_once "db.php";
$user_type = $_SESSION['user_type'] ?? "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bekie</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/main.css">
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <?php
    include_once "menu.php";
    ?>