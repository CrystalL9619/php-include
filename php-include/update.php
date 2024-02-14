<?php
$id = $_GET['id'];
include("./includes/connect.php");
$query = "SELECT * FROM students WHERE `id` = '$id'";
$student = mysqli_query($connect, $query);
$result = $student->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-5 mt-4 mb-4">Update Student</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="POST" action="includes/updateStudent.php">
                    <!--name is important, it should be the same as updateStudent.php line 4-->
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" aria-describedby="First Name"
                            value="<?php echo $result['fname']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" aria-describedby="Last Name"
                            value="<?php echo $result['lname']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="marks" class="form-label">Marks</label>
                        <input type="text" class="form-control" id="marks" name="marks" aria-describedby="Marks"
                            value="<?php echo $result['marks']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="grade" class="form-label">Grade</label>
                        <input type="text" class="form-control" id="grade" name="grade" aria-describedby="Grade"
                            value="<?php echo $result['grade']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="imageURL" class="form-label">ImageURL</label>
                        <input type="text" class="form-control" id="imageURL" name="imageURL"
                            aria-describedby="ImageURL" value="<?php echo $result['imageURL']; ?>">
                    </div>
                    <!--name is important, it should be the same as updateStudent.php line 3-->
                    <button type="submit" name="submit" class="btn btn-primary">Update Student </button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>