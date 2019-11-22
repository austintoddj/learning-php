<?php

session_start();
/*
 * Start the session, if there is one
 */

if ($_POST) {
    /*
     * If this page was redirected as a submit of a form
     */

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['password'] = md5($_POST['password']);
    /*
     * Gets the information passed for this page
     */


    if ($_SESSION['name'] && $_SESSION['password']) {
        /*
         * If the fields were filled
         */

        mysql_connect("localhost", "root", "") or die("problem with connection...");        /*
         * Connects to the localhost database with the user root and blank
         * password, if it doesn't, stops the execution of the program 
         * returning "Problems with connection!"
         */
        mysql_select_db("testsite");
        /*
         * After the connection is up, select the database to operate on
         */

        $query = mysql_query("SELECT * FROM users WHERE name='" . $_SESSION['name'] . "'");
        /*
         * Queries the database to see if the user exists
         */
        $numrows = mysql_num_rows($query);
        /*
         * Gets the number of users with the name given
         */

        if ($numrows != 0) {
            /*
             * If there is a user with the name given
             */

            while ($row = mysql_fetch_assoc($query)) {
                /*
                 * While there is information from the database
                 */
                $dbname = $row['name'];
                $dbpassword = $row['password'];
                /*
                 * Saves the information from the database
                 */
            }
            if ($_SESSION['name'] == $dbname) {
                if ($_SESSION['password'] == $dbpassword) {
                    /*
                     * See if the information given from user matches the 
                     * information from the database
                     */

                    if (($_POST['remember']) == 'on') {
                        /*
                         * If the user checked the box of remember me
                         */
                        $expire = time() + 86400;
                        setcookie('testsite', $_POST['name'], $expire);
                        /*
                         * Extends the time of the cookie refered to the WebSite
                         */
                    }
                    header("location:enter.php");
                    /*
                     * Redirects to enter.php Page
                     */
                } else {
                    echo "Your password is incorrect!";
                }
            } else {
                echo "Your name is incorrect!";
            }
        } else {
            echo "This name is not registered!";
        }
    } else {
        echo "You have to type a name and password!";
    }
} else {

    echo "Access denied!";
    exit;
}
?>