<?php
	session_start();
	session_destroy();
	header('location:index.php?m=Su sesión ha expirado');
?>