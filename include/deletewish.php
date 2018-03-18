<?php
/**
 * Created by PhpStorm.
 * User: IBRAHIM HAJJAJ
 * Date: 3/17/2018
 * Time: 11:33 PM
 */

include_once ('config.php');
include_once ('init.php');
$currunt_user = $user_data['userID'];

$fk_userID = mysqli_query($connect,"SELECT fk_userID FROM `gclwish`") ;

$row = mysqli_fetch_array($fk_userID);

if (isset($_GET['id'])) {
    if ($currunt_user != $fk_userID){
        $errorMsg = " U ONly Can Delete What's belong to U";
        header("location:../index.php?message=".urlencode($errorMsg));


    }
     else {

             $wishId = $_GET['id'];
             $sql_delete = "DELETE FROM `gclwish` WHERE wishID = $wishId";
             $result = mysqli_query($connect, $sql_delete);
             if (mysqli_affected_rows($connect) > 0) {
                 header('location:../index.php');
             } else {
                 hheader('location:../index.php');
             }
     }

 }


