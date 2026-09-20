<?php

$users = [
        1001 => [
                'username' => 'guest',
                'role' => 'user',
        ],
        1002 => [
                'username' => 'alice',
                'role' => 'user',
        ],
        1003 => [
                'username' => 'admin',
                'role' => 'administrator',
                'secret' => 'something',
        ],
];

function create_session_token(int $userId): string
{
    $timestamp = time();

    $session = $userId . ':' . $timestamp;

    return base64_encode($session);
}

function get_session_data(string $token): ?array
{
    $decoded = base64_decode($token, true);

    if ($decoded === false) {
        return null;
    }

    $parts = explode(':', $decoded, 2);

    if (count($parts) !== 2) {
        return null;
    }

    return [
            'user_id' => (int) $parts[0],
            'created_at' => (int) $parts[1],
    ];
}

if (!isset($_COOKIE['session'])) {
    $token = create_session_token(1001);

    setcookie('session', $token);

    $session = [
            'user_id' => 1001,
            'created_at' => time(),
    ];
} else {
    $session = get_session_data($_COOKIE['session']);
}

$user = null;

if ($session !== null) {
    $user = $users[$session['user_id']] ?? null;
}

?>

    <h2>Account Dashboard</h2>

<?php if ($user === null): ?>

    <p>Invalid session.</p>

<?php else: ?>

    <p>
        Welcome,
        <?= htmlspecialchars($user['username']) ?>
    </p>

    <p>
        Role:
        <?= htmlspecialchars($user['role']) ?>
    </p>

    <?php if (isset($user['secret'])): ?>

        <p>
            Secret:
            <?= htmlspecialchars($user['secret']) ?>
        </p>

    <?php endif; ?>

<?php endif; ?>