<html>
<head>
    <title>Party Arrangement </title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <style type="text/css">
	#loginframe{margin-left: 250px;margin-right: 250px;font-size: 20px;font-weight: 200;border: solid;border-width: 2px;border-color: black;}
	.login{font-size: 20px;font-weight: bolder;}
    </style>
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
		<td align="center"><a href="help.html"><font color="black"><b>Help</b></font></a></p></td>
	    </tr>
        </table>

<?php
$linkz=mysql_connect ("localhost","root","") or die("Sorry Didnot"); 
mysql_select_db("party_manage",$linkz) or die("No_DB_Found"); 
$sql="select * from customers"; 
$result=mysql_query($sql,$linkz);
echo "<div style='color:white;overflow: auto;height:200px;margin: 30px;margin-bottom:0px;'>";
echo "<table border=1  bgcolor=black style=color:white;>";
echo "<tr>";
$numofrows=mysql_num_rows($result);
for($fld=0;$fld<mysql_num_fields($result);$fld++){
echo "<th width='200px'>";
echo "&nbsp;&nbsp;&nbsp;".mysql_field_name($result,$fld);
echo "</th>";
}
echo "</tr>";
while ($row = mysql_fetch_assoc($result)) {
echo "<tr>";
foreach($row as $key => $value){
    echo "<td width='200px'>".$row["$key"]."</td>";
}
echo "</tr>";
}
echo "</table>";
echo "</div>";
echo "<br/>"."<br/>"."<br/>";
$sql="select * from cust_comment"; 
$result1=mysql_query($sql,$linkz);
echo "<table border=1  bgcolor=black style=color:white;>";
echo "<tr >";
$numofrows2=mysql_num_rows($result1);
for($fld=0;$fld<mysql_num_fields($result1);$fld++){
echo "<th width='150px'>";
echo "&nbsp;&nbsp;&nbsp;".mysql_field_name($result1,$fld);
echo "</th>";
}
echo "</table>";
echo "<div style='color:white;overflow: auto;height:130px;margin: 30px;margin-top:0px;'>";
echo "<table border=1  bgcolor=black style=color:white;>";
echo "</tr>";
while ($row = mysql_fetch_assoc($result1)) {
echo "<tr>";
foreach($row as $key => $value){
    echo "<td  width='150px'>".$row["$key"]."</td>";
}
echo "</tr>";
}
echo "</table>";
echo "</div>";
?>        
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