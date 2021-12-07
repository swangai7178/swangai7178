<?php 
session_start();
$errors = array();
$fname = "";
$lname = "";
$username = "";
$address = "";
$email = "";
$phone ="";

$db = mysqli_connect('localhost', 'root', '', 'loop');


if (isset($_POST['sublogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (empty($password)) {
        array_push($errors, "password is required");
    }
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM subadmin WHERE username='$username' AND password = '$password'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "you are now logged in";
            header('location:dashboard.php');
        } else {
            array_push($errors, "wrong username/password combination");
        }
    }
}
if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $tsnumber = $_POST['tsnumber'];
    $resident = $_POST['resident'];


    if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (empty($name)) {
        array_push($errors, "name is required");
    }
    if (empty($tsnumber)) {
        array_push($errors, "tsc number is required");
    }
    if (empty($resident)) {
        array_push($errors, "resident is required");
    }


    if (count($errors) == 0) {
        $sql = "INSERT INTO teachers (username, name, tsnumber , resident) VALUES( '$username','$name','$tsnumber', '$resident')";

        mysqli_query($db, $sql);
        header('location: dashboard.php');
    }
}
if(isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header('location: ../index.php');

}

?>