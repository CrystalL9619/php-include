<?php
include("../includes/connect.php");
if (isset($_POST['submit'])) {
    // print_r($_POST);  
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $marks = $_POST["marks"];
    $grade = $_POST["grade"];
    $imageURL = $_POST["imageURL"];
    //connection string 

    $query = "INSERT INTO students (fname, lname, marks, grade,imageURL) VALUES ('$fname', '$lname', '$marks','$grade','$imageURL')";
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

