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
      <main>
        <ol>
        	<li>
        	  <a href="wishdetails.html">'54 Convertible - light blue</a>        	  
        	  <a href="checkoff.php?id=" class="button">Checkoff</a>
          </li>
        	<li>
        	  <a href="wishdetails.html">A Yacht</a>
        	  <a href="checkoff.php?id=" class="button">Checkoff</a>
        	</li>
        	<li>
        	  <a href="wishdetails.html" class="checked">The deed to a platinum mine</a>
            <a href="uncheck.php?id=" class="button">Uncheck</a>
        	</li>
        	<li>
        	  <a href="wishdetails.html">A duplex and checks</a>
        	  <a href="checkoff.php?id=" class="button">Checkoff</a>
        	</li>
      	</ol>
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