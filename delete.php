<?php
include('server.php');
$id = $_GET['id'];
$sql = "DELETE FROM `students` WHERE id='$id'";

if (mysqli_query($db, $sql)) {
  header('location: students.php');
} else {
  echo "Error deleting record: " . mysqli_error($db);
}

mysqli_close($db);
