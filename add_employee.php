<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone_no = $_POST['phone_no'];
$skills = $_POST['skills'];
$salary = $_POST['salary'];

$sql = "INSERT INTO employee (name,email,address,phone_no,skills,salary)
VALUES ('$name', '$email', '$address','$phone_no','$skills','$salary')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("location:/employee.php", 301);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     
}
 
mysqli_close($conn);
?>
