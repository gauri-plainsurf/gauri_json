<?php
$conn=new mysqli('localhost','root','','project');
//check connection

if($conn->connect_error){
    die("connection failed" .$conn->connect_error);
            
}
echo "";

$sql = "delete FROM employee WHERE id = '$_GET[id]'";

if(mysqli_query($conn, $sql)){
    header("refresh:1;url=display_employee.php");
}
else{
    echo"not deleted";
}
