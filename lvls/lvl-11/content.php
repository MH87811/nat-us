<?php

$host = $_GET['host'];

if (preg_match('/[;&|]/', $host)) {
    die('Input rejected');
}

if ($host !== null && $host !== '') {
    $command = "ping -c 1 " . $host;
    $output = shell_exec($command);
}

?>

<h2>Host Check</h2>
<form method="GET">
    <input type="text" name="host" placeholder="127.0.0.1">
    <input type="submit">
</form>
<div style="background: black; width: 60%">
    <?php if (isset($output)): ?>
        <pre style="color: white; padding: 2%"><?= htmlspecialchars($output) ?></pre>
    <?php endif; ?>
</div>