<?php include "server.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db, "SELECT * FROM tallyteachers where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if (isset($_POST['update'])) // when click on Update button
{
    $username = $_POST['username'];
    $male = $_POST['male'];
    $female = $_POST['female'];

    $edit = mysqli_query($db, "update tallyteachers set username='$username', male='$male', female='$female' where id='$id'");

    if ($edit) {
        mysqli_close($db); // Close connection
        header("location:teachers.php"); // redirects to all records page
        exit;
    } else {
        echo "no records found";
    }
}
?>

<h3>Update Data</h3>

<form method="POST">
    <input type="text" name="username" value="<?php echo $data['username'] ?>" placeholder="Enter Full Name" Required>
    <input type="text" name="male" value="<?php echo $data['male'] ?>" placeholder="Enter the number of males" Required>
    <input type="text" name="female" value="<?php echo $data['female'] ?>" placeholder="Enter the number of females" Required>
    <input type="submit" name="update" value="Update">
</form>