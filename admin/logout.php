<?php
session_start();

$_SESSION['users'];

session_destroy();

header('location: index.php');

?>