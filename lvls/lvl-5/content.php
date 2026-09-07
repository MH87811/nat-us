<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Level 5</title>
</head>
<body>
<?php
    $password = 'something';
    if (!isset($_COOKIE['logged_in'])) {
        setcookie('logged_in', '0');
        $_COOKIE['logged_in'] = '0';
    }

    $logged_in = $_COOKIE['logged_in'];
    if ($logged_in == '1') {
        echo "Password: $password";
    } else {
        echo "Access Denied";
    }
?>
</body>
</html>