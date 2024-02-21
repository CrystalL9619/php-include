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

    $query = "INSERT INTO students (fname, lname, marks, grade,imageURL) VALUES (
        '" . mysqli_real_escape_string($connect, $fname) . "',
        '" . mysqli_real_escape_string($connect, $lname) . "',
        '" . mysqli_real_escape_string($connect, $marks) . "',
        '" . mysqli_real_escape_string($connect, $grade) . "',
        '" . mysqli_real_escape_string($connect, $imageURL) . "'
        )";
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

