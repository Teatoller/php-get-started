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
    $name = '';
    $password = '';
    $comments = '';
    $gender = '';
    $tc = '';
    $color = '';
    $languages = array();

    if (isset($_POST['submit'])) {
        $ok = true;
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            $ok = false;
        } else {
            $name = $_POST['name'];
        }
        if (!isset($_POST['password']) || $_POST['password'] === '') {
            $ok = false;
        } else {
            $password = $_POST['password'];
        }
        if (!isset($_POST['comments']) || $_POST['comments'] === '') {
            $ok = false;
        } else {
            $comments = $_POST['comments'];
        }
        if (!isset($_POST['gender']) || $_POST['gender'] === '') {
            $ok = false;
        } else {
            $gender = $_POST['gender'];
        }
        if (!isset($_POST['tc']) || $_POST['tc'] === '') {
            $ok = false;
        } else {
            $tc = $_POST['tc'];
        }
        if (!isset($_POST['color']) || $_POST['color'] === '') {
            $ok = false;
        } else {
            $color = $_POST['color'];
        }
        if (!isset($_POST['languages']) || !is_array($_POST['languages']) 
        || count($_POST['languages']) === 0) {
            $ok = false;
        } else {
            $languages = $_POST['languages'];
        }

        if($ok) {
        printf( 'Username: %s
        <br>Password: %s
        <br>Gender: %s
        <br>Color: %s
        <br>Language(s): %s
        <br>Comments: %s
        <br>T&amp;C: %s', 
            htmlspecialchars($_POST['name']),
            htmlspecialchars($_POST['Password']),  
            htmlspecialchars($_POST['gender']), 
            htmlspecialchars($_POST['color']), 
            htmlspecialchars(implode(' ', $_POST['languages'])), 
            htmlspecialchars($_POST['comments']), 
            htmlspecialchars($_POST['tc']));
        }
    }
    ?>
    <form method="post" action="">
    Username: <input type="text" name="name" value="<?php
        echo htmlspecialchars($name);
     ?>"><br>
    Password: <input type="password" name="password" value="<?php
        echo htmlspecialchars($password);
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
    Languages spoken:
    <select name="languages[]" multiple size="3">
    <option value="en"<?php
    if (in_array( 'en', $languages)) {
        echo ' selected';
    }
     ?>>English</option>
    <option value="fr" <?php
    if (in_array( 'fr', $languages)) {
        echo ' selected';
    }
     ?>>French</option>
    <option value="it" <?php
    if (in_array( 'it', $languages)) {
        echo ' selected';
    }
     ?>>Italian</option>
    </select><br>
    Comments: <textarea name="comments"><?php
        echo htmlspecialchars($comments);
     ?></textarea><br>
            <input type="checkbox" name="tc" value="ok" <?php
            if ($tc === "ok") {
                echo ' checked';
            }
             ?>>I accept the T&C<br>
            <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
