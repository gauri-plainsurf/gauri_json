<?php

//  
function get_data() {
    $connect = mysqli_connect("localhost", "root", "", "project");
    $query = "SELECT * FROM employee";
    $result = mysqli_query($connect, $query);
    $array = array();
    while ($row = mysqli_fetch_array($result)) {
        $array[] = array(
            'name' => $row["name"],
            'email' => $row["email"],
            'address' => $row["address"],
            'phone_no' => $row["phone_no"],
            'skills' => $row["skills"],
            'salary' => $row["salary"]
        );
    }
    return json_encode($array);
}

$file = "data.json";
if (file_put_contents($file, get_data())) {
    
    header("Content-type: application/json");
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    header("refresh:1;url=display_employee.php");
} else {
    echo 'There is some error';
}
?> 
