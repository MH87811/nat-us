<?php

$secret = trim(file_get_contents(__DIR__.'secret.inc'));

$userSecret = $_POST['secret'] ?? '';

if ($userSecret === $secret) {
    echo "Password: $secret";
} else {
    echo '
        <form method="post">
            <label for="secret">
                Secret
                <input type="text" name="secret" id="secret">
            </label>
            <input type="submit" value="Submit">
        </form>
    ';
}
?>
<!--
    Secret source: secret.inc
-->