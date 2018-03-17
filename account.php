<?php
include_once ('include/config.php');
include_once ('include/init.php');


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

          <?php echo  $errorMsg ?>
        <form id="account" action="include/addUser.php" method="post">
         <fieldset>
          	<legend>User Details</legend>
           	
          	<div>
          	  <label for="name" class="first">Name:</label>
              <input name="name" id="name" type="text" size="25" maxlength="50" placeholder="Santa Claus" required/>
          	</div> 
          
            <div>
          	  <label for="email">Email:</label>
              <input name="email" id="email" type="text" size="25" maxlength="100" placeholder="santa@northpole.org" required/>
          	</div>      	
          	

            <div>
          	  <label for="username">User Name:</label>
              <input name="username" id="username" type="text" size="25" maxlength="25" required/>
          	</div>      	
          	
     	
          	
            <div>
          	  <label for="password">Password:</label>
              <input name="password" id="password" type="password" size="25"  maxlength="100" required/>
              <span class="note">Passwords must be blah blah blah</span>
            </div> 
            
             	
            <div>
          	  <label for="password2">Re-Enter Password:</label>
              <input name="password2" id="password2" type="password" size="25"  maxlength="100" required/>
            </div>                 
          </fieldset>
             
             
          <fieldset>
          	<legend>List Details</legend>
            <div>
          	  <label for="title" class="first">List Title:</label>
              <input name="title" id="title" type="text" size="25" maxlength="100" required/>
          	</div> 
          
          	<div>
          	  <label for="fromDate">Available From:</label>
              <input name="fromDate" id="fromdate" type="date" required />
          	</div>   
          		<div>
          	  <label for="toDate">Available To:</label>
              <input name="toDate" id="todate" type="date" required />
          	</div> 
          	<div>
          	  <label for="lPassword">List Password:</label>
              <input name="lPassword" id="lpassword" type="password" size="25"  maxlength="100" required/>
              <p class="note">A password provided others so they can see/remove things from your list</p>
            </div>       	  
          </fieldset>
           
                           
          <div id="buttons">

            <button type="submit" name="submit">Save Account Info</button>
            <button type="reset" name="reset">Reset</button>
           </div>
        </form>
      </main>
      
      <footer>
        &copy; Jamie Mitchell - COIS 3420 Winter 2018
      </footer>
      
    </div>
  </body>
</html>

