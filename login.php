<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <?php
    if (isset($_POST['name']) && isset($_POST['password'])) {
        $db = mysqli_connect('localhost', 'root', 'root', 'php');
        $sql = sprintf("SELECT * FROM users WHERE name='%s'",
        mysqli_real_escape_string($db, $_POST['name']) 
    );
    $result = mysqli_query($db, $sql);
    $row = mysql_fetch_assoc($result);
    if ($row) {
        $hash = $row['password'];
        $isAdmin = $row['isAdmin'];

        if (password_verify($_POST['password'], $hash)) {
            echo 'Login Succesful.';
        } else {
            // password is incorrrect
            echo 'Login failed';
        }
        // user does not exit
    } else {
        echo 'Login failed.';
    }
    mysqli_close($db);
    }

    ?>
    <form method="post" action="">
        Username <input type="text", name="name"><br>
        Password <input type="password", name="password"><br>
        <input type="submit" value="Login" >
    </form>
</body>
</html>
