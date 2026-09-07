<?php

$page = $_GET['page'];
include __DIR__.'/pages/'.$page;

?>
<hr>

<a href="?page=home.php">Home</a>
<a href="?page=about.php">About</a>
