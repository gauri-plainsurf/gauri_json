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

if (count($_POST) > 0) {
    
    mysqli_query($conn, "UPDATE employee set  name='" . $_POST['name'] . "', email='" . $_POST['email'] . "',address='" . $_POST['address'] . "' ,phone_no='" . $_POST['phone_no'] . "' ,skills='" . $_POST['skills'] . "' ,salary='" . $_POST['salary'] . "' WHERE id='" . $_GET['id'] . "'");
    $message = "";
    header('location:display_employee.php');
}
$result = mysqli_query($conn, "SELECT * FROM employee WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>employee</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" href="#"/>

        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <body>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-t-85 p-b-20">
                    <form name="" method="post" action="">
                        <div><?php
                            if (isset($message)) {
                                echo $message;
                            }
                            ?>
                        </div>
                        <div >
                            <a href="display_employee.php"> <span class="login100-form-title">update Employee details</span></a>
                        </div>
                        <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter name">
                            <input class="input100" type="text" name="name"  value="<?php echo $row['name']; ?>">
                            <span class="focus-input100" data-placeholder="name" ></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-50" data-validate="Enter Email">
                            <input class="input100" type="email" name="email" value="<?php echo $row['email']; ?>">
                            <span class="focus-input100" data-placeholder="Email"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-50" data-validate="Enter Address">
                            <input class="input100" type="text" name="address" value="<?php echo $row['address']; ?>">
                            <span class="focus-input100" data-placeholder="Address"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-50" data-validate="Enter phone number">
                            <input class="input100" type="tel" name="phone_no"value="<?php echo $row['phone_no']; ?>">
                            <span class="focus-input100" data-placeholder="phone number"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-50" data-validate="skills">
                            <input class="input100" type="text" name="skills" value="<?php echo $row['skills']; ?>">
                            <span class="focus-input100" data-placeholder="skills"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-50" data-validate="salary">
                            <input class="input100" type="text" name="salary" value="<?php echo $row['salary']; ?>">
                            <span class="focus-input100" data-placeholder="salary"></span>
                        </div>


                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="submit">
                                update
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>



    </body>

</html>