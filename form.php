<<!DOCTYPE html>
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
    if (isset($_POST['submit'])) {

        printf( 'Username: %s
        <br>Password: %s
        <br>Gender: %s
        <br>Color: %s
        <br>Language(s): %s,
        <br>Comments: %s
        <br>T&amp;C: %s', 
            $_POST['name'],
            $_POST['Password'],  
            $_POST['gender'], 
            $_POST['color'], 
            implode(' ', $_POST['languages']), 
            $_POST['comments'], 
            $_POST['tc']);
        }
    ?>
    <form method="post" action="">
    Username: <input type="text" name="name"><br>
    Password: <input type="password" name="password"><br>
    Gender: <input type="radio" name="gender" value="f">female
            <input type="radio" name="gender" value="m">male<br>
    Favorite color:
    <select name="color">
    <option value="#foo">red</option>
    <option value="#ofo">green</option>
    <option value="#oof">blue</option>
    </select><br>
    Languages spoken:
    <select name="languages[]" multiple size="3">
    <option value="en">English</option>
    <option value="fr">French</option>
    <option value="it">Italian</option>
    </select><br>
    Comments: <textarea name="comments"></textarea><br>
            <input type="checkbox" name="tc" value="ok">I accept the T&C<br>
            <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>