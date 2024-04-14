<?php
session_start();
session_destroy();
if (isset($_SESSION['admin'])) {
	unset($_SESSION['admin']);

	header("Location:http//localhost/HMS/index.php");
	exit();

}

?>