<html>
<h1>LOG IN FORM {SQUAD}</h1>
<body>
<link rel="stylesheet" href="style.css">
<div  class="lays">
<form action="validate.php" method="GET">
<div class="l1">
USERNAME:<br><input type="text" placeholder="ENTER USERNAME" name="nm">
</div>
<div class="l2">
PASSWORD:<br><input type="text" placeholder="ENTER PASSWORD" name="pwd">
</div>
<input type="submit" name="sb" />
</form>
</div>
</body>
<?php
error_reporting(E_ERROR);
$us=$_GET['nm'];
$pd=$_GET['pwd'];
session_start();
$_SESSION['k']=$us;
function check(&$user,&$passwd){
$conn = new mysqli("localhost", "root","","squad");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo $us;

$sql="select * from info";
$result = $conn->query($sql); 
while($row = $result->fetch_assoc()) {
    if($row['username']==$user and $row['password']==$passwd){
     global $k;
      $k++;
     break; 
  }
}
$conn->close();
}
check($us,$pd); 
if($k>0){
header("Location: chat.php");
}elseif($user=="" and $passwd==""){
//echo "PLEASE ENTER CREDIENTIALS";
}else{
echo "wrong credentials";
}
?>
<html>