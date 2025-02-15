<?php
$uname = trim($_POST["username"]);
$fname = trim($_POST["fname"]);
$lname = trim($_POST["lname"]);
$mail = trim($_POST["email"]);
$ph = trim($_POST["phone"]);
$gender = trim($_POST["gender"]);
$passw = trim($_POST["pass"]);
$date = date("F j, Y, g:i a");

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'project';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {

    $query1 = "SELECT * FROM `userregistration`";
    $result = mysqli_query($conn, $query1);

    if (mysqli_query($conn, $query1)) {
        $check = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['username'];
            if ($uname == $name) {
                $check = 1;
            }
        }
        if ($check == 0) {
            $query = "INSERT INTO `userregistration`(`username`, `fname`, `lname`, `email`, `phone`, `gender`, `pass`, `date`)
                      VALUES ('$uname','$fname','$lname','$mail','$ph','$gender','$passw','$date')";
            $chk = mysqli_query($conn, $query);

            if ($chk) {
                $msg = "<h5 class='alert alert-success' style='padding:10px;'>Sign Up Successfully!! Now you can <a href='userlogin1.html'>Login here</a>
                        <i style='font-size:24px ;color:red;float:right' class='fa'>&#xf046;</i></h5>";
            } else {
                $msg = "<h5 class='alert alert-danger'>Error: Could not register user. Please try again.</h5>";
            }
        } else if ($check == 1) {
            function generateRandomString($length = 4) {
                return substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 1, $length);
            }

            $newname = generateRandomString();
            $newname = $uname . $newname;
            $newname2 = $uname . generateRandomString();
            $newname3 = $uname . generateRandomString();
            $newname4 = $uname . generateRandomString();
            $newname5 = $uname . generateRandomString();

            $msg = "<h4 class='alert alert-warning'>Username ($uname) already exists. Please <a href='userreg1.html'>try again</a> with a different one.</h4><br />
                    <hr />
                    <ul class='list-group'>
                        <li class='list-group-item'>You can try $newname</li>
                        <li class='list-group-item'>You can try $newname2</li>
                        <li class='list-group-item'>You can try $newname3</li>
                        <li class='list-group-item'>You can try $newname4</li>
                        <li class='list-group-item'>You can try $newname5</li>
                    </ul>";
        }
    } else {
        $msg = "<h5 class='alert alert-danger'>Error: Could not execute the query. Please try again.</h5>";
    }
} else {
    $msg = "<h5 class='alert alert-danger'>Error: Could not establish a connection to the database.</h5>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            background: white;
            padding: 30px;
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav h2 {
            cursor: pointer;
        }

        .navbar-nav .nav-item a {
            color: white;
            text-decoration: none;
        }

        .navbar-nav .nav-item a:hover {
            color: #329c92;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">CUI Complaint System</a>
    <div class="ml-auto">
        <a class="btn btn-outline-light mx-2" href="userlogin1.html">User Login</a>
        <a class="btn btn-outline-light mx-2" href="userreg1.html">User Registration</a>
        <a class="btn btn-outline-light mx-2" href="adminlogin1.html">Admin</a>
    </div>
</nav>

<div class="container">
    <h3 class="text-center">Registration Status</h3>
    <div class="text-center">
        <?php echo $msg; ?>
    </div>
</div>

</body>
</html>
