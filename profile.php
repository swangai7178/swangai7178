<?php include "server.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db, "SELECT * FROM userregister where id='$id'");

$data = mysqli_fetch_array($qry);

if (isset($_POST['update'])) {
	$lname = $_POST['lname'];

	$county = $_POST['county'];
	$category = $_POST['category'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	$edit = mysqli_query($db, "update userregister set lname='$lname', county='$county', category='$category', address='$address' , email='$email', phone='$phone' where id='$id'");

	if ($edit) {
		mysqli_close($db);
		header("location: home.php");
		exit;
	} else {
		echo "no records found";
	}
}
?>
<!DOCTYPE html>

<head>
	<title>walimu tech</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/sidenav.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
	<style type="text/css">
		.dropbtn {
			background-color: #B5BEC4;
			color: black;
			padding: 5px;
			font-size: 16px;
			border: none;
			cursor: pointer;
			width: 100px;
			margin-right: 0px;
		}

		.dropbtn:hover,
		.dropbtn:focus {
			background-color: #FFFFFF;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f1f1f1;
			min-width: 160px;
			overflow: auto;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
			z-index: 1;
		}

		.dropdown-content a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}

		.dropdown a:hover {
			background-color: #ddd;
		}

		.show {
			display: block;
		}
	</style>

	<header id="header" style="font:serif;">
		<div class="logo pull-left">
			<h2>profile</h2>
		</div>
		<div class="header-content">
			<div class="header-date pull-left">
				<strong><?php echo date("F j, Y, g:i a"); ?></strong>
			</div>

			<ul class="info-menu list-inline list-unstyled">
				<li class="profile">
					<?php if (isset($_SESSION['username'])) : ?>

				</li>
				<ul class="info-menu list-inline pull-right" style="margin-right:4%;">
					<li class="profile"><button onclick="myFunction()" class="dropbtn togle">profile</button>
						<div id="myDropdown" class="dropdown-content">

							<a href="profile.php?logout='1'" style="color:red;"><i class="glyphicon glyphicon-off"></i> logout</a>

						</div>
					</li>
				</ul>


				<li class="last">


				<?php endif ?>
				</li>
				</li>
			</ul>
		</div>
		</div>
	</header>

	<script>
		/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
		function myFunction() {
			document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
			if (!event.target.matches('.dropbtn')) {
				var dropdowns = document.getElementsByClassName("dropdown-content");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
				}
			}
		}
	</script>


	<?php if (isset($_SESSION['username'])) : ?>
		<?php include('sidenav.php'); ?>
		<div class="row" style="margin-left:18%; margin-top:5%;">
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>
							<span class="glyphicon glyphicon-th"></span>
							<span>edit user data</span>
						</strong>
					</div>
					<div class="panel-body">
						<h3>Update Data</h3>

						<form method="POST">
							<div class="form-group">
								<input type="text" name="lname" value="<?php echo $data['lname'] ?>" placeholder="Enter Full Name" Required>
							</div>
							<div class="form-group">
								<input type="text" name="county" value="<?php echo $data['county'] ?>" placeholder="Enter the number of boys" Required>
							</div>
							<div class="form-group">
								<input type="text" name="category" value="<?php echo $data['category'] ?>" placeholder="Enter the number of boys" Required>
							</div>
							<div class="form-group">
								<input type="text" name="address" value="<?php echo $data['address'] ?>" placeholder="Enter the number of boys" Required>
							</div>
							<div class="form-group">
								<input type="text" name="email" value="<?php echo $data['email'] ?>" placeholder="Enter the number of boys" Required>
							</div>
							<div class="form-group">
								<input type="text" name="phone" value="<?php echo $data['phone'] ?>" placeholder="Enter the number of boys" Required>
							</div>
							<input type="submit" class="btn btn-primary" name="update" value="Update">
						</form>

					<?php endif ?>

</body>

</html>