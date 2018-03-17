<?php
include_once ('include/init.php');


if (isset($_SESSION['login_user']) ){

//die("aaa");


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


      
          <main id="display">
        <img src="img/car.jpg" alt=""/>
        <h1>'54 Convertible - Light Blue</h1>
        <h2>Priority - 1</h2>
        <p>According to Eartha Kitt's follow-up song, this is actually a 1954 light blue Cadillac .</p>
        <a href="https://www.thehairpin.com/2013/12/the-true-cost-of-santa-baby/">https://www.thehairpin.com/2013/12/the-true-cost-of-santa-baby/</a>
        
      </main>
      
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