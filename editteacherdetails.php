<?php include "server.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db, "SELECT * FROM teachers where id='$id'");

$data = mysqli_fetch_array($qry);

if (isset($_POST['update'])) {
    $username = $_POST['username'];

    $name = $_POST['name'];
    $tsnumber = $_POST['tsnumber'];
    $resident = $_POST['resident'];
    $subject = $_POST['subject'];

    $edit = mysqli_query($db, "update teachers set username='$username', name='$name', tsnumber='$tsnumber', resident='$resident', subject = '$subject' where id='$id'");

    if ($edit) {
        mysqli_close($db);
        header("location: teacher_register.php");
        exit;
    } else {
        echo "no records found";
    }
}
?>

<h3>Update Data</h3>

<form method="POST">
    <input type="text" name="username" value="<?php echo $data['username'] ?>" placeholder="Enter Full Name" Required>
    <input type="text" name="name" value="<?php echo $data['name'] ?>" placeholder="Enter the number of boys" Required>
    <input type="text" name="tsnumber" value="<?php echo $data['tsnumber'] ?>" placeholder="Enter the number of boys" Required>
    <input type="text" name="resident" value="<?php echo $data['resident'] ?>" placeholder="Enter the number of boys" Required>
    <input type="text" name="subject" value="<?php echo $data['subject'] ?>" placeholder="Enter the number of boys" Required>
    <input type="submit" name="update" value="Update">
</form>