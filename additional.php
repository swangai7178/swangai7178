<?php include('server.php');


if (isset($_POST['upload'])) {
    $username = $_SESSION['username'];
    $subcounty = $_POST['subcounty'];
    $zone = $_POST['zone'];
    $kneccode = $_POST['kneccode'];
    $nemiscode = $_POST['nemiscode'];
    $noclass = $_POST['noclass'];
    $size = $_POST['size'];
    $state = $_POST['state'];
    $sponsorship = $_POST['sponsorship'];
    $sql = "INSERT INTO additional (username, subcounty ,zone, kneccode , nemiscode, noclass, size, state, sponsorship) 
        VALUES( '$username','$subcounty', '$zone', '$kneccode', '$nemiscode', '$noclass', '$size','$state', '$sponsorship')";

    mysqli_query($db, $sql);
    header('location: additional.php');
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
            <h2>update info</h2>
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

                                <a href="additional.php?logout='1'" style="color:red;"><i class="glyphicon glyphicon-off"></i> logout</a>

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
                            <span>Add student tally</span>
                        </strong>
                    </div>

                    <form method="post" action="additional.php">
                        <?php include('errors.php') ?>

                        <div class="form-group">
                            <input type="text" class="form-control" name="subcounty" placeholder="subcounty">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="zone" placeholder="zone">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="kneccode" placeholder="knec code">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nemiscode" placeholder="nemis code">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="noclass" placeholder="total number of classes in the  school">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="size" placeholder="size of the school in acres">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="state " placeholder=" state of school">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="sponsorship " placeholder=" state of sponsorship">
                        </div>
                        <button type="submit" name="upload" class="btn btn-primary">Add</button>

                    </form>


                    </form>

                </div>
            </div>
        </div>


    <?php endif ?>

</body>

</html>