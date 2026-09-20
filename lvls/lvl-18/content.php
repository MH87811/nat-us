<?php

$expected_code = '0e314159265';

function verify_code($input, $expected): bool
{
    return $input == $expected;
}

$success = false;
$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'] ?? '';

    if (verify_code($code, $expected_code)) {
        $success = true;
    } else {
        $message = 'Verification failed.';
    }
}

?>

<h2>Verification Portal</h2>

<p>
    Enter your verification code.
</p>

<form method="POST">

    <input
            type="text"
            name="code"
            autocomplete="off"
    >

    <button type="submit">
        Verify
    </button>

</form>

<?php if ($success): ?>

    <hr>

    <p>
        Verification successful.
    </p>

    <p>
        Password: something
    </p>

<?php elseif ($message !== null): ?>

    <p>
        <?= htmlspecialchars($message) ?>
    </p>

<?php endif; ?>

<hr>

<a href="/lvl-18/status">
    Verification status
</a>