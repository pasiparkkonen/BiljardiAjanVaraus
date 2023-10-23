document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault();

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Send a request to the PHP script for login
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "check_login.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            alert(response);
            if (response === "success") {
                // User exists, redirect to ajavaraus.php
                window.location.href = "ajavaraus.php";
            } else {
                // User does not exist, redirect to registration.php
                window.location.href = "registeration.php";
            }
        }
    };

    var data = "username=" + username + "&password=" + password;
    xhr.send(data);
});