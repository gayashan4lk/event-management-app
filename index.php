<?php
session_start();
$mess="";

if(isset($_POST["submit"]) && $_POST["submit"]=="Sign In") {

	$link =mysql_connect("localhost","root","") or die("not connected");
	mysql_select_db("party_manage",$link) or die ("database not connected");
	$user=$_POST["user_name"];
	$password=$_POST["password"];
	$query = "SELECT * FROM customers WHERE un='$user' AND pw='$password'";
	$result=mysql_query($query,$link);
	
	while($row=mysql_fetch_array($result)) {
		$name=$row["0"];
	}
	
	if(mysql_affected_rows()==0) {
		$mess = "<font color=white size=4><b>Wrong username or password.<br>Please try again.</b></font>";
	}
	elseif($user=="admin"){
		$_SESSION["un"]=$name;
		header("location:admin.php");
	}
	else{
		$_SESSION["un"]=$name;
		header("Location:member.php");
		exit;
	}}
?>
<html>
<head>
    <title>Party Arrangement1 </title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <style type="text/css">
	#loginframe{margin-left: 250px;margin-right: 250px;font-size: 20px;font-weight: 200;border: solid;border-width: 2px;border-color: black;}
	.login{font-size: 20px;font-weight: bolder;}
    </style>
    <script type="text/javascript">
	if(document.signin.user_name.value=="admin" && document.signin.password.value=="admin"){
	    
	}
    </script>
</head>
<body><center>
<div id="top">
    <h1>SunRise<p><b><i>More than a party.</i></b></p></h1>
</div>
<div id="background">
    <div id="content">
	<table width="600" >
    	    <tr style="font-size: 25;" >
		<td align="center"><a href="index.php"><font color="#990000"><b>Home</b></font></a></td>
	    	<td align="center"><a href="services.html"><font color="black"><b>Services</b></font></a></td>
    		<td align="center"><a href="contact.html"><font color="black"><b>Contact</b></font></a></td>
		<td align="center"><a href="help.html"><font color="black"><b>Features</b></font></a></p></td>
	    </tr>
	</table>
            <p align="center"><h1 align="center"></br><br/>
	    <font size="15">Welcome!</font></h1></p><br/>
	    <strong>
		<p align="justify" style="margin-left: 50;margin-right: 50;"><font size="4px">Welcome to the official site of <i>SunRise</i> Online party arrangemet service,
	        the online Event Management & Party Organizing Company dedicated to offfering intelligent concepts & innovative ideas,Providig complete party organizing solution.</font>
	    </strong><br/><br/><br/><br/>
		<table align="center">
		    <tr>
		        <td><img src="images/imagesCA8UC75W.jpg" width="200" height="200" border="0"></td>
			<td><img src="images/kj.jpg" width="200" height="200" border="0"></td>
		        <td><img src="images/MC_PavillionTastingRoom.jpg" width="200" height=200" border="0"></td>
	            </tr>
		</table>
	        <br><br>
		<div id="loginframe">
		<form name="signin" method="post">
		    <table width="300" height="75px" border="0" cellpadding="4" cellspacing="0">
			<tr>
			    <td align="right">&nbsp;</td>
			    <td>&nbsp;</td>
			</tr>
			<tr>
			    <td width="95" align="right" class="login">User Name: </td>
			    <td width="140"><input name="user_name" type="text" size="16"/></td>
			</tr>
			<tr>
			    <td align="right" class="login">Password: &nbsp;</td>
			    <td><input name="password" type="password" size="16" /></td>
			</tr>
			<tr>
			    <td colspan="2" align="center"><input id="" type="submit" name="submit" value="Sign In"/></td>
			</tr>
			<tr>
			    <td colspan="2" align="center"><?php echo $mess."<br><br>";?></td>
			</tr>
			<tr>
			    <td colspan="2" align="right"><div align="center"><h4>Didn't register yet!<a href="registration.php" > Click Here </a> </h4> </div></td>
			</tr>
		    </table></form>
		</div>
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