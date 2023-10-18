const navigation = document.getElementById('navigation');
const links = navigation.getElementsByTagName('a');

for (let i = 0; i < links.length; i++) {
    links[i].addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default link behavior
        // Add your navigation code here, e.g., show/hide content
		// Get the href attribute of the clicked link
        const linkHref = links[i].getAttribute('href');
		//const linkText = links[i].textContent.trim();
        // Add your navigation code here, e.g., show/hide content or navigate to the clicked link
        if (linkHref === 'Billboard') {
            // Redirect to the billboard.php page
            window.location.href = 'https://localhost/demo/billboard.html';
        }
    });
}