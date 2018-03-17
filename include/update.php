<?php
include_once ('config.php');
include_once ('init.php');

$name = mysqli_real_escape_string($connect, $_POST['name']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$username = mysqli_real_escape_string($connect, $_POST['username']);

if (empty($_POST['password']) || is_null($_POST['password'])  || !isset($_POST['password']) || $_POST['password'] == "" ){

    $password = $user_data['userPassword'];

}else{

    if ($_POST['password'] != $_POST['password2']){

        $errorMsg = "Make sure both password the same";
        header('location: ../editaccount.php?error='.urlencode($errorMsg));
        die();
    }
    else {

        $password = mysqli_real_escape_string($connect, md5($_POST['password']));

    }

}

$title = mysqli_real_escape_string($connect, $_POST['title']);
$fromDate = mysqli_real_escape_string($connect, $_POST['fromDate']);
$toDate = mysqli_real_escape_string($connect, $_POST['toDate']);

if (empty($_POST['lPassword']) || is_null($_POST['lPassword'])  || !isset($_POST['lPassword']) || $_POST['lPassword'] == "" ){
    $lPassword =  $user_data['listPassword'];

}else{
    $lPassword = mysqli_real_escape_string($connect, md5($_POST['lPassword']));
}



$sql = "UPDATE gclusers SET name = ? , email = ? , username = ? ,userPassword = ? , listTitle = ? ,
                                availFrom = ? , availTo = ? , listPassword = ? WHERE userID = " . $user_data["userID"] . " ";


$stmt = mysqli_stmt_init($connect);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo("Sql Error");

} else {
    mysqli_stmt_bind_param($stmt, "ssssssss", $name, $email, $username, $password,
        $title, $fromDate, $toDate, $lPassword);
    mysqli_stmt_execute($stmt);
    header("location:../index.php");
}
