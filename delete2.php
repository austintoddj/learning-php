<?php

mysql_connect("localhost", "root", "") or die("Problems with connection!");
/*
 * Connects to the localhost database with the user root and blank
 * password, if it doesn't, stops the execution of the program 
 * returning "Problems with connection!"
 */

mysql_select_db("testsite");
/*
 * After the connection is up, select the database to operate on
 */

$result = mysql_query("DELETE FROM users WHERE id='" . $_REQUEST['id'] . "'");
/*
 * Queries the database to delete the user with the ID given from the last page
 */

echo "The user has been deleted succesfully!";
/*
 * Warns the User that it was deleted sucessfully
 */

mysql_close();
/*
 * Closes the connection to the database
 */

include('links.php');
/*
 * Includes the links.php page
 */
?>