<?php
include("include/config.php");
include_once ('include/init.php');


session_destroy();

header("Location:index.php");

