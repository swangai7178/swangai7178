<?php
session_start();
$errors = array();
$fname = "";
$lname = "";
$username = "";
$address = "";
$email = "";
$phone = "";

$db = mysqli_connect('localhost', 'root', '', 'loop');

if (isset($_POST['register'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];

	if (empty($fname)) {
		array_push($errors, "fname is required");
	}
	if (empty($lname)) {
		array_push($errors, "lname is required");
	}
	if (empty($username)) {
		array_push($errors, "username is required");
	}
	if (empty($address)) {
		array_push($errors, "address is required");
	}
	if (empty($email)) {
		array_push($errors, "email is required");
	}
	if (empty($phone)) {
		array_push($errors, "phone is required");
	}
	if (empty($password)) {
		array_push($errors, "password is required");
	}
	$user_check_query = "SELECT * FROM admin WHERE fname='$fname' OR lname='$lname' OR username='$username' OR address ='$address'  OR email='$email' OR phone= '$phone' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	if ($user) { // if user exists
		if ($user['fname'] === $fname) {
			array_push($errors, "name already exists");
		}
		if ($user['lname'] === $lname) {
			array_push($errors, "user already exists");
		}
		if ($user['username'] === $username) {
			array_push($errors, "school code already exists");
		}
		if ($user['address'] === $address) {
			array_push($errors, "address already exists");
		}

		if ($user['email'] === $email) {
			array_push($errors, "email already exists");
		}
		if ($user['phone'] === $phone) {
			array_push($errors, "phone number already exists");
		}
	}


	if (count($errors) == 0) {
		$password = md5($password);
		$sql = "INSERT INTO admin (fname, lname, username , address, email, phone, password) VALUES( '$fname','$lname','$username', '$address', '$email', '$phone','$password')";

		mysqli_query($db, $sql);
		header('location: admin.php');
	}
}
if (isset($_POST['login'])) {
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
		$query = "SELECT * FROM admin WHERE username='$username' AND password = '$password'";
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
		$sql = "INSERT INTO adminmessages (username, mobile, message) VALUES( '$username','$mobile','$message')";

		mysqli_query($db, $sql);
		header('location: home.php');
	}
}
if (isset($_POST['subregister'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];

	if (empty($fname)) {
		array_push($errors, "fname is required");
	}
	if (empty($lname)) {
		array_push($errors, "lname is required");
	}
	if (empty($username)) {
		array_push($errors, "username is required");
	}
	if (empty($address)) {
		array_push($errors, "address is required");
	}
	if (empty($email)) {
		array_push($errors, "email is required");
	}
	if (empty($phone)) {
		array_push($errors, "phone is required");
	}
	if (empty($password)) {
		array_push($errors, "password is required");
	}
	$user_check_query = "SELECT * FROM subadmin WHERE fname='$fname' OR lname='$lname' OR username='$username' OR address ='$address'  OR email='$email' OR phone= '$phone' LIMIT 1";
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
		if ($user['address'] === $address) {
			array_push($errors, "address already exists");
		}

		if ($user['email'] === $email) {
			array_push($errors, "email already exists");
		}
		if ($user['phone'] === $phone) {
			array_push($errors, "phone number already exists");
		}
	}


	if (count($errors) == 0) {
		$password = md5($password);
		$sql = "INSERT INTO subadmin (fname, lname, username , address, email, phone, password) VALUES( '$fname','$lname','$username', '$address', '$email', '$phone','$password')";

		mysqli_query($db, $sql);
		header('location: dashboard.php');
	}
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header('location: ../index.php');
}
if (isset($_POST['post'])) {
	$year = $_POST['year'];
	$totalboys = $_POST['totalboys'];
	$totalgirls = $_POST['totalgirls'];


	if (empty($year)) {
		array_push($errors, " year is required");
	}
	if (empty($totalboys)) {
		array_push($errors, "number  is required");
	}
	if (empty($totalgirls)) {
		array_push($errors, "total is required");
	}

	if (count($errors) == 0) {
		$sql = "INSERT INTO totalupdate (year, totalboys, totalgirls) VALUES( '$year','$totalboys','$totalgirls')";

		mysqli_query($db, $sql);
		header('location: dashboard.php');
	}
}
if (isset($_POST['add_cat'])) {
	$category = $_POST['category'];



	if (empty($category)) {
		array_push($errors, " category is required");
	}
	

	if (count($errors) == 0) {
		$sql = "INSERT INTO category (category) VALUES( '$category')";

		mysqli_query($db, $sql);
		header('location: category.php');
	}
}
?>
