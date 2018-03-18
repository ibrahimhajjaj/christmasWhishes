<?php

include_once ('include/init.php');
include_once ('include/init.php');



if (isset($_SESSION['login_user']) ){

    $wishId = $_GET['id'];
    $query = "SELECT * FROM gclwish WHERE wishID= ".$wishId." ";
    $result = mysqli_query($connect, $query);
    $wishData =  mysqli_fetch_assoc($result);



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
         <form id="addwish" action="include/updatePost.php" method="post" enctype="multipart/form-data">
             <input type="hidden" name="id" value="<?=$wishId;?>" />
        	         	
        	<div>
        	  <label for="wishName">Wishlist Item:</label>
            <input name="wishName" id="item" type="text" size="50" maxlength="255" value="<?php echo $wishData['wish'] ?>"/>
        	</div>      	
        	
          <div>
            <label for="priority">Priority:</label>
            <input name="priority" id="completed" type="range" min="1" max="5" value="<?php echo $wishData['priority'] ?>" />
          </div>
          
           <div>        
             <label for="descr" class="tarealabel">Description:</label>
        		<textarea name="descr" id="descr" cols="55" rows="15">

                    <?php echo $wishData['wishDesc'] ?>
                </textarea>
           </div>
           
          <div>
            <label for="link">Weblink:</label>
        		<input name="link" id="link" type="url" size="50" value="<?php echo $wishData['weblink'] ?>"/>
          </div>
           
          
           <div>
              <label for="wishImage">Upload Picture</label>
              <input type="hidden" name="MAX_FILE_SIZE" value ="2097152">
              <input name="wishImage" id="wishimage" type="file">
           </div>
                   
          <div id="buttons">
            <button type="submit" name="submit">Save Wish</button>
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

    <?php
}
else {
    header('Location: login.php');
}
?>