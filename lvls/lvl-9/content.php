<?php

$db = new SQLite3(__DIR__ . '/database.sqlite');

$username = $_GET['username'] ?? '';

?>

    <h2>User Search</h2>

    <form method="GET">

        <label>
            Username:
            <input
                    type="text"
                    name="username"
                    value="<?= htmlspecialchars($username) ?>"
            >
        </label>

        <button type="submit">
            Search
        </button>

    </form>

<?php

if ($username !== '') {

    $query = "SELECT username, role FROM users WHERE username = '$username'";

    $result = $db->query($query);

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {

        echo '<p>';
        echo 'Username: ' . htmlspecialchars($row['username']);
        echo '<br>';
        echo 'Role: ' . htmlspecialchars($row['role']);
        echo '</p>';

        if ($row['role'] === 'admin') {
            echo '<strong>Password: something</strong>';
        }
    }
}

?>