
<html> <!-- Start of html tag -->
    <head> <!-- Start of head tag -->
    </head> <!-- End of head tag -->

    <body> <!-- Start of body tag -->
        <h2>Register Form</h2>
        <!-- Creates a heading with a string -->
        <form ENCTYPE="multipart/form-data" method="post" action="insert.php">
            <!-- Creates a form with a content type of "multipart/form-data" and
                when submit button is pressed, redirects to insert.php Page -->
            <table border="0" width="60%">
                <!-- Creates a table with a border of 0 and a width of 60% -->
                <tr> <!-- Creates a row in the table -->
                    <td width="10%">Name: </td>
                    <!-- Creates a cell with a width of 10% and a string -->
                    <td><input type="text" name="name" maxlength="15"/></td>
                    <!-- Creates an input field with a maximum length of 15 -->
                </tr> <!-- End of the row -->
                <br /> <!-- A line break -->
                <tr> <!-- Creates a row in the table -->
                    <td width="10%">Email: </td>
                    <!-- Creates a cell with a width of 10% and a string -->
                    <td><input type="text" name="email" maxlength="30"/></td>
                    <!-- Creates an input field with a maximum length of 30 -->
                </tr> <!-- End of the row -->
                <br /> <!-- A line break -->
                <tr> <!-- Creates a row in the table -->
                    <td width="10%">Password: </td>
                    <!-- Creates a cell with a width of 10% and a string -->
                    <td><input type="password" name="password" maxlength="15"/></td>
                    <!-- Creates an input field with a maximum length of 15 -->
                </tr> <!-- End of the row -->
                <br /> <!-- A line break -->
                <tr> <!-- Creates a row in the table -->
                    <td width="10%">Confirm Password: </td>
                    <!-- Creates a cell with a width of 10% and a string -->
                    <td><input type="password" name="cpassword" maxlength="15"/></td>
                    <!-- Creates an input field with a maximum length of 15 -->
                </tr> <!-- End of the row -->
                <input type="hidden" name="MAX_FILE_SIZE" value="10000">
            </table> <!-- End of table -->
            <p>Choose your picture:<input type="file" name="upload">
                <!-- Creates a paragraph and a input field to upload a file -->
            <p><input type="submit" name="submit" value="register" /><br />
                <!-- Creates a paragraph and a submit button that says Register -->
        </form> <!-- End of form -->
    </body> <!-- End of body -->
</html> <!-- End of html -->