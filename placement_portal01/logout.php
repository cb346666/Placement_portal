<?php
session_start();
session_destroy();
header("location: landingpage.php");
exit();
?>
