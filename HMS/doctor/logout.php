<?php
session_start();


if (isset($_SESSION['doctor'])) {

	unset($_SESSION['doctor']);

	header('Location: http//localhost/HMS/index.php');
	exit();

}

?>