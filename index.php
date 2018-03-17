<?php
include_once ('include/init.php');


//if (($_SESSION['login_user']) ){
//
////die("aaa");
//
//
//
$userId = $user_data['userID'];
$sql = mysqli_query($connect,"SELECT * FROM `gclwish` 
WHERE fk_userID = '$userId' ORDER BY `wishID` ASC ") ;


//if($sql === FALSE) {
//    die(mysqli_error($connect));
//}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <title>GCL-login</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/style.css">    
  </head>
  <body>
    <div id="container">
        <?php include 'include/header.php'; ?>
         
      <main>
        <ol>
            <?php

            while ($wishes = mysqli_fetch_assoc($sql)){

                echo (
                  "        	
                       <li>
                            <a href='wishdetails.php'> $wishes[wish] </a>
                            <a href='include/deletewish.php?id=$wishes[wishID]' class='button'>Delete</a>
                            <a href='editwish.php?id=$wishes[wishID]' class='button'>Edit</a>
                       </li>
                  "
                );

            }



            ?>
    	</ol>
      </main>
      
      <footer>
        &copy; Jamie Mitchell - COIS 3420 Winter 2018
      </footer>
      
    </div>
  </body>
</html>

<?php
//}
//else {
//    header('Location: login.php');
//}
//?>