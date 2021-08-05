<?php
session_start();
// Destroy variables SESSION
$_SESSION = array();
// DESTROY SESSION
session_destroy();
header("Location: index.php");
