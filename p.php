<?php
$admin="ad";
$pwd="pwd"; 
$conn = new mysqli("localhost", "root","","squad");
$sql="insert into msg values('$admin','$pwd')";
$query=mysqli_query($conn,$sql);
$sql1="select * from info";
$result = $conn->query($sql1); 
while($row = $result->fetch_assoc()){
echo $row['username']."<br>".$row['message'];
}
?>