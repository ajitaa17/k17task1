<html>
<head> <title> view</title> 
<?php
$name=$_POST["nam"];
$dob=$_POST["do"];
$gen=$_POST["gender"];
$dept=$_POST["dep"];
$roll=$_POST["rn"];
$me=$_POST["me"];
$mysqlport=getenv('S2G_MYSQL_PORT');
$dbhost="localhost:".$mysqlport;
$dbuser='root';
$dbpass='';
$conn=mysql_connect($dbhost,$dbuser,$dbpass) or die("connection failed");
mysql_select_db('form');
$query_insert="INSERT INTO details(name, DOB, gender, dept, rn, myself) VALUES ('$name', '$dob', '$gen', '$dept', '$roll', '$me')";
if(mysql_query($query_insert))
echo "You've updated your profile successfully!";
else
echo "Oops! Update not successful";
echo "\nerror(if any)=".mysql_error($conn);
?> 
<body background="ab.jpg">
<hr><br>
<form name="Display">
<?php 
$mysqlport=getenv('S2G_MYSQL_PORT');
$dbhost="localhost:".$mysqlport;
$dbuser='root';
$dbpass='';
$conn=mysql_connect($dbhost,$dbuser,$dbpass) or die("connection failed");
mysql_select_db('form');
$resultselect=mysql_query("select * from details where rn=$roll");
$row=mysql_fetch_array($resultselect,MYSQL_ASSOC) ?>
<pre><font face="purisa" size="6">

Name            :   <input type="text" name="name" value="<?php echo $row['name'];?>" disabled>
DOB(yyyy-mm-dd) :   <input type="text" name="dob" value="<?php echo $row['dob'];?>" disabled>
Gender          :   <input type="text" name="gender" value="<?php echo $row['gender'];?>" disabled>
Department      :   <input type="text" name="dept" value="<?php echo $row['dept'];?>" disabled>
Roll Number     :   <input type="text" name="rn" value="<?php echo $row['rn'];?>" disabled>
About me        :   <input type="text" name="me" value="<?php echo $row['myself'];?>" disabled>
</font>
</pre>
</form>
<form name="info" action="home.php" method="POST">
<center><input type="submit" name="Gobackhome" value="GO BACK HOME"></center>
</form>
<?php
mysql_close($conn);

?>

