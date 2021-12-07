<?php include('server.php'); ?>
<!DOCTYPE html>
<?php
if (isset($_POST['read'])) {
    if (!isset($_SESSION['loggedin'])) {
        header('location: login.php');
    } else {
        if (isset($_POST['read'])) {
            header('location: home.php');
            session_destroy();
        }
    }
} ?>

<head>

    <title>walimu tech</title>
    <style type="text/css">
        .dropbtn {
            background-color: #B5BEC4;
            color: black;
            padding: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            width:100px;
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>

    <header id="header" style="font:serif;">
        <div class="logo pull-left">
            <h2>homepage</h2>
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
                            <?php

                            $records = mysqli_query($db, "SELECT * FROM userregister WHERE username= '" . $_SESSION["username"] . "'"); // fetch data from database

                            while ($data = mysqli_fetch_array($records)) {
                            ?>
                                <a href="profile.php?id=<?php echo $data['id']; ?>">
                                <?php
                            } ?>
                                <i class="glyphicon glyphicon-user"></i>
                                Profile
                                </a>
                                <a href="home.php?logout='1'" style="color:red;"><i class="glyphicon glyphicon-off"></i> logout</a>

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




    <?php if (isset($_SESSION['username'])) : ?>

        <?php include('sidenav.php'); ?>

        </div>
        <?php
        $sql = "SELECT * FROM leaveaccepted WHERE username= '" . $_SESSION["username"] . "'";
        if ($result = mysqli_query($db, $sql)) {
            $rowleave = mysqli_num_rows($result);
        }
        ?>
        <?php

        $records = mysqli_query($db, "SELECT * from students WHERE username= '" . $_SESSION["username"] . "'"); // fetch data from database
        $total = 0;
        while ($data = mysqli_fetch_array($records)) {
            $total = $data['boys'] + $data['girls'];
        }
        ?>
        <?php
        $records = mysqli_query($db, "SELECT * from tallyteachers WHERE username= '" . $_SESSION["username"] . "'"); // fetch data from database
        $teachers = 0;
        while ($data = mysqli_fetch_array($records)) {
            $teachers = $data['male'] + $data['female'];
        }

        ?>
        <div class="row" style="margin-left:18%; margin-top:5%;">
            <div class="col-md-3">
                <div class="panel panel-box clearfix">
                    <div class="panel-value pull-right" style="width: auto;">
                        <h2 class="margin-top"> </h2>
                        <p class="text-muted">User</p>
                        <?php
                        $q = "SELECT id, fname, lname, username , address, email FROM userregister WHERE username= '" . $_SESSION["username"] . "'";
                        $r = mysqli_query($db, $q);
                        $a = mysqli_fetch_assoc($r);
                        echo " FIRST NAME: " . $a["fname"] . "<br>";
                        echo "LAST NAME: " . $a["lname"] . "<br>";
                        echo "username: " . $a["username"] . "<br>";
                        echo "ADDRESS: " . $a["address"] . "<br>";
                        echo "EMAIL:" . $a["email"];
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-box clearfix">
                    <div class="panel-icon pull-left bg-red">
                        <i class="glyphicon glyphicon-list"></i>
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> <?php echo $total; ?> </h2>
                        <p class="text-muted">total students</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-box clearfix">
                    <div class="panel-icon pull-left bg-blue">
                        <i class="glyphicon glyphicon-list"></i>
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> <?php echo $teachers; ?> </h2>
                        <p class="text-muted">teachers</p>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <div class="row" style="margin-left:18%; margin-top:5%;">
            <div class="col-md-3">
                <div class="panel panel-box clearfix">
                    <div class="panel-icon pull-left bg-blue">
                        <i class="glyphicon glyphicon-list"></i>
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> <?php echo $rowleave; ?> </h2>
                        <p class="text-muted">teachers on leave</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</body>

</html>
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