<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="back">
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, create_datetime)
                     VALUES ('$username', '" . md5($password) . "',  '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo " <div class='alert alert-success' role='alert'>
                    <h3>You are registered successfully.</h3><br/>
                    <p class='link'>Click here to <a href='index.php'>Login</a></p>
                    </div>";
        } else {
            echo "<div class='alert alert-danger'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                  </div>";
        }
    } 
?>
    <div class="flex" >
        <div class="form-container">
            <h2>Registration</h2>
            <form id="registration-form">
                <label for="username">New Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" onclick="registerUser()">Register</button>
            </form>
            <p>Already have an account? <a href="index.php">Login</a></p>
        </div>
    </div>

    <<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
