<?php
include 'adminserver.php';
$id =$_GET['id'];

$sql ="SELECT * FROM leaveapp WHERE ('id=$id');";
$res =mysqli_query($db,$sql);
if(mysqli_num_rows($res)>0){
    $row =mysqli_fetch_assoc($res);
    if($id == $row['id']){{
        echo"already copied";
    }}
}
else{$query=mysqli_query($db, "INSERT INTO leaveaccepted
    SELECT *FROM leaveapp WHERE  id= $id");
    echo'<script>alert("successfully saved")</script>';
    header('location: leave.php');
    }
?>