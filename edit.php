<?php include "server.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db, "SELECT * FROM students where id='$id'"); 

$data = mysqli_fetch_array($qry); 

if (isset($_POST['update'])) 
{
    $username = $_POST['username'];
    $boys = $_POST['boys'];
    $girls = $_POST['girls'];

    $edit = mysqli_query($db, "update students set username='$username', boys='$boys', girls='$girls' where id='$id'");

    if ($edit) {
        mysqli_close($db);
        header("location:students.php"); 
        exit;
    } else {
        echo "no records found";
    }
}
?>

<h3>Update Data</h3>

<form method="POST">
    <input type="text" name="username" value="<?php echo $data['username'] ?>" placeholder="Enter Full Name" Required>
    <input type="text" name="boys" value="<?php echo $data['boys'] ?>" placeholder="Enter the number of boys" Required>
    <input type="text" name="girls" value="<?php echo $data['girls'] ?>" placeholder="Enter the number of boys" Required>
    <input type="submit" name="update" value="Update">
</form>