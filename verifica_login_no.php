<?php
session_start();
if($_SESSION) {
	header('Location: home.php');
	exit();
}
?>