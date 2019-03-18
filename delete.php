<?php

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: select.php');
}

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <?php
        readfile('navigation.tmpl.html');

    $db = mysqli_connect('localhost', 'root', 'root', 'php');
    $sql = "DELETE FROM users WHERE id=$id";
    mysqli_query($db, $sql);
    echo '<p> User deleted.</p>';
    mysqli_close($db);
    ?>
</body>
</html>
