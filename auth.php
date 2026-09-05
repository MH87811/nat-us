<?php

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$lvl = $_POST['lvl'] ?? '';

$valid_credentials = [
    '1' => ['username' => 'user', 'password' => 'pass'],
    '2' => ['username' => 'user', 'password' => 'pass'],
    '3' => ['username' => 'user', 'password' => 'pass'],
    '4' => ['username' => 'user', 'password' => 'pass'],
    '5' => ['username' => 'user', 'password' => 'pass'],
    '6' => ['username' => 'user', 'password' => 'pass'],
    '7' => ['username' => 'user', 'password' => 'pass'],
    '8' => ['username' => 'user', 'password' => 'pass'],
    '9' => ['username' => 'user', 'password' => 'pass'],
    '10' => ['username' => 'user', 'password' => 'pass'],
    '11' => ['username' => 'user', 'password' => 'pass'],
    '12' => ['username' => 'user', 'password' => 'pass'],
    '13' => ['username' => 'user', 'password' => 'pass'],
    '14' => ['username' => 'user', 'password' => 'pass'],
    '15' => ['username' => 'user', 'password' => 'pass'],
    '16' => ['username' => 'user', 'password' => 'pass'],
    '17' => ['username' => 'user', 'password' => 'pass'],
    '18' => ['username' => 'user', 'password' => 'pass'],
    '19' => ['username' => 'user', 'password' => 'pass'],
    '20' => ['username' => 'user', 'password' => 'pass'],
    '21' => ['username' => 'user', 'password' => 'pass'],
    '22' => ['username' => 'user', 'password' => 'pass'],
    '23' => ['username' => 'user', 'password' => 'pass'],
    '24' => ['username' => 'user', 'password' => 'pass'],
    '25' => ['username' => 'user', 'password' => 'pass'],
    '26' => ['username' => 'user', 'password' => 'pass'],
    '27' => ['username' => 'user', 'password' => 'pass'],
    '28' => ['username' => 'user', 'password' => 'pass'],
    '29' => ['username' => 'user', 'password' => 'pass'],
    '30' => ['username' => 'user', 'password' => 'pass'],
];

if (!isset($valid_credentials[$lvl])) {
    http_response_code(404);
    echo 'Level not found.';
    exit;
}

$USERNAME_CORRECT = $valid_credentials["$lvl"]['username'];
$PASSWORD_CORRECT = $valid_credentials["$lvl"]['password'];

if ($username === $USERNAME_CORRECT && $password === $PASSWORD_CORRECT) {
    http_response_code(200);
    include __DIR__. "/lvls/lvl-$lvl/content.php";
} else {
    http_response_code(401);
    echo '<div class="error-container">
            <h1>401 Unauthorized</h1>
            <p>نام کاربری یا رمز عبور اشتباه است. دسترسی شما تایید نشد.</p>
          </div>';
}
?>