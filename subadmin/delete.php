<?php
include('adminserver.php');
$id = $_GET['id'];
$sql = "DELETE FROM `leaveapp` WHERE id='$id'";

if (mysqli_query($db, $sql)) {
  header('location: leave.php');
} else {
  echo "Error deleting record: " . mysqli_error($db);
}

mysqli_close($db);
?>
