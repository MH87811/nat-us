<script>

    const usernameInput = prompt("username:");
    const passwordInput = prompt("password:");

    const contentDiv = document.getElementById("content");

    const lvl = <?= json_encode($lvl) ?>

    // if (!match) {
    //     throw new Error("Invalid level");
    // }
    //
    // const lvl = match[1];

    fetch('/auth', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            username: usernameInput,
            password: passwordInput,
            lvl: lvl
        })
    })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => {
                    throw new Error(text);
                });
            }

            return response.text();
        })
        .then(data => {
            contentDiv.innerHTML = data;
        })
        .catch(error => {
            contentDiv.innerHTML = error.message;
        });

</script>