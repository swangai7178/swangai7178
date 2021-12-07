<?php include('adminserver.php'); ?>
<!DOCTYPE html>

<head>
    <title>walimu tech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/sidenav.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <?php include('header.php'); ?>
    <?php if (isset($_SESSION['username'])) : ?>
        <?php include('sidenav.php'); ?>
        <div class="row" style="margin-left:18%; margin-top:5%;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <strong>
                            <span class="glyphicon glyphicon-th"></span>
                            <span>leave application</span>
                        </strong>
                    </div>
                    <table class=" table table-dark table-hover">

                        <tr>
                            <th>Sr.No.</th>
                            <th>school name</th>
                            <th>tsc number</th>
                            <th>county</th>
                            <th>reason</th>
                            <th>start</th>
                            <th>stop</th>
                            <th>action</th>
                        </tr>

                        <?php

                        $records = mysqli_query($db, "SELECT * from leaveapp WHERE county= '" . $_SESSION["username"] . "'"); // fetch data from database

                        while ($data = mysqli_fetch_array($records)) {
                        ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['tsnumber']; ?></td>
                                <td><?php echo $data['county']; ?></td>
                                <td><?php echo $data['reason']; ?></td>
                                <td><?php echo $data['start']; ?></td>
                                <td><?php echo $data['end']; ?></td>
                                <td>
                                    <a href="leaveapprove.php?id=<?php echo $data['id']; ?>">accept</a>
                                    <a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </table>



                <?php endif ?>
                </div>
</body>