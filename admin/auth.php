<?php

session_start();
// check if user is authorized
if ($_SESSION['role'] != 'admin') {
	header('Location: /index.php');
	exit;
}
?>