<?php
session_start();
/*
 * Start session
 */
include("session.php");
/*
 * Includes the session.php Page 
 */
?>
<html> <!--  Start of html tag -->
    <head> <!-- Start of head tag -->
    </head> <!-- End of head -->

    <body> <!-- Start of body -->
    <center> <!-- Center everything until it is closed -->
        <form method="GET" action="search.php">
            <!-- Creates a form with GET that on submit goes to search.php Page -->

            <input type="text" name="search">
            <!-- Creates an input field -->
            <input type="submit" name="submit" value="search database">
            <!-- Creates a submit button that says search database -->

        </form> <!-- End of form -->
    </center> <!-- End of center -->
    <hr /> <!-- A thematic break line (https://en.wikipedia.org/wiki/Help:HTML_in_wikitext#hr) -->
    <u>Results:</u>&nbsp
    <!-- Creates an underlined word -->

    <?php
    if (!isset($_SESSION['name'])) {
        /*
         * If there isn't a valid session
         */

        echo "Access denied!";
    } else {

        if (isset($_REQUEST['submit']) || isset($_GET['page'])) {
            /*
             * If there is a submit or the variable page is set
             */

            $search = $_GET['search'];
            /*
             * Gets the information on the search input field
             */
            $terms = explode(" ", $search);
            /*
             * Separates the terms of the search field
             * Example : Search: Victor Bastos
             * Returns: ["Victor","Bastos"]
             */
            $query = "SELECT * FROM users WHERE ";
            /*
             * Constructs a query for the database
             */

            $i = 0;
            foreach ($terms as $each) {
                /*
                 * A foreach loop that stores each terms in $each
                 */
                $i++;
                if ($i == 1) {
                    /*
                     * If its the first term
                     */
                    $query .= "concat_ws('',name,email) LIKE '%$each%' ";
                    /*
                     * Concatenate the string for the query
                     */
                } else {
                    $query .= "OR concat_ws('',name,email) LIKE '%$each%' ";
                    /*
                     * Concatenate the string for the query
                     */
                }
            }

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
            $returnQuery = mysql_query($query);
            /*
             * Queries the database with the query constructed above
             */
            $num = mysql_num_rows($returnQuery);
            /*
             * Gets the number of rows returned by the query
             */

            if ($num > 0 && $search != "") {
                /*
                 * If there is something returned and the search input field is 
                 * not empty
                 */

                echo "$num result(s) found for <b>$search</b>!";
                /*
                 * Shows the User how many results were found
                 */
                $per_page = 3;
                $pages_query = $num;
                /*
                 * Queries the database to return the number of users in it
                 */
                $pages = ceil($pages_query / $per_page);
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
                echo "<table width=\"90%\" align=center border=2>";
                /*
                 * Creates a centered table with a border of 2 and a width of 90%
                 */
                echo "  <tr>
                <td width=\"40%\" align=center bgcolor=\"FFFF00\">ID</td>
                <td width=\"40%\" align=center bgcolor=\"FFFF00\">NAME</td>
                <td width=\"40%\" align=center bgcolor=\"FFFF00\">EMAIL</td>
            </tr>";
                /*
                 * The lines above create the first row of the table
                 */

                $newQuery = $query . "LIMIT $start, $per_page";

                $resultSet = mysql_query($newQuery);

                while ($row = mysql_fetch_assoc($resultSet)) {
                    /*
                     * While there is information from the database
                     */

                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    /*
                     * Gets the information given by the database
                     */

                    echo "  <tr>
                    <td align=center>$id</td>
                    <td>$name</td>
                    <td><a href=\"emailto.php?emails=$email\">$email</a></td>
                </tr>";
                    /*
                     * The lines above create the remaining table with a link on each User id
                     * so it can be edited
                     */
                } echo "</table>";
                /*
                 * End of the table
                 */

                $prev = $page - 1;
                $next = $page + 1;

                echo "<center>";
                /*
                 * The next html code will be centered until the closing tag
                 */

                if (!($page <= 1)) {
                    /*
                     * If the user's current page is lower or equal to 1
                     */
                    echo "<a href='search.php?search=".$search."&page=$prev'>Prev</a> ";
                    /*
                     * Creates a previous page link
                     */
                }

                if ($pages >= 1 && $page <= $pages) {
                    /*
                     * If there is more than one page to be shown and the current user page 
                     * is less than the number of total pages
                     */

                    for ($x = 1; $x <= $pages; $x++) {
                        echo ($x == $page) ? '<strong><a href="?search='.$search.'&page=' . $x . '">' . $x . '</a></strong> ' : '<a href="?search='.$search.'&page=' . $x . '">' . $x . '</a> ';
                        /*
                         * Creates links for all pages, putting the current page in bold
                         */
                    }
                }

                if (!($page >= $pages)) {
                    /*
                     * If the current page is not the last one
                     */
                    echo "<a href='search.php?search=".$search."&page=$next'>Next</a>";
                    /*
                     * Create a link for the next page
                     */
                }
            } else {
                /*
                 * If there is no results
                 */
                echo "No results found!";
            }

            mysql_close();
            /*
             * Closes the connection to the database
             */
        } else {

            echo "Please type any word...";
        }
    }
    ?>

</body> <!-- End of body -->


</html> <!-- End of html -->