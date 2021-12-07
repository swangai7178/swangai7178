<?php include('adminserver.php'); ?>
<!DOCTYPE html>

<head>
    <title>walimu tech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/sidenav.css" />
</head>

<body>
    <?php include('header.php'); ?>

    <?php if (isset($_SESSION['username'])) : ?>
        <?php include('sidenav.php'); ?>



        <?php

        $records = mysqli_query($db,"select * from userregister,students where userregister.username=students.username and userregister.county='" . $_SESSION["username"] . "'"); // fetch data from database
        $sum = 0;
        $gsum = 0;
        while ($data = mysqli_fetch_array($records)) {
            $total = $data['boys'] + $data['girls'];
            $sum += $total;
            $gsum += $data['girls'];
            $gpercent = ($gsum / $sum) * 100;
            echo number_format($gpercent);
            $bpercent = 100 - number_format($gpercent);
        }
        ?>
        <?php
        $sql = "SELECT * FROM userregister where county='" . $_SESSION["username"] . "'";
        if ($result = mysqli_query($db, $sql)) {
            $rowcount = mysqli_num_rows($result);
        }
        ?>
       
      

        <?php

        $records = mysqli_query($db, "select * from userregister,tallyteachers where userregister.username=tallyteachers.username and userregister.county='" . $_SESSION["username"] . "'"); // fetch data from database
        $tsum = 0;
        while ($data = mysqli_fetch_array($records)) {
            $total = $data['male'] + $data['female'];
            $tsum += $total;
        }
        ?>
        <div class="row" style="margin-left:18%; margin-top:5%;">
            <div class="col-md-3">
                <div class="panel panel-box clearfix">
                    <div class="panel-value pull-right" style="width: auto;">
                        <h2 class="margin-top"> </h2>
                        <p class="text-muted">User</p>
                        <?php
                        $q = "SELECT fname, lname, username , address, email FROM subadmin WHERE username= '" . $_SESSION["username"] . "'";
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
                        <h2 class="margin-top"> <?php echo $rowcount; ?> </h2>
                        <p class="text-muted">total users</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row" style="margin-left:18%; margin-top:4%;">
            <div class="col-md-3">
                <div class="panel panel-box clearfix">
                    <div class="panel-icon pull-left bg-blue">
                        <i class="glyphicon glyphicon-list"></i>
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> <?php echo $sum; ?> </h2>
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
                        <h2 class="margin-top"> <?php echo $tsum; ?> </h2>
                        <p class="text-muted">teachers</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-box clearfix">
                    <div class="panel-icon pull-left bg-blue">
                        <i class="glyphicon glyphicon-list"></i>
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> <?php echo number_format($gpercent); ?> </h2>
                        <p class="text-muted">girls percent</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-box clearfix">
                    <div class="panel-icon pull-left bg-blue">
                        <i class="glyphicon glyphicon-list"></i>
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> <?php echo $bpercent; ?> </h2>
                        <p class="text-muted">boys percent</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row" style="margin-left:18%; margin-top:4%;">
            <div class="col-md-3">
                <div id="chart_container"></div>
            </div>
        </div>
    <?php endif ?>

</body>

</html>