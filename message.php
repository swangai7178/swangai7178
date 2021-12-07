<?php include('server.php'); ?>
<!DOCTYPE html>

<head>
    <title>walimu tech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/sidenav.css" />
</head>

<body>
    <?php if (isset($_SESSION['username'])) : ?>
        <?php include('header.php'); ?>
        <?php include('sidenav.php'); ?>
        <form method="post" action="message.php">
            <div class="container" style="margin-top:5%; margin-left:18%;">
                <h2>Send Message</h2>
                <?php include('errors.php') ?>
                <p id="message"></p>
                <div class="form-group">

                    <label for="email">username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                </div>
                <div class="form-group">
                    <label for="pwd">Mobile No.:</label>
                    <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile No" name="mobile">
                </div>
                <div class="form-group">
                    <label for="comment">Message:</label>
                    <textarea class="form-control" rows="5" id="message" name="message" placeholder="Write Your Message Here...."></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="send" id="send">Send Message</button>

            </div>

        </form>
    <?php endif ?>
</body>

</html>