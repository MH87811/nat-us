<script>

    const usernameInput = prompt("username:");
    const passwordInput = prompt("password:");

    const contentDiv = document.getElementById("content");

    const lvl = <?= json_encode($lvl) ?>;

    fetch('/auth' + window.location.search, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            username: usernameInput,
            password: passwordInput,
            lvl: lvl
        })
    }).then(response => {
        if (!response.ok) {
            return response.text().then(text => {
                throw new Error(text);
            });
        }

        return response.text();
    }).then(data => {
        contentDiv.innerHTML = data;

        contentDiv.querySelectorAll('script').forEach(script => {
            const newScript = document.createElement('script');

            if (script.src) {
                newScript.src = script.src;
            } else {
                newScript.textContent = script.textContent;
            }

            document.body.appendChild(newScript);
        });

    }).catch(error => {
        contentDiv.innerHTML = error.message;
    });

</script>