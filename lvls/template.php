<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>
        Level <?= htmlspecialchars($lvl) ?>
    </title>
</head>

<body>

<h1>
    Level <?= htmlspecialchars($lvl) ?>
</h1>

<div id="content">
    <?php include __DIR__ . '/auth_form.php'; ?>
</div>

</body>

</html>