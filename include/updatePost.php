<?php
include_once ('config.php');
include_once ('init.php');

if (isset($_POST["submit"])) {

    $wishId = $wishName = mysqli_real_escape_string($connect, $_POST['id']);


    $query = "SELECT * FROM gclwish WHERE wishID= " . $wishId . " ";
    $result = mysqli_query($connect, $query);
    $wishData = mysqli_fetch_assoc($result);


    $wishName = mysqli_real_escape_string($connect, $_POST['wishName']);

    $priority = mysqli_real_escape_string($connect, $_POST['priority']);
    $descr = mysqli_real_escape_string($connect, $_POST['descr']);
    $link = mysqli_real_escape_string($connect, $_POST['link']);


    $sql = "UPDATE gclwish SET wish = ? , priority = ? , wishDesc = ? , weblink = ?  
         WHERE wishID = " . $wishId . " ";




    $stmt = mysqli_stmt_init($connect);


    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo("Sql Error");

    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $wishName, $priority, $descr, $link
             );
        mysqli_stmt_execute($stmt);
        $message = "Post Has been updated";
        header("location:../index.php?message=".urlencode($message));
    }
}

