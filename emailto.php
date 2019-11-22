
<form method="post" action="">
    <!-- Creates a form, but not a conventional one. It is only used to store 
        the information. The action attribute of the form is empty meaning 
        it will not be delivered to another page for further processing of the 
        form. Instead of that, in PHP, we check the submit variable, and if its 
        set, we get the info, and send the email. -->
    <table border="1" width="25%">
        <!-- Creates a table with a border of 1 and a width of 25% -->
        <tr> <!-- Creates a row in the table -->
            <td width="10">To:</td>
            <!-- Creates a cell with a width of 10% and a string -->
            <td><input type="text" name="to" size="20" value="<?php echo $_REQUEST['emails']; ?>"></td>
            <!-- Creates an input field named TO that is already filled with 
                the email sent from the other page -->
        </tr> <!-- End of the row -->
        <tr> <!-- Creates a row in the table -->
            <td width="10">Subject:</td>
            <!-- Creates a cell with a width of 10% and a string -->
            <td><input type="text" name="subject" size="20"></td>
            <!-- Creates an input field named Subject of the email to be sent -->
        </tr> <!-- End of the row -->
        <tr> <!-- Creates a row in the table -->
            <td width="10">Message:</td>
            <!-- Creates a cell with a width of 10% and a string -->
            <td><textarea name="message" cols="30" rows="3"></textarea></td>
            <!-- Creates an text area named message with 3 rows and 30 columns
                so the User can write the email -->
        </tr> <!-- End of the row -->
    </table> <!-- End of table -->
    <p><input type="submit" name="submit" value="send email"><p>
        <!-- Creates a paragraph and a submit button that says Send Email -->
</form> <!-- End of form -->

<?php
if (isset($_REQUEST['submit'])) {
    /*
     * Like said before, this form works a little differently.
     * When the user presses the submit button, it enters in this part of the code
     */

    $to = $_REQUEST['to'];
    $subject = $_REQUEST['subject'];
    $body = $_REQUEST['message'];
    $from = "admin@onclicktutorials.com";
    $headers = "From: $from";
    /*
     * Gathers all the info from the form above.
     */

    if ($to && $subject && $body) {
        /*
         * If all the fields are filled
         */

        mail($to, $subject, $body, $headers);
        /*
         * Calls the function mail() from the php library
         * For more information: http://www.php.net/manual/en/function.mail.php
         */
        echo "Your email has been sent!";
        /*
         * Warns the user that everything went smoothly
         */
        header("Refresh:5; url=update.php");
        /*
         * Redirects the user to update.php Page in 5 seconds
         */
    } // End of if (Fields Filled)
    else {
        /*
         * If the user didn't filled out all the fields
         */
        echo "Please fill up all fields!";
    } // End of else
} // End of if (Submit Button Pressed)
?>