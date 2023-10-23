document.addEventListener("DOMContentLoaded", function() {
    // Find all menu links with the a
    const menuLinks = document.querySelectorAll("a");

    // Add a click event listener to each menu link
    menuLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            if("1" === link.getAttribute('href')){
                fetch('logout.php', {
                    method: 'POST', // or 'GET' depending on your server's configuration
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    // Include any additional data needed for the logout process
                    // body: 'param1=value1&param2=value2',
                })
                .then(response => response.text())
                .then(data => {
                    // Handle the response from the server
                    console.log(data); // You can perform actions based on the response
                    // For example, you can redirect the user to a logout confirmation page
                    if (data === 'logout_successful') {
                        window.location.href = 'index.php';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
                //window.location.href = 'index.php';
            }
        });
    });
});