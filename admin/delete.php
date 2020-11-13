<?php
include("../init.php");

$delete = $_GET['delete'];
$query = $source->Query("DELETE FROM user where id=?",[$_GET['delete']]);
if($query){
    $_SESSION['delete_user'] = "User Delete Successfully";
    header("location:users.php");
}else{
    $_SESSION['delete_user'] = "Failed To Delete";
    header("location:users.php");
}
?>