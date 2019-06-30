<?php
$conn = mysqli_connect("localhost", "root", "", "project");
$sql = '';
if(isset($_POST['Import'])) {
    copy($_FILES['jsonFile']['tmp_name'], 'uploads/'.$_FILES['jsonFile']['name']);
    $data = file_get_contents('uploads/'.$_FILES['jsonFile']['name']);
    $array = json_decode($data, true); //Convert JSON String into PHP Array
  foreach ($array as $row) {

  echo $row['name'];
  echo '<br>' . $row['email'] . '<br>' . $row['address'] . '<br>' . $row['phone_no'] . '<br>' . $row['skills'] . '<br>' . $row['salary'] . '<br>'. '<br>' . $row['id'] . '<br>';
  $sql = "INSERT INTO employee(name,email,address,phone_no,skills,salary,id)VALUES('" . $row['name'] . "','" . $row['email'] . "','" . $row['address'] . "','" . $row['phone_no'] . "','" . $row['skills'] . "','" . $row['salary'] . "','" . $row['id'] . "')";
  if (mysqli_query($conn, $sql)) {
  echo"data inserted";
  header('location:display_employee.php');

  }
}
}
    ?>