
<?php
session_start();
/*
 * Start the session, if there is one
 */
$expire = time()-86400;
setcookie('testsite', $_SESSION['name'], $expire);
/*
 * Changes the time of the cookie to be negative or 0 
 */
session_destroy();
/*
 * Destroys the User's session
 */
echo "Session destroyed!";
header("Refresh:1; url=home.php");
/*
 * After 1 second, redirects the user to home.php Page
 */
?>