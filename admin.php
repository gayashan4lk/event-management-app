<?php
session_start();
$mess="";
if(!isset($_SESSION["un"])){
 header("location:invalidemember.php");
 exit;
}
    $user=$_SESSION["un"];
    if(isset($_SESSION["a"])) {$msg=$_SESSION["a"];}
    $linkz=mysql_connect ("localhost","root","") or die("Sorry Didnot"); 
    mysql_select_db("party_manage",$linkz) or die("No_DB_Found"); 
if(isset($_POST["submit2"] )){
		    $id1=$_SESSION["cust_id"];
		    $reply=$_POST["reply"];
		    $a1=$id1;
		    $sql2="select contact_method from customers where cust_id='$id1'"; 
		    $result2=mysql_query($sql2,$linkz) or die (mysql_error());
		    $a2 = mysql_fetch_assoc($result2);
		    $sql3="select cust_order from customers where cust_id='$id1'"; 
		    $result3=mysql_query($sql3,$linkz) or die (mysql_error());
		    $a3 = mysql_fetch_assoc($result3);
		    $sql4="select  cust_com from cust_comment where cust_com_id=(select max(cust_com_id) from cust_comment where cust_id='$id1')";
		    $result4=mysql_query($sql4,$linkz) or die (mysql_error());
		    $a4 = mysql_fetch_assoc($result4);
		    $sql5="select max(cust_com_id) as abc from cust_comment where cust_id='$id1'";
		    $result5=mysql_query($sql5,$linkz) or die (mysql_error());
		    $a5=mysql_fetch_assoc($result5);
		    $abc=$a5["abc"];
		    $sql6 = "update cust_comment set ad_reply='$reply' where cust_com_id='$abc'";
		    mysql_query( $sql6) or die (mysql_error());
}
elseif(isset($_POST["submit1"])){
		    $id=$_POST["cust_id"];
		    $a1=$id;
		    $_SESSION["cust_id"]=$id;
		    $sql2="select contact_method from customers where cust_id='$id'"; 
		    $result2=mysql_query($sql2,$linkz) or die (mysql_error());
		    $a2 = mysql_fetch_assoc($result2);
		    $sql3="select cust_order from customers where cust_id='$id'"; 
		    $result3=mysql_query($sql3,$linkz) or die (mysql_error());
		    $a3 = mysql_fetch_assoc($result3);
		    $sql4="select  cust_com from cust_comment where cust_com_id=(select max(cust_com_id) from cust_comment where cust_id='$id')";
		    $result4=mysql_query($sql4,$linkz) or die (mysql_error());
		    $a4 = mysql_fetch_assoc($result4) ;
		    }

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
		<td align="center"><a href="index.php"><font color="#99000"><b>Home</b></font></a></td>
	    	<td align="center"><a href="services.html"><font color="#99000"><b>Services</b></font></a></td>
    		<td align="center"><a href="contact.html"><font color="#99000"><b>Contact</b></font></a></td>
		<td align="center"><a href="help.html"><font color="#99000"><b>Features</b></font></a></p></td>
	    </tr>
	</table>
	<h1>Adiministrator Page</h1>
	<p style="float: right;margin-right: 35;font-weight: bold;font-size:30 medium;color: white; background-color:yellow;"><a href="logout.php" style="color: red">Logout</a></p><p style="float: right;margin-right: 10;font-weight: bold;font-size: medium;color: green; background-color:yellow;">Administrator</p><p style="float: right;margin-right: 70;font-weight: bold;font-size: medium;color: white;"><?php if(isset($msg)) {echo $msg;} ?></p><br/><br/>
	<br/><div style="color:white;overflow: auto;height:130px;margin: 30px;border: solid;border-color: white;">
	<?php
	$linkz=mysql_connect ("localhost","root","") or die("Sorry Didnot");
	mysql_select_db("party_manage",$linkz) or die("No_DB_Found");
	$sql="select cust_id,cust_name,cust_add,cust_email,cust_tel_off,cust_tel_mob,un from customers";
	$result=mysql_query($sql,$linkz);
	echo "<table border='1' style='font-size:12;color:white;overflow:scroll;height:100px'>";
	echo "<tr>";
	for($fld=0;$fld<mysql_num_fields($result);$fld++){
		echo "<th>";
		echo "&nbsp;&nbsp;&nbsp;".mysql_field_name($result,$fld);
		echo "</th>";
	}
	 echo "<th>update/delete</th>";
	echo "</tr>";
	while ($row = mysql_fetch_assoc($result)) {
		echo "<tr>";
		foreach($row as $key => $value){
			echo "<td>".$row["$key"]."</td>";
		}
		if($row["un"]==$user){
		    echo "<td>"."<a href='update.php?id=".urlencode($row['cust_id'])."'>"."Update "."</a>"."</td>";
		}
		else{
		    echo "<td>"."<a href='delete.php?id=".urlencode($row['cust_id'])."'>"."DELETE "."</a>"."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	?></div>
	<hr width="85%" />
	<div><table style="font-size: 15;" width="700px" cellpadding="12">
	    <tr><form name="id" action="" method="post">
		<td>Input Customer ID:</td>
		<td><input type="text" name="cust_id"/></td>
		<td><input name="submit1" value="get result" type="submit"></td>
	    </tr>
	    <tr<hr>
		<td>Customer ID</td>
		<td><?php if(isset($a1)){ echo $a1; } ?></td>
	    </tr>
	    <tr>
		<td>Preferd Contact Method:</td>
		<td colspan="2"><?php if(isset($a2)){ echo $a2["contact_method"];} ?></td>
	    </tr>
	    <tr>
		<td>Customer Requirment:</td>
		<td colspan="2"><?php if(isset($a3)){ echo $a3["cust_order"];} ?></td>
	    </tr>
	    <tr>
		<td>Customer Explanation:</td>
		<td colspan="2"><?php if(isset($a4)){echo $a4["cust_com"];}?></td>
	    </tr>
	   </form></table></div>
	   <div style="border: solid;margin-left: 30px;margin-right: 30px;"><table style="font-size: 15;" width="700px" cellpadding="12"><form name="form2" method="post" action="">
	    <tr>
		<td>Reply</td>
	    </tr>
	    <tr>
		<td colspan="2"><center><textarea name="reply" rows="5" cols="70">Please write your comments here</textarea></center></td>
    	    </tr>
	    <tr>
		<td colspan="3"><center><input name="submit2" type="submit" value="Send"></center></td>
	    </tr>
	</form></table></div></div>
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