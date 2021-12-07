<?php include('adminserver.php'); ?>
<!DOCTYPE html>

<head>
    <title>walimu tech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/sidenav.css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
        function drawChart() {
            // call ajax function to get sports data
            var jsonData = $.ajax({
                url: "getData.php",
                dataType: "json",
                async: false
            }).responseText;
            //The DataTable object is used to hold the data passed into a visualization.
            var data = new google.visualization.DataTable(jsonData);

            // To render the pie chart.
            var chart = new google.visualization.PieChart(document.getElementById('chart_container'));
            chart.draw(data, {
                width: 400,
                height: 240
            });
        }
        // load the visualization api
        google.charts.load('current', {
            'packages': ['corechart']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);
    </script>
</head>

<body>

    <header id="header">
        <div class="logo pull-left">
            <h2>DASHBOARD</h2>
        </div>
        <div class="header-content">
            <div class="header-date pull-left">
                <strong><?php echo date("F j, Y, g:i a"); ?></strong>
            </div>
            <div class="pull-right clearfix">
                <ul class="info-menu list-inline list-unstyled">
                    <li class="profile">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <p>welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                    </li>
                    <li class="last">
                        <a href="dashboard.php?logout='1'" style="color:red;">logout</a>
                    <?php endif ?>
                    </li>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php?id=<?php echo (int)$user['id']; ?>">
                                <i class="glyphicon glyphicon-user"></i>
                                Profile
                            </a>
                        </li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>




    <?php if (isset($_SESSION['username'])) : ?>
        <?php include('sidenav.php'); ?>
        <div class="row" style="margin-left:19%; margin-top:6%;">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>
                            <span class="glyphicon glyphicon-th"></span>
                            <span>Add New Categorie</span>
                        </strong>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="category.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="category" placeholder="Category Name">
                            </div>
                            <button type="submit" name="add_cat" class="btn btn-primary">Add categorie</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>
                            <span class="glyphicon glyphicon-th"></span>
                            <span>All Categories</span>
                        </strong>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Categories</th>
                                    <th class="text-center" style="width: 100px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $records = mysqli_query($db, "SELECT * from category"); // fetch data from database

                                while ($data = mysqli_fetch_array($records)) {
                                ?>
                                    <tr>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php echo $data['category']; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="edit_categorie.php?id=<?php echo (int)$cat['id']; ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                <a href="delete_categorie.php?id=<?php echo (int)$cat['id']; ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                }
                                    ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            </div>
        <?php endif ?>

</body>

</html>