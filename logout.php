<?php
// Start or resume the session
session_start();

// Perform logout actions (e.g., destroying the session)
session_destroy();

// Send a response back to JavaScript
echo 'logout_successful';
?>