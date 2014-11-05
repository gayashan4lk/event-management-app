<?php
    session_start();
	if(isset($_SESSION["un"]))  {
		unset($_SESSION["un"]);
                unset($_SESSION["a"]);
	}
	header("Location:index.php");
	exit;
?>
