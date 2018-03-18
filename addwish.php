<?php

include_once ('include/init.php');

if (isset($_SESSION['login_user']) ) {

//die("aaa");

    if (isset($_POST["submit"])) {


        $userIdForThisWish = $user_data['userID'];
        $wishName = mysqli_real_escape_string($connect, $_POST['wishName']);
        $priority = mysqli_real_escape_string($connect, $_POST['priority']);
        $link = mysqli_real_escape_string($connect, $_POST['link']);
        $descr = mysqli_real_escape_string($connect, $_POST['descr']);
        $wishImage = mysqli_real_escape_string($connect, $_FILES['wishImage']['name']);


            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["wishImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["wishImage"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            if ($_FILES["wishImage"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "Sorry, only JPG, PNG, jpeg & GIF files are allowed.";
                $uploadOk = 0;
            }
             if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
             } else {
                if (move_uploaded_file($_FILES["wishImage"]["tmp_name"],  $target_file)) {
                    echo "The file " . basename($_FILES["wishImage"]["name"]) . " has been uploaded.";


                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }



        mysqli_query($connect,
            "
INSERT INTO `gclwish` 
(`wishID`, `fk_userID`, `wish`, `priority`, `wishDesc`, `weblink`, `filepath`, `bought`) VALUES 
(NULL , '$userIdForThisWish', '$wishName', '$priority', '$descr', '$link', '$wishImage','0');


");
}
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
         <form id="addwish" action="" method="post" enctype="multipart/form-data">
          
        	         	
        	<div>
        	  <label for="wishName">Wishlist Item:</label>
            <input name="wishName" id="item" type="text" size="50" maxlength="255"/>
        	</div>      	
        	
          <div>
            <label for="priority">Priority:</label>
            <input name="priority" id="completed" type="range" min="1" max="5" value="1" />
          </div>
          
           <div>        
             <label for="descr" class="tarealabel">Description:</label>
        		<textarea name="descr" id="descr" cols="55" rows="15"></textarea>
           </div>
           
          <div>
            <label for="link">Weblink:</label>
        		<input name="link" id="link" placeholder="www.onlinestore.com" type="url" size="50"/>
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