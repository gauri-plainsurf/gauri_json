<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:index.php');
}
?>
<?php
$conn = new mysqli('localhost', 'root', '', 'project');
//check connection

if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
echo "";
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_no = $_POST['phone_no'];
    $skills = $_POST['skills'];
    $salary = $_POST['salary'];

    $sql = "select *from employee";
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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

        <script type="text/javascript" src="tableExport/jquery.base64.js"></script>
        <script type="text/javascript" src="tableExport/html2canvas.js"></script>
        <script type="text/javascript" src="tableExport/tableExport.jquery.json"></script>
        <script type="text/javascript" src="tableExport/tableExport.js"></script>
        <script type="text/javascript" src="tableExport/jspdf/libs/base64.js"></script>
        <script type="text/javascript" src="tableExport/jspdf/libs/sprintf.js"> </script>
        <script type="text/javascript">
            $(document).ready(function(e)){
            $("#json").click(function(e))
                    $("#mytable").tableExport({
            type:'json',
                    escape:'false'
            });
            });
            });
        </script>

    </head>

    <body>
        <section class="ac">
            <div class="col-lg-6 buttons btn btn-success">

                <a href="employee.php" method="post" class="">
                    <input type="submit" value="back" class="btn btn-success btn-lg" name="back">

                </a>
            </div>
        </section>
        <div class="container ab">


            <table class="table  table-bordered table-hover" id="mytable">

                <thead class="thead-dark">

                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>phone_no</th>
                        <th>Skills</th>
                        <th>Salary</th>
                        <th width="100px">Action</th>
                        <th width="100px">Action</th>

                    </tr>
                </thead>
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

                $sql = "SELECT *FROM employee";
                $result = mysqli_query($conn, $sql);



                while ($row = mysqli_fetch_assoc($result)) {
                    $rows[] = $row;
                    ?>

                    <tr id="<?php echo $row['id'] ?>">
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['phone_no'] ?></td>
                        <td><?php echo $row['skills'] ?></td>
                        <td><?php echo $row['salary'] ?></td>
                        <td><button class="btn btn-danger btn-lg remove">Delete</button></td>
                        <td><button class="btn btn-success btn-lg "><a href="updates.php?id=<?php echo $row['id']; ?>"> Update</a></button></td>
                    </tr>


                    <?php
                }
                ?>

            </table>
        </div> <!-- container / end -->

			<?php include_once 'backup.php'; ?>




    </body>
    <script type="text/javascript">
        $(".remove").click(function () {
        var id = $(this).parents("tr").attr("id");
        if (confirm('Are you sure to remove this record ?'))
        {
        $.ajax({
        url: '/delete.php',
                type: 'GET',
                data: {id: id},
                error: function () {
                alert('Something is wrong');
                },
                success: function (data) {
                $("#" + id).remove();
                alert("Record removed successfully");
                }
        });
        }
        });


    </script>


</html>