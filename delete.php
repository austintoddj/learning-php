
<?php

session_start();
/*
 * Starts the session if there is one
 */
if (!isset($_SESSION['name'])) {
    /*
     * If does not exist a valid session
     */
    echo "Access denied!";
} else {
    /*
     * If there is a valid session
     */
    include("session.php");
    echo "<h3>Choose an ID to delete:</h3><p>";
    /*
     * Prints a heading in html
     */

    mysql_connect("localhost", "root", "") or die("problem with connection...");    /*
     * Connects to the localhost database with the user root and blank
     * password, if it doesn't, stops the execution of the program 
     * returning "Problems with connection!"
     */

    mysql_select_db("testsite");
    /*
     * After the connection is up, select the database to operate on
     */

    $per_page = 6;
    $pages_query = mysql_query("SELECT COUNT('id') FROM users");
    /*
     * Creates a query to count all the users in the database
     */
    $pages = ceil(mysql_result($pages_query, 0) / $per_page);
    /*
     * $pages will receive the number of pages required to show all the users,
     * using $per_page number of users per page
     * So, the result query (number total of users) dividing by users per page
     * variable will result in the number of pages required to show all the users
     * ceil() method will round up, giving an integer
     */

    $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
    /*
     * If variable "page" form GET is set, use it
     * If not, set it as 1
     */
    $start = ($page - 1) * $per_page;
    /*
     * $start is the index that will define in the database which users will be 
     * showing up. For example, if the User is on page 3, and we show 6 users per 
     * page, then (3-1)*6 = 12
     */

    $query = mysql_query("SELECT * FROM users LIMIT $start, $per_page");
    /*
     * Using the $start variable, this is a query to the database, selecting the
     * users, from $start until $start + %per_page
     * Using the example above, $start = 12, the query will be:
     * SELECT * FROM users LIMIT 12, 18
     * It will return the users with and id between 12 and 18, 6 users
     */

    echo "<table width=\"90%\" align=center border=2>";
    /*
     * Creation of a centered table with width of 90% and a border of 2
     */
    echo "<tr>
            <td width=\"40%\" align=center bgcolor=\"FFFF00\">ID</td>
            <td width=\"40%\" align=center bgcolor=\"FFFF00\">NAME</td>
            <td width=\"40%\" align=center bgcolor=\"FFFF00\">EMAIL</td>
            <td width=\"40%\" align=center bgcolor=\"FFFF00\">PASSWORD</td>
          <tr>";
    /*
     * The echo above, will define the first row of the table with ID, NAME ,
     * EMAIL and PASSWORD
     */

    while ($row = mysql_fetch_assoc($query)) {
        /*
         * A while loop: while there is users returning from the query
         */

        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        /*
         * Save the user's information returned from the database
         */

        echo "<tr>
                <td align=center><a href=\"delete1.php?ids=$id&names=$name&emails=$email&passwords=$password\">$id</a></td>
                <td>$name</td>
                <td>$email</td>
                <td>$password</td>
              </tr>";
        /*
         * The echo above, will create each row, for each user, showing the ID, 
         * NAME, EMAIL and PASSWORD and creating a link on the ID, used to delete
         * that user
         */
    } // End of while loop
    echo "</table>";
    /*
     * End of the table
     */

    /*
     * The next lines of code, will produce the pagination at the end of the 
     * table, giving the possibility to the User to surf every page
     */
    $prev = $page - 1;
    $next = $page + 1;

    echo "<center>";
    /*
     * Centering the text
     */

    if (!($page <= 1)) {
        /*
         * If the page number is not less or equal than 1
         * Meaning there is a lower page that the one the User's on
         */
        echo "<a href='delete.php?page=$prev'>Prev</a> ";
        /*
         * Create a link for the previous page
         */
    }

    if ($pages >= 1 && $page <= $pages) {
        /*
         * If the number of pages is bigger or equal to one and the page the User
         * is on is lower or equal than the number or pages
         */

        for ($x = 1; $x <= $pages; $x++) {
            /*
             * This for will create a link for each page. For example, there is 
             * 5 pages ($pages = 5). The variable x will increase from 1 to 5
             */
            echo ($x == $page) ? '<strong><a href="?page=' . $x . '">' . $x . '</a></strong> ' : '<a href="?page=' . $x . '">' . $x . '</a> ';
            /*
             * For each value of $x, create a link to pageX, and if $x is the page
             * the User's on, then the link will be in Bold
             */
        } // End of for loop
    } // End of if

    if (!($page >= $pages)) {
        /*
         * If the page number the User's on isn't bigger or equal the number of 
         * total pages, then creates a Next Page link.
         */
        echo "<a href='delete.php?page=$next'>Next</a>";
    }

    echo "</center>";
    /*
     * Closes the center tag
     */

    mysql_close();
    /*
     * Closes the connection to the database
     */
}
?>