<?php
session_start();
$mess="";
if(!isset($_SESSION["un"])){
 header("location:invalidemember.php");
 exit;
}
$user=$_SESSION["un"];
if(isset($_SESSION["a"])) {$msg=$_SESSION["a"];}
$link = mysql_connect("localhost","root","") or die("not connected");
mysql_select_db("party_manage") or die ("database not connected");
$sql6="select * from customers WHERE un='$user'";
$result6=mysql_query( $sql6) or die (mysql_error());
$u=mysql_fetch_assoc($result6);
$uid=$u["cust_id"];
if ($u["contact_method"]!=null && $u["cust_order"]!=null){
 $a=$u["contact_method"];
 $b=$u["cust_order"];}
if(isset($_POST["submit"])and isset($_POST["cust_order"]) and isset($_POST["contact_method"])and isset($_POST["explain"])){
    $order=$_POST["cust_order"];
    $cmethod=$_POST["contact_method"];
    $exp = $_POST["explain"];
    $sql = "UPDATE customers SET contact_method='$cmethod',cust_order='$order' WHERE un='$user'";
    mysql_query( $sql) or die (mysql_error());
    $sql4 = "insert into cust_comment(cust_com,cust_id) value ('$exp','$uid')";
    mysql_query( $sql4) or die (mysql_error());}
elseif(isset($_POST["submit"])){
    $c="Both Requirement and Preferd Contact Method must be selected";
}
$sql2="select ad_reply from cust_comment where cust_com_id=(select max(cust_com_id) from cust_comment where cust_id='$uid')";
$result=mysql_query( $sql2) or die (mysql_error());
$numofrows=mysql_num_rows($result);
if($numofrows!=0){
$admin = mysql_fetch_assoc($result);}
?>


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
	<p style="float: right;margin-right: 35;font-weight: bold;font-size:30 medium;color: white; background-color:yellow;"><a href="logout.php" style="color: red">Logout</a></p><p style="float: right;margin-right: 10;font-weight: bold;font-size: medium;color: green; background-color:yellow;">User:- <?php echo $user; ?></p><p style="float: right;margin-right: 70;font-weight: bold;font-size: medium;color: white;"><?php if(isset($msg)) {echo $msg;} ?></p><br/><br/>
	<h1 align="center">Member Area</h1><br/><?php if(isset($c)){ echo "<h4 style=color:red>".$c."</h4>";}?>
	<form name="requirement" method="post" action="">
	    <table style="font-size: 16;" width="750px" cellpadding="5">
		<tr>
		    <td width="250px">Select Your Requirement: </td>
		</tr>
		<tr>
		    <td></td>
		    <td><input name=cust_order type="radio"  value="Wedding party arrangement" <?php if(isset($b) && $b=="Wedding party arrangement"){echo "CHECKED";} ?>>Wedding party arrangement<br/>
			<input name=cust_order type="radio"  value="Birthday party arrangement" <?php if(isset($b) && $b=="Birthday party arrangement"){echo "CHECKED";} ?>>Birthday party arrangement<br/>
			<input name=cust_order type="radio"  value="Catering service" <?php if(isset($b) && $b=="Catering service"){echo "CHECKED";} ?>>Catering service<br/>
			<input name=cust_order type="radio" value="Light decoration service" <?php if(isset($b) && $b=="Light decoration service"){echo "CHECKED";} ?>>Light decorating service<br/>
			<input name=cust_order type="radio"  value="Floral Decorations for Events" <?php if(isset($b) && $b=="Floral Decorations for Events"){echo "CHECKED";} ?>>Floral Decorations for Events<br/>
			<input name=cust_order type="radio" value="Other" <?php if(isset($b) && $b=="Other"){echo "CHECKED";} ?>>Other<br/></td>
		</tr>
		<tr>
		    <td>Preferd Contact Method:</td>
		</tr>
		    <td></td>
		    <td><input name="contact_method" type="radio"  value="Telephone(Office)" <?php if(isset($a) && $a=="Telephone(Office)"){echo "CHECKED";} ?>>Telephone(Office)<br/>
			<input name="contact_method" type="radio"  value="Telephone(Mobile)" <?php if(isset($a) && $a=="Telephone(Mobile)"){echo "CHECKED";} ?>>Telephone(Mobile)<br/>
			<input name="contact_method" type="radio"  value="Email" <?php if(isset($a) && $a=="Email"){echo "CHECKED";} ?>>Email<br/></td>
		</tr>
		<tr>
		    <td>Administrator Reply</td>
		</tr>
		<tr>
		    <td width="250px"></td>
		    <td align="justify"><font color="#99000"><?php if(isset($admin)){ echo $admin["ad_reply"];} else {echo "You will get an administrator reply within 24hours.";}?></font></td>
		</tr>		
		<tr>
		    <td colspan="2">Brief Explanation About Requiremnet</td>
		</tr>
		<tr>
		    <td colspan="2"><center><textarea name="explain" rows="5" cols="70">Please write your comments here</textarea></center></td>
		</tr>
		<tr>
		    <td colspan="2"><center><input name="submit" type="submit" value="Send"></center></td>
		</tr>
	    </table>
	<br/><br/><br/>	<br/><br/><br/>
	<p>To update your profile or change your password <a href="update.php">click here</a>.</p>
    </div>
    <?php if(isset($_SESSION["a"])) {unset($_SESSION["a"]);} ?>
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