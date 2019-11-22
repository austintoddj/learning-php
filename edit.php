<html> <!-- Start of html tag -->
    <head> <!-- Start of head tag -->
    </head> <!-- End of head tag -->

    <body> <!-- Start of body tag -->

        <h3>Edit User: <?php echo base64_decode($_REQUEST['names']); ?></h3>
        <!-- Creates a heading -->

        <form ENCTYPE="multipart/form-data" method="POST" action="change.php">
            <!-- Creates a form with a content type of "multipart/form-data" that
                on submit, goes to change.php Page -->
            <table border="1" width="60%">
                <!-- Creates a table with a border of 1 and a width of 60 % -->

                <tr> <!-- Creates a row in the table -->
                    <td width="30%">Name: </td>
                    <!-- Creates a cell with a width of 30% and a string -->
                    <td><input type="text" name="newname" value="<?php echo base64_decode($_REQUEST['names']); ?>"> </td>
                    <!-- Creates a input field that show the name of the User -->
                </tr> <!-- End of the row -->

                <tr> <!-- Creates a row in the table -->
                    <td width="30%">Email: </td>
                    <!-- Creates a cell with a width of 30% and a string -->
                    <td><input type="text" name="newemail" value="<?php echo base64_decode($_REQUEST['emails']); ?>"> </td>
                    <!-- Creates a input field that show the email of the User -->
                </tr> <!-- End of the row -->

                <tr> <!-- Creates a row in the table -->
                    <td width="30%">New Password: </td>
                    <td><input type="password" name="newpassword" value=""> </td>
                    <!-- Creates a input field for the new password of the User -->
                </tr> <!-- End of the row -->
            </table> <!-- End of table -->
            <p>Change picture:<input type='file' name='newupload' /><p>
                <!-- Creates a paragraph and a input field to upload a new picture -->

                <input type="submit" name="submit" value="Save & Update" />
                <!-- Creates a submit button that says "Save & Update" -->
                <input type="hidden" name="id" value="<?php echo base64_decode($_REQUEST['ids']); ?>">
                <!-- Creates an hidden attribute identified by id that stores 
                    the user's id -->
        </form> <!-- End of form -->
    </body> <!-- End of body -->
</html> <!-- End of html -->


<?php include('links.php'); ?>
<!-- Include links.php Page -->


