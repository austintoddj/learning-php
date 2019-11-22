<?php

if (isset($_COOKIE['testsite'])) {
    /*
     * If there is a Cookie redirect to enter.php Page
     */
    header('Location: ./enter.php');
} else {

    echo"
<html> <!-- Start of html tag -->

<head> <!-- Start of head tag -->
</head> <!-- End of head -->

<body> <!-- Start of body tag -->

<h1><center>Welcome to CRUD control center</center></h1>
<!-- Creates a centered heading with a string -->
<center>Please login...</center>
<!-- Centered string -->


<div align='center'>
<!-- Creates a new centered division -->
    <form method='post' action='login.php'>
    <!-- Creates a form that on submit redirects to login.php -->
        <table border='1' width='25%'>
        <!-- Creates a table with a border of 1 and a width of 25% -->
            <tr> <!-- Creates a row in the table -->
                <td>Name: </td>
                <!-- Creates a cell with a string -->
                <td><input type='text' name='name' maxlength='15'/></td>
                <!-- Creates an input field with a maximum length of 15 -->
            </tr> <!-- End of the row -->
            <br /> <!-- A line break -->
            <tr> <!-- Creates a row in the table -->
                <td>Password: </td>
                <!-- Creates a cell with a string -->
                <td><input type='password' name='password' maxlength='15'/></td>
                <!-- Creates an input field with a maximum length of 15 -->
            </tr> <!-- End of the row -->
            <br /> <!-- A line break -->
            <tr> <!-- Creates a row in the table -->
                <td>Remember me?: </td>
                <!-- Creates a cell with a string -->
                <td><input type='checkbox' name='remember'/></td>
                <!-- Creates a checkbox for the remember me -->
            </tr> <!-- End of the row -->
            <br /> <!-- A line break -->
        </table> <!-- End of table -->
    <p><input type='submit' value='login' /><p>
    <!-- Creates a paragraph and a submit button -->
    </form> <!-- End of form -->
<a href='form.php'>Register?</a>
<!-- Creates a link to form.php Page that says Register? -->
</div> <!-- End of division -->

</body> <!-- End of body -->

</html>"; // End of html and end of echo 
}
?>