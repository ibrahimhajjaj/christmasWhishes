<?php
include("include/config.php");
include_once ('include/init.php');



$str = "";
 if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {

        $errorMsg = "Username or Password is invalid";
    } else {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

//        $username = stripslashes($username);
//        $password = stripslashes($password);

        $username = mysqli_real_escape_string($connect, $username);
        $password = mysqli_real_escape_string($connect, $password);

        $query = "SELECT userID,name, email FROM gclusers WHERE userPassword='$password' AND username='$username'";
        $result = mysqli_query($connect, $query);
        $rows = mysqli_num_rows($result);
        $user_data =  mysqli_fetch_assoc($result);
//        die(print_r($user_data));
        if ( $rows > 0 ) {
            $_SESSION['login_user'] = $user_data["name"];
            $_SESSION['login_id'] = $user_data["userID"];

            header("location: index.php");

        } else {
            $errorMsg = "Username or Password is invalid";
        }
     }
}
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
          <div>
              <?php echo $errorMsg;?>
              <?php echo $str;?>

          </div>
        <form id="login" action="" method="post">
           <fieldset>
          	<legend>Login Credentials</legend>
           	
          	<div>
          	  <label for="username" class="first">User Name:</label>
              <input name="username" id="username" type="text" size="25" maxlength="100"/>
          	</div>      	
          	
            <div>
          	  <label for="password">Password:</label>
              <input name="password" id="password" type="password" size="25" maxlength="100" />
            </div>
            <div>
          	  <label for="password">Remember Me:</label>
              <input name="remember" id="remember" type="checkbox" value="1" />
            </div>
            <a href="password.html">Forgot password</a>
           </fieldset>
           <div id="buttons">
            <button type="submit" name="submit">Login</button>
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