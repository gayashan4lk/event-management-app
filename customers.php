<?php
if(isset($_POST["delete"])) {
	$link =mysql_connect("localhost","root","") or die("not connected");
	mysql_select_db("party_manage",$link) or die ("database not connected");
	$id=$_POST["cust_id"];
	$query = "DELETE FROM customers WHERE cust_id='$id'";
	$query1= "DELETE FROM cust_comment WHERE cust_id='$id'";
        mysql_query($query,$link)or die (mysql_error());	
        mysql_query($query1,$link)or die (mysql_error());	
	}
if(isset($_POST["update1"])) {
	$link =mysql_connect("localhost","root","") or die("not connected");
	mysql_select_db("party_manage",$link) or die ("database not connected");
	$id=$_POST["cust_id"];
	$email=$_POST["cust_email"];
	$query = "UPDATE customers SET cust_email='$email' WHERE cust_id='$id'";
        mysql_query($query,$link)or die (mysql_error());	
	}
if(isset($_POST["update2"])) {
	$link =mysql_connect("localhost","root","") or die("not connected");
	mysql_select_db("party_manage",$link) or die ("database not connected");
	$id=$_POST["cust_id"];
	$teloff=$_POST["cust_tel_off"];
	$query = "UPDATE customers SET cust_tel_off='$teloff' WHERE cust_id='$id'";
        mysql_query($query,$link)or die (mysql_error());}	
if(isset($_POST["update3"])) {
	$link =mysql_connect("localhost","root","") or die("not connected");
	mysql_select_db("party_manage",$link) or die ("database not connected");
	$id=$_POST["cust_id"];
	$telmob=$_POST["cust_tel_mob"];
	$query = "UPDATE customers SET cust_tel_mob='$telmob' WHERE cust_id='$id'";
        mysql_query($query,$link)or die (mysql_error());	
	}	?>
<html>
<head>
    <title>Party Arrangement </title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body><center>
<div id="top">
    <h1>SunRise<p>More than a party.</p></h1>
</div>
<div id="background">
    <div id="content">
	<table width="600" >
    	    <tr style="font-size: 25;" >
		<td align="center"><a href="index.php"><font color="black"><b>Home</b></font></a></td>
	    	<td align="center"><a href="services.html"><font color="black"><b>Services</b></font></a></td>
    		<td align="center"><a href="contact.html"><font color="black"><b>Contact</b></font></a></td>
		<td align="center"><a href="help.html"><font color="black"><b>Features</b></font></a></p></td>
	    </tr>
	</table>
	<br><br><br>
        <?php
	$linkz=mysql_connect ("localhost","root","") or die("Sorry Didnot");
	mysql_select_db("party_manage",$linkz) or die("No_DB_Found");
	$sql="select cust_id,cust_name,cust_add,cust_email,cust_tel_off,cust_tel_mob from customers";
	$result=mysql_query($sql,$linkz);
	echo "<table border=1 style=font-size:17;color:white;>";
	echo "<tr>";
	for($fld=0;$fld<mysql_num_fields($result);$fld++){
		echo "<th>";
		echo "&nbsp;&nbsp;&nbsp;".mysql_field_name($result,$fld);
		echo "</th>";
	}
	echo "</tr>";
	while ($row = mysql_fetch_assoc($result)) {
		echo "<tr>";
		foreach($row as $key => $value){
			echo "<td>".$row["$key"]."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	?>
	<br><br><br>
    <table><form name="delete" method="post" action="">
        <tr>
            <td>Enter Customer ID:</td>
            <td><input type="text" name="cust_id" size="3"></td>
            <td><input type="submit" name="delete" value="Delete"></td>
        </tr>
	 <tr>
	    <td>E-mail:</td>
	    <td><input name="cust_email" type="textbox" size="30"></td>
            <td><input type="submit" name="update1" value="Update"</td>
	</tr>  
	 <tr>
	    <td>Phone number(Office):</td>
	    <td><input name="cust_tel_off" type="textbox" size="10"></td>
	    <td><input type="submit" name="update2" value="Update"</td>

	</tr>  
	<tr>
	    <td>Phone Number(Mobile):</td>
	    <td><input name="cust_tel_mob" type="textbox" size="10"></td>
            <td><input type="submit" name="update3" value="Update"</td>
	 </tr>  
    </form></table>
    <p align="right" style="margin-top: 30px;" ><a href="admin.php" style="color: White;margin-right: 30px;">Back.</a><a href="output.php" style="color: White;margin-right: 30px;">FULL TABLE.</a></p>
    <p align="left" ></p>
    </div>
    <div id="footer">
	<hr /><br/>
	<p align=center>
	    <a href="index.php"><font color="black" size="4px">Home</font></a>&nbsp;&nbsp;
	    <a href="services.html"><font color="black" size="4px">Servics</font></a>&nbsp;&nbsp;
	    <a href="contact.html"><font color="black" size="4px">Contact</font></a>&nbsp;&nbsp;
	    <a href="help.html"><font color="black" size="4px">Features</font></a></p>&nbsp;&nbsp;
	<p align="right"><font size="3px">All rights reverved</font></p>
    </div>
</div>
</center></body>
</html>