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
        $ok = true;
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            $ok = false;
        }
        if (!isset($_POST['password']) || $_POST['password'] === '') {
            $ok = false;
        }
        if (!isset($_POST['comments']) || $_POST['comments'] === '') {
            $ok = false;
        }
        if (!isset($_POST['gender']) || $_POST['gender'] === '') {
            $ok = false;
        }
        if (!isset($_POST['tc']) || $_POST['tc'] === '') {
            $ok = false;
        }
        if (!isset($_POST['color']) || $_POST['color'] === '') {
            $ok = false;
        }
        if (!isset($_POST['languages']) || !is_array($_POST['languages']) 
        || count($_POST['languages']) === 0) {
            $ok = false;
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
    Username: <input type="text" name="name"><br>
    Password: <input type="password" name="password"><br>
    Gender: <input type="radio" name="gender" value="f">female
            <input type="radio" name="gender" value="m">male<br>
    Favorite color:
    <select name="color">
    <option value="">Please select</option>
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
