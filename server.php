<?php 
session_start();
$errors = array();
$fname = "";
$lname = "";
$county = "";
$category ="";
$username = "";
$address = "";
$email = "";
$phone ="";

$db = mysqli_connect('localhost', 'root', '', 'loop');

if(isset($_POST['register'])) {
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$county = $_POST['county'];
	$category = $_POST['category'];
	$username =$_POST['username'];
	$address =$_POST['address'];
	$email =$_POST['email'];
	$phone =$_POST['phone'];
	$password =$_POST['password'];

	if(empty($fname)){
		array_push($errors, "fname is required");
	}
		if(empty($lname)){
		array_push($errors, "lname is required");
	}
	if(empty($county)) {
		array_push($errors, "county name is required");
	}
	    if(empty($username)){
		array_push($errors, "user is required");
	}
	    if(empty($address)){
		array_push($errors, "address is required");
	}
		if(empty($email)){
		array_push($errors, "email is required");
	}
		if(empty($phone)){
		array_push($errors, "phone is required");
	}
		if(empty($password)){
		array_push($errors, "password is required");
	}
	  $user_check_query = "SELECT * FROM userregister WHERE fname='$fname' OR lname='$lname' OR username='$username'   OR email='$email' OR phone= '$phone' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
		if ($user['fname'] === $fname) {
			array_push($errors, "school name already exists");
		}
		if ($user['lname'] === $lname) {
			array_push($errors, "user already exists");
		}
    if ($user['username'] === $username) {
      array_push($errors, "school code already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
		if ($user['phone'] === $phone) {
			array_push($errors, "phone number already exists");
		}
  }


	if(count($errors) == 0) {
		$password =md5($password);
		$sql = "INSERT INTO userregister (fname, lname,county, category, username , address, email, phone, password) VALUES( '$fname','$lname', '$county','$category', '$username', '$address', '$email', '$phone','$password')";

		mysqli_query($db, $sql);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "you are now logged in";
		header('location: home.php');
	}
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username)) {
        array_push($errors, "user is required");
    }
    if (empty($password)) {
        array_push($errors, "password is required");
    }
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM userregister WHERE username='$username' AND password = '$password'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "you are now logged in";
            header('location:home.php');
        } else {
            array_push($errors, "wrong username/password combination");
        }
    }
}
if (isset($_POST['add'])) {
	$username = $_SESSION['username'];
	$name = $_POST['name'];
	$tsnumber = $_POST['tsnumber'];
	$subject = $_POST['subject'];
	$resident = $_POST['resident'];


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
		$sql = "INSERT INTO teachers (username, name, tsnumber, subject , resident) VALUES( '$username','$name','$tsnumber','$subject', '$resident')";

		mysqli_query($db, $sql);
		header('location: teacher_register.php');
	}
}

if (isset($_POST['total'])) {
	$county = $_POST['county'];
	$username = $_POST['username'];
	$boys = $_POST['boys'];
	$girls = $_POST['girls'];


	if (empty($username)) {
		array_push($errors, "school name is required");
	}
	if (empty($boys)) {
		array_push($errors, "number  is required");
	}
	if (empty($girls)) {
		array_push($errors, "number is required");
	}

	if (count($errors) == 0) {
		$sql = "INSERT INTO students (county,username, boys, girls) VALUES('$county', '$username','$boys','$girls')";

		mysqli_query($db, $sql);
		header('location: students.php');
	}
}

if (isset($_POST['ttotal'])) {
	$county = $_POST['county'];
	$username = $_POST['username'];
	$male = $_POST['male'];
	$female = $_POST['female'];

if(empty($county)){
	array_push($error, "county needed");
}
	if (empty($username)) {
		array_push($errors, "username is required");
	}
	if (empty($male)) {
		array_push($errors, "male number  is required");
	}
	if (empty($female)) {
		array_push($errors, "f number is required");
	}

	if (count($errors) == 0) {
		$sql = "INSERT INTO tallyteachers (county, username, male, female) VALUES('$county', '$username','$male','$female')";

		mysqli_query($db, $sql);
		header('location: teachers.php');
	}
}

if (isset($_POST['send'])) {
	$username = $_POST['username'];
	$mobile = $_POST['mobile'];
	$message = $_POST['message'];


	if (empty($username)) {
		array_push($errors, " id is required");
	}
	if (empty($mobile)) {
		array_push($errors, "number  is required");
	}
	if (empty($message)) {
		array_push($errors, "what is the message");
	}

	if (count($errors) == 0) {
		$sql = "INSERT INTO usermessages (username, mobile, message) VALUES( '$username','$mobile','$message')";

		mysqli_query($db, $sql);
		header('location: home.php');
	}
}

if (isset($_POST['leave'])) {
	$username = $_POST['username'];
	$tsnumber = $_POST['tsnumber'];
	$county = $_POST['county'];
	$name = $_POST['name'];
	$reason = $_POST['reason'];
	$start = $_POST['start'];
	$end = $_POST['end'];


	if (empty($username)) {
		array_push($errors, "username is required");
	}
	if (empty($tsnumber)) {
		array_push($errors, "tsc num is required");
	}
	if (empty($county)) {
		array_push($errors, "county is required");
	}
	if (empty($name)) {
		array_push($errors, "name is required");
	}
	if (empty($reason)) {
		array_push($errors, "reason is required");
	}
	if (empty($start)) {
		array_push($errors, "date is required");
	}
	if (empty($end)) {
		array_push($errors, "date is required");
	}


	if (count($errors) == 0) {
		$sql = "INSERT INTO leaveapp (username,tsnumber, county, name, reason ,start, end)
	VALUES( '$username','$tsnumber','$county','$name','$reason', '$start', '$end')";

		mysqli_query($db, $sql);
		header('location: leave.php');
	}
}


if(isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header('location: index.php');

}


?>