<?php

session_start();
/*
 * Starts a session, if there is one
 */

if (isset($_SESSION['name']) || isset($_COOKIE['testsite'])) {
    /*
     * If there is a valid session and there is a cookie named "testsite"
     */

    include('session.php');
    /*
     * Include session.php Page
     */
} 
else {
    /*
     * This happens when the user enters this page incorrectly
     * For example: Goes to the address bar and enters this page writing down
     * the link to this page directly and not from other page
     * (localhost/enter.php) This will trigger the next echo
     */

    echo "Access denied!";
}
?>