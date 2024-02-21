<?php
include('../includes/functions.php');
include('../includes/connect.php');
if (isset($_POST['addUser'])) {
    $query = 'INSERT INTO users(name,email,password) VALUES(
        "' . mysqli_real_escape_string($connect, $_POST['name']) . '",
        "' . mysqli_real_escape_string($connect, $_POST['email']) . '",
        "' . md5($_POST['password']) . '" )';
    mysqli_query($connect, $query);
    set_message('success');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Catalog</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include '../reusables/nav.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-5 mt-4 mb-4">Manage User</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="POST" action="">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">

                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">

                    </div>
                    <!--name is important, it should be the same as updateStudent.php line 3-->
                    <button type="submit" name="addUser" class="btn btn-primary">Update Student </button>

                </form>
            </div>
        </div>
    </div>


</body>

</html>