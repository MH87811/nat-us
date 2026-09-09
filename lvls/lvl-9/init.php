<?php

$db = new SQLite3(__DIR__ . '/db.sqlite3');

$db->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL,
        role TEXT NOT NULL,
        password TEXT NOT NULL
    )
");

$db->exec("
    INSERT INTO users (username, role, password)
    VALUES ('alice', 'user', 'alice-pass')
");

$db->exec("
    INSERT INTO users (username, role, password)
    VALUES ('bob', 'user', 'bob-pass')
");

$db->exec("
    INSERT INTO users (username, role, password)
    VALUES ('admin', 'admin', 'something')
");

echo "Database initialized.";