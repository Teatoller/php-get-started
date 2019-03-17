<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INSERT PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    $name = '';
    $gender = '';
    $color = '';

    if (isset($_POST['submit'])) {
        $ok = true;
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            $ok = false;
        } else {
            $name = $_POST['name'];
        }
        if (!isset($_POST['gender']) || $_POST['gender'] === '') {
            $ok = false;
        } else {
            $gender = $_POST['gender'];
        }
        if (!isset($_POST['color']) || $_POST['color'] === '') {
            $ok = false;
        } else {
            $color = $_POST['color'];
        }

        if ($ok) {
            // database code
            $db = mysqli_connect(
                'localhost',
                'root',
                'root',
                'php'
            );
            $sql = sprintf("INSERT INTO users (name, gender, color) VALUES (
                '%s', '%s', '%s'
            )", mysqli_real_escape_string($db, $name),
                mysqli_real_escape_string($db, $gender),
                mysqli_real_escape_string($db, $color));
            mysqli_query($db, $sql);
            mysqli_close($db);
            echo '<p>User added.</p>';
        }

        // if ($ok) {
        //     $servername = "localhost";
        //     $username = "root";
        //     $password = "root";

        //     try {
        //         $conn = new PDO("mysql:host=$servername;dbname=php", $username, $password);
                
        //         // set the PDO error mode to exception
        //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //         echo "Connected successfully";
        //         $sql = sprintf("INSERT INTO users (name, gender, color) VALUES (
        //             '%s', '%s', '%s'
        //             )", mysqli_real_escape_string($db, $name),
        //                 mysqli_real_escape_string($db, $gender),
        //                 mysqli_real_escape_string($db, $color));
        //                 mysqli_query($db, $sql);
        //         $conn->exec($sql);
        //     } catch (PDOException $e) {
        //         echo "Connection failed: " . $e->getMessage();
        //     }
        // }
    }
    ?>
    <form method="post" action="">
    Username: <input type="text" name="name" value="<?php
        echo htmlspecialchars($name);
     ?>"><br>
    Gender:
        <input type="radio" name="gender" value="f"<?php
            if ($gender === 'f') {
                echo ' checked';
            }
            ?>>female
            <input type="radio" name="gender" value="m" <?php
            if ($gender === 'm') {
                echo ' checked';
            }
            ?>>male<br>
    Favorite color:
    <select name="color">
    <option value="">Please select</option>
    <option value="#f00"<?php
    if ($color === "#f00") {
        echo ' selected';
    }
     ?>>red</option>
    <option value="#0f0"<?php
    if ($color === "#0f0") {
        echo ' selected';
    }
     ?>>green</option>
    <option value="#00f"<?php
    if ($color === "#00f") {
        echo ' selected';
    }
     ?>>blue</option>
    </select><br>
            <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
