<?php include('server.php'); ?>
<!DOCTYPE html>

<head>
    <title>register</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="header">
        <h2>registration</h2>
    </div>

    <form method="post" action="register.php">
        <?php include('errors.php') ?>
        <div class="input-group">
            <label>school name</label>
            <input type="text" name="fname" value="<?php echo $fname; ?>">
        </div>
        <div class="input-group">
            <label>head teacher</label>
            <input type="text" name="lname" value="<?php echo $lname; ?>">
        </div>
        <div class="input-group">
            <label>county</label>
            <select class="input group" name="county" style="width:102%; height: 40px;">
                <option disabled selected>-- Select county --</option>
                <?php
                include "server.php";
                $records = mysqli_query($db, "SELECT username From subadmin ");  // Use select query here 

                while ($data = mysqli_fetch_array($records)) {
                    echo "<option value='" . $data['username'] . "'>" . $data['username'] . "</option>";  // displaying data in option menu
                }
                ?>
            </select>
        </div>
        <div class="input-group">
            <label>category</label>
            <select class="input group" name="category" style="width:102%; height: 40px;">
                <option disabled selected>-- Select category--</option>
                <?php
                include "server.php";
                $records = mysqli_query($db, "SELECT category From category ");  // Use select query here 

                while ($data = mysqli_fetch_array($records)) {
                    echo "<option value='" . $data['category'] . "'>" . $data['category'] . "</option>";  // displaying data in option menu
                }
                ?>
            </select>
        </div>
        </div>

        <div class="input-group">
            <label>username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>address</label>
            <input type="text" name="address" value="<?php echo $address; ?>">
        </div>
        <div class="input-group">
            <label>email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>phone</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div class=" input-group">
            <label>password</label>
            <input type="password" name="password">
        </div>

        <div class="input-group">
            <button type="submit" name="register">Register</button>
        </div>
        <p>already a member<a href="login.php">Sign in</a></p>
    </form>
</body>

</html>