<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Catalog</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'reusables/nav.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-5 mt-4 mb-4">Student Catalog</h1>
            </div>
        </div>
        <div class="row">
            <?php
            include("./includes/connect.php");
            $query = 'SELECT id, fname, lname, marks, imageURL FROM students';
            $result = mysqli_query($connect, $query);
            if (!$result) {
                die('Query failed: ' . mysqli_error($connect));
            }

            if (mysqli_num_rows($result) == 0) {
                echo '<div class="col">No students found.</div>';
            }

            while ($student = mysqli_fetch_assoc($result)) {

                echo '<div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="' . $student['imageURL'] . '" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">' . $student['fname'] . ' ' . $student['lname'] . '</h5>
                                <p class="card-text">Marks: ' . $student['marks'] . '</p>
                            </div>
                            <div class="card-footer">
                                <form method="GET" action="includes/deleteStudent.php">
                                    <input type="hidden" name="id" value="' . $student['id'] . '">
                                    <button type="submit" name="delete">DELETE</button>
                                </form>
                                <form method="GET" action="update.php">
                                    <input type="hidden" name="id" value="' . $student['id'] . '">
                                    <button type="submit" name="update">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>';

            }

            mysqli_free_result($result);
            mysqli_close($connect);
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>