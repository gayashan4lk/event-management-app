<?php
    session_start();
    $user=$_SESSION["un"];
    if ($user=="admin"){ $full="Full Table";$loc="admin.php";}
    else {$loc="member.php";}
    $link = mysql_connect("localhost","root","") or die("not connected");
    mysql_select_db("party_manage") or die ("database not connected");
    $sql6="select * from customers WHERE un='$user'";
    $result6=mysql_query( $sql6) or die (mysql_error());
    $u=mysql_fetch_assoc($result6);
    $a=$u["cust_name"];
    $b=$u["cust_add"];
    $c=$u["cust_email"];
    $d=$u["cust_tel_off"];
    $e=$u["cust_tel_mob"];    
    $f=$u["pw"];    
?>
<html>
<head>
    <title>Party Arrangement </title>
    <script language="javascript">
	function validateForm(){
 		if(document.customers.cust_name.value==''){
       			alert("Name field must be filled out");
				return false;
		}
		if(document.customers.cust_add.value==''){
			alert("Address field must be filled out");
			return false;
		}
		if(document.customers.cust_email.value == ''){
       		alert("Enter your email address");
			return false;
		}
		if(document.customers.cust_tel_off.value==''){
        	alert("Enter your tel number");
			return false;
		}
		if(document.customers.cust_tel_mob.value==''){
       	 	alert("Enter your mobile number");
			return false;
		}
		if(document.customers.pw1.value!='<?php echo $f ?>'){
			alert("wrong password");
			return false;
		}
		if(document.customers.pw2.value!=document.customers.pw3.value){
			alert("Password Missmatch Retype your Password");
			return false;
		}
		return confirm("Do you want to Update?");
	}
    </script>
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
		<td align="center"><a href="index.php"><font color="#99000"><b>Home</b></font></a></td>
	    	<td align="center"><a href="services.html"><font color="black"><b>Services</b></font></a></td>
    		<td align="center"><a href="contact.html"><font color="black"><b>Contact</b></font></a></td>
		<td align="center"><a href="help.html"><font color="black"><b>Features</b></font></a></p></td>
	    </tr>
	</table><br/><br/><br/><br/><br/>
	<h1 align="center">Update Details</h1>
	    <form action="" method=post name="customers" onSubmit="return validateForm()">
		<table border=0 color="black" cellpadding="10" cellspacing="2" style="font-size: 20;">
		    <tr>
			<td>Name:</td>
			<td><input name="cust_name" type="textbox" size="30" value="<?php echo $a ?>"></td>
		    </tr>  
		    <tr>
			<td>Address:</td>
			<td><input name="cust_add" type="textbox" size="50" value="<?php echo $b ?>"></td>
		    </tr>  
		    <tr>
			<td>E-mail:</td>
			<td><input name="cust_email" type="textbox" size="30" value="<?php echo $c ?>"></td>
		    </tr>  
		    <tr>
			<td>Phone number(Office):</td>
			<td><input name="cust_tel_off" type="textbox" size="10" value="<?php echo $d ?>"></td>
		    </tr>  
		    <tr>
			<td>Phone Number(Mobile):</td>
			<td><input name="cust_tel_mob" type="textbox" size="10" value="<?php echo $e ?>"></td>
		    </tr>  
		    <tr>
			<td>Current Password:</td>
			<td><input name="pw1" type="password" size="20"/></td>
		    </tr>
		    <tr>
			<td>New Password:</td>
			<td><input name="pw2" type="password" size="20"/></td>
		    </tr>
		    <tr>
			<td>Retype Password:</td>
			<td><input name="pw3" type="password" size="20"/></td>
		    </tr>
		</table>
		<br/><br/>
		<input name="submit" type="submit" style="font-size: 20;text-align: center;font-weight: bolder;margin: 10;" value="Update" />
		</form>
	    <?php
	    if(isset($_POST["submit"])){
	    $name=$_POST["cust_name"];
	    $add=$_POST["cust_add"];
	    $email=$_POST["cust_email"];
	    $teloff=$_POST["cust_tel_off"];
	    $telmob=$_POST["cust_tel_mob"];
	    $_SESSION["un"]=$user;
	    if(isset($_POST["pw2"])){
		$password=$_POST["pw2"];
	    }
	    else{
		$password=$_POST["pw1"];		
	    }
	    $password=$_POST["pw1"];
	    $link =mysql_connect("localhost","root","") or die("not connected");
	    mysql_select_db("party_manage") or die ("database not connected");
            $sql ="UPDATE customers SET cust_name='$name' ,cust_add='$add' ,cust_email='$email' ,cust_tel_off='$teloff' ,cust_tel_mob='$telmob' where un='$user'";
	    mysql_query($sql,$link) or die (mysql_error());
	    mysql_close($link);
	    if($user=="admin"){
		$_SESSION["un"]=$user;
		header("location:admin.php");
	    }
	    else{
		$_SESSION["un"]=$user;
		header("Location:member.php");
		exit;}
		$_SESSION["a"]="You have Successfully Updated Your Profile";}
	    ?>
    <p align="right" style="margin-right: 30px;font-size: 16;color: #ffffff;"><a href="<?php echo $loc; ?>" style="font-size: 16;color: #ffffff;">Back.</a> <a href="output.php" style="font-size: 16;color: #ffffff;"><?php if(isset($full)){echo $full;} ?></a></p>
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