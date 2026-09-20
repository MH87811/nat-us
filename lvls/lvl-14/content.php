<?php

$users = [
        1 => [
                'username' => 'admin',
                'role' => 'administrator',
                'email' => 'admin@example.com',
                'secret' => 'something'
        ],
        2 => [
                'username' => 'guest',
                'role' => 'user',
                'email' => 'guest@example.com',
                'secret' => 'nothing'
        ],
        3 => [
                'username' => 'alice',
                'role' => 'user',
                'email' => 'alice@example.com',
                'secret' => 'hidden'
        ]
];

$id = $_GET['id'] ?? 1;

if (!isset($users[$id])) {
    die('User not found.');
}

$user = $users[$id];

?>

<h2>User Profile</h2>

<p>
    <strong>ID:</strong>
    <?= htmlspecialchars((string) $id) ?>
</p>

<p>
    <strong>Username:</strong>
    <?= htmlspecialchars($user['username']) ?>
</p>

<p>
    <strong>Role:</strong>
    <?= htmlspecialchars($user['role']) ?>
</p>

<p>
    <strong>Email:</strong>
    <?= htmlspecialchars($user['email']) ?>
</p>

<p>
    <strong>Secret:</strong>
    <?= htmlspecialchars($user['secret']) ?>
</p>

<hr>

<a href="?id=1">User 1</a>
<a href="?id=2">User 2</a>
<a href="?id=3">User 3</a>