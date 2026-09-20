<?php

function get_first_query_param(string $name): ?string
{
    $query = $_SERVER['QUERY_STRING'] ?? '';

    foreach (explode('&', $query) as $part) {
        $pieces = explode('=', $part, 2);

        $key = urldecode($pieces[0]);

        if ($key !== $name) {
            continue;
        }

        return urldecode($pieces[1] ?? '');
    }

    return null;
}

$reports = [
        'public' => [
                'title' => 'Public Report',
                'content' => 'This report is available to everyone.'
        ],
        'internal' => [
                'title' => 'Internal Report',
                'content' => 'Internal company information.'
        ],
        'admin' => [
                'title' => 'Administrator Report',
                'content' => 'Password: something'
        ],
];

$checkedReport = get_first_query_param('report') ?? 'public';

if ($checkedReport !== 'public') {
    die('Access denied.');
}

$report = $_GET['report'] ?? 'public';

if (!isset($reports[$report])) {
    die('Report not found.');
}

?>

<h2><?= htmlspecialchars($reports[$report]['title']) ?></h2>

<p>
    <?= htmlspecialchars($reports[$report]['content']) ?>
</p>

<hr>

<p>
    Security validation: passed.
</p>