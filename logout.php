<?php
session_start();
session_destroy();
echo"<h3>You were successfully logged out</h3>";
echo"<h3>Click here to <a href='HSlogin.php'>login again</a</h3>";

?>