<?php
/**
 * Created by PhpStorm.
 * User: IBRAHIM HAJJAJ
 * Date: 3/17/2018
 * Time: 11:38 AM
 */

include_once ('config.php');

$name = mysqli_real_escape_string($connect,$_POST['name']);
$email =  mysqli_real_escape_string($connect,$_POST['email']);
$username =  mysqli_real_escape_string($connect,$_POST['username']);
$password =  mysqli_real_escape_string($connect,md5($_POST['password']));
$title  =  mysqli_real_escape_string($connect,$_POST['title']);
$fromDate =  mysqli_real_escape_string($connect,$_POST['fromDate']);
$toDate  =  mysqli_real_escape_string($connect,$_POST['toDate']);
$lPassword   =  mysqli_real_escape_string($connect,md5($_POST['lPassword']));

$sql = " INSERT INTO `gclusers` (`userID`,`name`, `email`,`username`, `userPassword`,`listTitle`,`availFrom`, `availTo`, `listPassword`)
             VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?);";

$stmt = mysqli_stmt_init($connect);

if(!mysqli_stmt_prepare($stmt,$sql)){
    echo ("Sql Error");

}else{
    mysqli_stmt_bind_param($stmt,"ssssssss",$name,
    $email,$username,$password,$title,$fromDate,$toDate,$lPassword);
    mysqli_stmt_execute($stmt);

    header("Location:../index.php");
}
