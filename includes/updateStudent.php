<?php
include("../includes/connect.php");
if (isset($_POST['submit'])) {
    $id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $marks = $_POST["marks"];
    $grade = $_POST["grade"];
    $imageURL = $_POST["imageURL"];
    //connection string 

    $query = "UPDATE students SET fname='$fname', lname='$lname', marks='$marks', grade='$grade', imageURL='$imageURL' WHERE id='$id'";
    $student = mysqli_query($connect, $query);
    if ($student) {
        echo "Success";
    } else {
        echo "Error" . mysqli_error($connect);
    }
} else {
    echo "You shouldn't be here!";
}
mysqli_close($connect);
