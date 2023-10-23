document.addEventListener("DOMContentLoaded", function() {
    // Find all menu links with the a
    const menuLinks = document.querySelectorAll("a");

    // Add a click event listener to each menu link
    menuLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            if("1" === link.getAttribute('href')){
                window.location.href = 'index.php';
            }
            else if("2" === link.getAttribute('href')) {
                window.location.href = 'tietoa.php';
            }
            else if("3" === link.getAttribute('href')) {
                window.location.href = 'yhteytta.php';
            }
            else if("4" === link.getAttribute('href')) {
                window.location.href = 'ajanvaraus.php';
            }
            else if("5" === link.getAttribute('href')) {
                window.location.href = 'login.php';
            }
            else {
                window.location.href = 'index.php';
            }
        });
    });
});
