<?php
include_once ('include/init.php');


if (isset($_SESSION['login_user']) ){

//die("aaa");

    $wantedWish = $_GET['id'];

    $postDetial = mysqli_query($connect,"SELECT * FROM `gclwish` 
    WHERE wishID = '$wantedWish'") ;




?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Santa Baby-login</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/style.css">    
  </head>
  <body>
    <div id="container">
        <?php include 'include/header.php'; ?>
        <?php

        while ($wishes = mysqli_fetch_assoc($postDetial)){

            echo (
            "        	
                       <main id='display'>
                            <img src='img/$wishes[filepath]' alt=''/>
                            <h1>$wishes[wish]</h1>
                            <h2>Priority - $wishes[priority]</h2>
                            <p>$wishes[wishDesc]</p>
                            <a href='$wishes[weblink]' target='_blank'>$wishes[weblink]</a>
                       </main>
                  "
            );

        }



        ?>


      
      <footer>
        &copy; Jamie Mitchell - COIS 3420 Winter 2018
      </footer>
      
    </div>
  </body>
</html>


    <?php
}
else {
    header('Location: login.php');
}
?>