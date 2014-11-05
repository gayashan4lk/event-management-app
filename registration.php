<?php
    session_start();
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
		if(document.customers.un.value==''){
			alert("Select a User Name");
			return false;
		}
		if(document.customers.pw.value==''){
			alert("Select a Password");
			return false;
		}
		if(document.customers.pw2.value==''){
			alert("Reenter Your Password");
			return false;
		}
		if(document.customers.pw2.value!=document.customers.pw.value){
			alert("Password Missmatch Retype your Password");
			return false;
		}
		return confirm("Do you want to register?");
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
	<h1 align="center">Registration Form</h1>
	    <form action="" method=post name="customers" onSubmit="return validateForm()">
		<table border=0 color="black" cellpadding="10" cellspacing="2" style="font-size: 20;">
		    <tr>
			<td>Name:</td>
			<td><input name="cust_name" type="textbox" size="30"></td>
		    </tr>  
		    <tr>
			<td>Address:</td>
			<td><input name="cust_add" type="textbox" size="50"></td>
		    </tr>  
		    <tr>
			<td>E-mail:</td>
			<td><input name="cust_email" type="textbox" size="30"></td>
		    </tr>  
		    <tr>
			<td>Phone number(Office):</td>
			<td><input name="cust_tel_off" type="textbox" size="10"></td>
		    </tr>  
		    <tr>
			<td>Phone Number(Mobile):</td>
			<td><input name="cust_tel_mob" type="textbox" size="10"></td>
		    </tr>  
		    <tr>
			<td>User Name:</td>
			<td><input name="un" type="text" size="20"/></td>
		    </tr>
		    <tr>
			<td>Password:</td>
			<td><input name="pw" type="password" size="20"/></td>
		    </tr>
		    <tr>
			<td>Confirm Password:</td>
			<td><input name="pw2" type="password" size="20"/></td>
		    </tr>
		</table>
		<br/><br/>
		<input name="submit" type="submit" style="font-size: 20;text-align: center;font-weight: bolder;margin: 10;" value="Submit" />
		</form>
	    <?php
	    if(isset($_POST["submit"])){
	    $name=$_POST["cust_name"];
	    $add=$_POST["cust_add"];
	    $email=$_POST["cust_email"];
	    $teloff=$_POST["cust_tel_off"];
	    $telmob=$_POST["cust_tel_mob"];
               $user=$_POST["un"];
               $_SESSION["un"]=$user;
	    $password=$_POST["pw"];
	    
	    $link =mysql_connect("localhost","root","") or die("not connected");
	    
	    mysql_select_db("party_manage") or die ("database not connected");
	    
    	    $sql1="select * from customers where un='$user'";
    	    
	    $result=mysql_query($sql1,$link);
	    
	    $numofrows=mysql_num_rows($result);
	    
	    if($numofrows !=0)
	    {
               echo "<p style=color:white;font-size:18;>User Name Already Taken</p>";
	    }
	    
	    else
	    {
               $sql ="INSERT INTO customers(cust_name,cust_add,cust_email,cust_tel_off,cust_tel_mob,un,pw)
               VALUES('$name','$add','$email','$teloff','$telmob','$user','$password')";
              
               mysql_query($sql,$link) or die (mysql_error());
              
               mysql_close($link);
              
               header("location:member.php");
	    }
	    }
	    ?>
    <p align="right" style="margin-right: 30px;font-size: 16;color: #ffffff;"><a href="index.php" style="font-size: 16;color: #ffffff;">Back</a></p>
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