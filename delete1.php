<?php
mysql_connect("localhost", "root", "") or die("problem with connection...");
/*
 * Connects to the localhost database with the user root and blank
 * password, if it doesn't, stops the execution of the program 
 * returning "Problems with connection!"
 */

mysql_select_db("testsite");
/*
 * After the connection is up, select the database to operate on
 */

$ids = $_REQUEST['ids'];
/*
 * Gets the id of the user to delete
 */

$result = mysql_query("SELECT * FROM users WHERE id='" . $ids . "'");
/*
 * Queries the database to return all the data from the user
 */

echo "<table width=\"90%\" align=center border=2>";
/*
 * Creates a centered table with a 90% width and a border of 2
 */
echo "<tr>
        <td width=\"40%\" align=center bgcolor=\"FFFF00\">ID</td>
        <td width=\"40%\" align=center bgcolor=\"FFFF00\">NAME</td>
        <td width=\"40%\" align=center bgcolor=\"FFFF00\">EMAIL</td>
        <td width=\"40%\" align=center bgcolor=\"FFFF00\">PASSWORD</td>
      </tr>";
/*
 * The lines above create a row in the table with 4 cells, containing respectively
 * ID, NAME, EMAIL and PASSWORD
 */

while ($row = mysql_fetch_array($result)) {
    /*
     * While there is data returning from the database
     */

    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];
    /*
     * Gets the info from the user
     */

    echo "<tr>
            <td align=center>$id</td>
            <td>$name</td>
            <td>$email</td>
            <td>$password</td>
          </tr>";
    /*
     * Prints out in the table the user information
     */
} // End of while loop
echo "</table>";
/*
 * End of table
 */

mysql_close();
/*
 * Closes the connection to the database
 */
?>

<form method="POST" action="delete2.php">
    <!-- Creates a form that on submit goes to delete2.php Page -->
    <p>Are you sure you want to delete this user?
        <input type="submit" name="submit" value="OK">
        <!-- Submit button -->
        <input type="hidden" name="id" value="<?php echo $_REQUEST['ids']; ?>">
        <!-- Creates an hidden input that saves the ID of the user to delete -->
</form>
<!-- End of the form -->

<?php include("links.php"); ?>
<!-- Includes the page links.php -->