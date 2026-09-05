<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script>
    const usernameInput = prompt("username:");
    const passwordInput = prompt("password:");

    const contentDiv = document.getElementById("content");

    fetch('/auth', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `username=${encodeURIComponent(usernameInput)}&password=${encodeURIComponent(passwordInput)}&lvl=22`
    })
        .then(response => {
            if (response.status === 401) {
                return response.text().then(text => { throw new Error(text); });
            }
            return response.text();
        })
        .then(data => {
            contentDiv.innerHTML = data;
        })
        .catch(error => {
            contentDiv.innerHTML = error.message || `
                <div class="error-container">
                    <h1>401 Unauthorized</h1>
                    <p>invalid credentials</p>
                </div>
            `;
        });
</script>
</body>
</html>