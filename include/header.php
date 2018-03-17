<?php

include_once ('init.php');



?>
<header>
    <img src="img/santa.png" width="180" height="200" alt="Santa waving">
    <img src="img/raindeer.png" width="180" height="200" alt="Reindeer waving">

    <h1>My Grown-up Christmas List</h1>
    <h2>Checkin' it Twice</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>

        <?php
        if ( isset($_SESSION["login_user"]) ){
            echo '<li><a href="editaccount.php">Edit Account</a></li>';
        }
        else{
            echo "<li><a href=\"account.php\">Create Account</a></li>";
        }
        ?>


        <?php
        if (isset($_SESSION["login_user"])){
            echo '<li><a href="addwish.php">Add Item</a></li> <li><a href="#">Public List View</a></li>';
            echo '';
        }

        ?>





        <?php
        if (isset($_SESSION["login_user"])){
            echo '<li><a href="logout.php">Logout</a></li>';
        }
        else{
            echo " <li class=\"active\"><a href=\"login.php\">Login</a></li>";
        }
        ?>


    </ul>
</nav>