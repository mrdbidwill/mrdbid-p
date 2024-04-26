<?php
 
 /*
 
 7-15-17
 But, for my needs, if I simply compare the last vote to this vote - if they are the same - do not run any change function - only display discussion vote form as is
 
 
 from https://stackoverflow.com/questions/5690541/best-way-to-avoid-the-submit-due-to-a-refresh-of-the-page    
Set a random number in a session when the form is displayed, and also put that number in a hidden field. If the posted number and the session number match, delete the session, run the query; if they don't, redisplay the form, and generate a new session number. This is the basic idea of XSRF tokens, you can read more about them, and their uses for security here: http://en.wikipedia.org/wiki/Cross-site_request_forgery

Here is an example:
*/


if (isset($_POST['formid']) && isset($_SESSION['formid']) && $_POST["formid"] == $_SESSION["formid"])
{
    $_SESSION["formid"] = '';
    echo 'Process form';
}
else
{
    $_SESSION["formid"] = md5(rand(0,10000000));
?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="formid" value="<?php echo htmlspecialchars($_SESSION["formid"]); ?>" />
    <input type="submit" name="submit" />
</form>
<?php } ?>

