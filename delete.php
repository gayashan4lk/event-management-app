<?php
        $id=$_GET["id"];
    	$link =mysql_connect("localhost","root","") or die("not connected");
	mysql_select_db("party_manage",$link) or die ("database not connected");
	$query = "DELETE FROM customers WHERE cust_id='$id'";
	$query1= "DELETE FROM cust_comment WHERE cust_id='$id'";
        mysql_query($query,$link)or die (mysql_error());	
        mysql_query($query1,$link)or die (mysql_error());
        header("location:admin.php");
?>
