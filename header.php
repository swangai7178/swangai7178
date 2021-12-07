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
        <h2>teacher tally</h2>
    </div>
    <div class="header-content">
        <div class="header-date pull-left">
            <strong><?php echo date("F j, Y, g:i a"); ?></strong>
        </div>

        <ul class="info-menu list-inline list-unstyled">
            <li class="profile">
                <?php if (isset($_SESSION['username'])) : ?>
                    <a href="recievedmsg.php">messages</a>

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

                            <a href="message.php?logout='1'" style="color:red;"><i class="glyphicon glyphicon-off"></i> logout</a>

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