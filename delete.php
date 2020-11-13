<?php
include("init.php");

$delete = $_GET['delete'];
$query = $source->Query("DELETE FROM event where id=?",[$_GET['delete']]);
if($query){
    $_SESSION['delete'] = "Event Deleted Successfully";
    header("location:viewevent.php");
}else{
    $_SESSION['delete'] = "Failed To Delet";
    header("location:viewevent.php");
}
?>