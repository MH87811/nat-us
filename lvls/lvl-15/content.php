<?php

$host = $_GET['host'] ?? '';

if ($host !== '') {
    $command = "ping -c 1 " . $host;

    shell_exec($command);

    $message = 'Host check completed.';
}

?>

    <h2>Host Checker</h2>

    <form method="GET">
        <label>
            Host:
            <input
                    type="text"
                    name="host"
                    value="<?= htmlspecialchars($host) ?>"
            >
        </label>

        <button type="submit">Check</button>
    </form>

<?php if (isset($message)): ?>
    <p><?= htmlspecialchars($message) ?></p>
<?php endif; ?>