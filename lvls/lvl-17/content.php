<?php

$next = $_GET['next'] ?? '/dashboard';

$token = 'level17-secret-token';

if (isset($_GET['continue'])) {
    $separator = str_contains($next, '?') ? '&' : '?';

    header(
            'Location: ' . $next . $separator . 'token=' . urlencode($token)
    );

    exit;
}

?>

<h2>Secure Continue</h2>

<p>
    Your request has been verified.
</p>

<p>
    You will be redirected to your destination.
</p>

<form method="GET">

    <input
            type="hidden"
            name="next"
            value="<?= htmlspecialchars($next) ?>"
    >

    <button
            type="submit"
            name="continue"
            value="1"
    >
        Continue
    </button>

</form>