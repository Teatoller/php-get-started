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
    <ul>
    <?php
    $db = mysqli_connect(
        'localhost',
        'root',
        'root',
        'php'
    );
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($db, $sql);
    
    foreach ($result as $row) {
        printf('<li><span style="color: %s;" > %s (%s) </span></li>',
        htmlspecialchars($row['color']),
        htmlspecialchars($row['name']),
        htmlspecialchars($row['gender'])
    );
    }
    mysqli_close($db);
    ?>
    </ul>
</body>
</html>
