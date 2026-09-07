<?php

$secret = 'something';

if (isset($_POST['secret'])) {
    $encoded = base64_encode(strrev($secret));

    if ($_POST['secret'] == $encoded) {
        echo "Password: $secret";
    } else {
        echo "Access Denied";
    }
}

?>

<form method="post">
    <label for="secret">
        Secret:
        <input type="text" name="secret" id="secret">
    </label>
    <input type="submit" value="check">
</form>
