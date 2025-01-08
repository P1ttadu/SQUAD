<html>
<body>
<style>
body{
background-color:black;
font-family:Tiny5;
color:white;
}	
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tiny5&display=swap" rel="stylesheet">
<form method="POST" action="chat.php">
<input type="text" name="id" placeholder="enter text">
<input type="submit">
<?php
'include validate.php';
error_reporting(E_ERROR);
$conn = new mysqli("localhost", "root","","squad");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
$sql1="select * from msg";
$result = $conn->query($sql1); 
while($row = $result->fetch_assoc()){
echo "<br>".$row['username']."<br>-";
echo $row['messages']."<br>";
}
}
session_start();
$usr=$_SESSION['k'];
$msg=$_POST['id'];
//msg variable is not taking special characters so we use en to resolve the issue.
$en=str_replace("'", "''", $msg);
if($usr!="" and $msg!=""){
$sql="insert into msg (username,messages) values('$usr','$en')";
$query=mysqli_query($conn,$sql);
header("refresh: 0;");
}
?>
</form>
</body>
</html>	
