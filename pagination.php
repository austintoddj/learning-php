
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

$per_page = 6;
$pages_query = mysql_query("SELECT COUNT('id') FROM users");
/*
 * Queries the database to return the number of users in it
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
while ($query_row = mysql_fetch_assoc($query)) {
    /*
     * While there is information coming from the database
     */
    echo '<p>', $query_row['name'], '</p>';
    /*
     * Creates a paragraph with the name of the user
     */
}

$prev = $page - 1;
$next = $page + 1;

if (!($page <= 1)) {
    /*
     * If the user's current page is lower or equal to 1
     */
    echo "<a href='pagination.php?page=$prev'>Prev</a> ";
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
        echo ($x == $page) ? '<strong><a href="?page=' . $x . '">' . $x . '</a></strong> ' : '<a href="?page=' . $x . '">' . $x . '</a> ';
        /*
         * Creates links for all pages, putting the current page in bold
         */
    }
}

if (!($page >= $pages)) {
    /*
     * If the current page is not the last one
     */
    echo "<a href='pagination.php?page=$next'>Next</a>";
    /*
     * Create a link for the next page
     */
}
?>