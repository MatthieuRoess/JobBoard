<?php
session_start(); // Start the session
session_destroy(); // Destroy the session data
header("Location: ./?action=defaut"); // Redirect the user to the home page
exit(); // Stop executing the script
?>
