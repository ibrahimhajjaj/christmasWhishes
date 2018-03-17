<?php
include_once ('include/config.php');
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
         <?php echo $errorMsg ?>
         <form id="editaccount" action="include/update.php" method="post">
         <fieldset>
          	<legend>User Details


          	<div>
          	  <label for="name" class="first">Name: </label>
              <input name="name" id="name" type="text" size="25" maxlength="50" required value="<?php echo $user_data["name"] ?>"/>
          	</div>
             <div>
                <label for="email">Email:</label>
                <input name="email" id="email" type="text" size="25" maxlength="100"  required value="<?php echo $user_data["email"] ?>"/>
            </div>
          	

            <div>
          	  <label for="username">User Name:</label>
              <input name="username" id="username" type="text" size="25" maxlength="25" required value="<?php echo $user_data["username"] ?>"/>
          	</div>      	
          	
     	
          	<p class="note">To leave password the same, leave fields blank</p>
             <div>

          	  <label for="password">Password:</label>
              <input name="password" id="password" type="password" size="25"  maxlength="100"/>
              <span class="note">Passwords must be blah blah blah</span>
            </div> 
            
             	
            <div>
          	  <label for="password2">Re-Enter Password:</label>
              <input name="password2" id="password2" type="password" size="25"  maxlength="100"/>
            </div>                 
          </fieldset>
             
             
          <fieldset>
          	<legend>List Details</legend>
            <div>
          	  <label for="title" class="first">Grownup Christmas List Title:</label>
              <input name="title" id="title" type="text" size="25" maxlength="100" required value="<?php echo $user_data["listTitle"] ?>"/>
          	</div>

          	<div>
          	  <label for="fromdate">List available from:</label>
              <input name="fromDate" id="fromdate" type="date" required  value="<?php echo $user_data["availFrom"] ?>"/>
          	</div>   
            <div>
          	  <label for="todate">List available to:</label>
              <input name="toDate" id="todate" type="date" required  value="<?php echo $user_data["availTo"] ?>"/>
          	</div>
           	<p class="note">To leave password the same, leave field blank</p>
          	<div>

          	  <label for="lPassword">List Password:</label>
              <input name="lPassword" id="lpassword" type="password" size="25"  maxlength="100"/>
              <span class="note">A password to provide people so they can see/remove things from your list</span>
            </div>     	  
          </fieldset>
           
                           
          <div id="buttons">
            <button type="submit" name="submit">Save Account Info</button>
            <button type="reset" name="reset">Reset</button>
            <button type="button" name="deleteaccount" id="deleteaccount">Delete Account</button>
           </div>
        </form>
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