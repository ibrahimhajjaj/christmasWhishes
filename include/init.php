<?php
include_once ("config.php");

global $errorMsg;

$errorMsg = "";

session_start();

if (isset($_SESSION['login_user'])){

    $query = "SELECT * FROM gclusers WHERE userID=" .$_SESSION['login_id']." ";
    $result = mysqli_query($connect, $query);
    $user_data =  mysqli_fetch_assoc($result);

}

