<?php
include 'DBController.php';
$db_handle = new DBController();
$countryResult = $db_handle->runQuery("SELECT DISTINCT username FROM userregister where county= '" . $_SESSION["username"] . "' ORDER BY username ASC ");
?>
<html>


<!DOCTYPE html>

<head>
    <title>walimu tech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/sidenav.css" />
    <link rel="stylesheet" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <header id="header">
        <div class="logo pull-left">
            <h2>homepage</h2>
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
                        <a href="county schools.php?logout='1'" style="color:red;">logout</a>
                    <?php endif ?>
                    </li>

                </ul>
                </li>
                </ul>
            </div>
        </div>
    </header>




    <?php if (isset($_SESSION['username'])) : ?>
        <?php include('sidenav.php'); ?>
        <div class="row" style="margin-top:5%;">
            <form method="POST" name="search" action="county schools.php">
                <div id="demo-grid">

                    <select id="Place" name="username[]" multiple="multiple">
                        <option value="0" selected="selected">Select school</option>
                        <?php
                        if (!empty($countryResult)) {
                            foreach ($countryResult as $key => $value) {
                                echo '<option value="' . $countryResult[$key]['username'] . '">' . $countryResult[$key]['username'] . '</option>';
                            }
                        }
                        ?>
                    </select><br> <br>
                    <button id="Filter">Search</button>
                </div>


        </div>
        </form>
        <?php
        if (!empty($_POST['username'])) {
        ?>
            <div class="row" style="margin-left:18%;">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <strong>
                                <span class="glyphicon glyphicon-th"></span>
                                <span>students</span>
                            </strong>
                        </div>
                        <table class=" table table-dark table-hover">

                            <thead>
                                <tr>
                                    <th><strong>sub county</strong></th>
                                    <th><strong>zone</strong></th>
                                    <th><strong>kneccode</strong></th>
                                    <th><strong>nemiscode</strong></th>
                                    <th><strong>total classes</strong></th>
                                    <th><strong>size land</strong></th>
                                    <th><strong>state</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from additional";
                                $i = 0;
                                $selectedOptionCount = count($_POST['username']);
                                $selectedOption = "";
                                while ($i < $selectedOptionCount) {
                                    $selectedOption = $selectedOption . "'" . $_POST['username'][$i] . "'";
                                    if ($i < $selectedOptionCount - 1) {
                                        $selectedOption = $selectedOption . ", ";
                                    }

                                    $i++;
                                }
                                $query = $query . " WHERE username in (" . $selectedOption . ")";

                                $result = $db_handle->runQuery($query);
                            }
                            if (!empty($result)) {
                                foreach ($result as $key => $value) {
                                ?>
                                    <tr>
                                        <td>
                                            <div class="col" id="user_data_1"><?php echo $result[$key]['subcounty']; ?></div>
                                        </td>
                                        <td>
                                            <div class="col" id="user_data_2"><?php echo $result[$key]['zone']; ?> </div>
                                        </td>
                                        <td>
                                            <div class="col" id="user_data_3"><?php echo $result[$key]['kneccode']; ?> </div>
                                        </td>
                                        <td>
                                            <div class="col" id="user_data_3"><?php echo $result[$key]['nemiscode']; ?> </div>
                                        </td>
                                        <td>
                                            <div class="col" id="user_data_3"><?php echo $result[$key]['noclass']; ?> </div>
                                        </td>
                                        <td>
                                            <div class="col" id="user_data_3"><?php echo $result[$key]['size']; ?> </div>
                                        </td>
                                        <td>
                                            <div class="col" id="user_data_3"><?php echo $result[$key]['state']; ?> </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    <?php
                            }
                    ?>
                <?php endif ?>

</body>

</html>