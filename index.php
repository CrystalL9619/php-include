<?php
include('includes/functions.php');
include('includes/connect.php');
if (isset($_POST['login'])) {
    $query = 'SELECT * 
          FROM users
          WHERE email = "' . $_POST['email'] . '"
          AND password = "' . md5($_POST['password']) . '"
          LIMIT 1';
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result)) {
        $record = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $record['id'];
        header('Location: admin/index.php');
        die();
    } else {
        set_message('Incorrect username/password');
        header('Locatiom: index.php');
        die();
    }
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
    <?php include 'reusables/nav.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php echo get_message(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1 class="display-5 mt-4 mb-4">Login</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">

                    </div>
                    <!--name is important, it should be the same as updateStudent.php line 3-->
                    <button type="submit" name="login" class="btn btn-primary">Submit </button>

                </form>
            </div>
        </div>
    </div>


</body>

</html>