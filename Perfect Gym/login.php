<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Perfect Gym</title>
    <link rel="stylesheet" type="text/css" href="TStyle.css"/>
</head>
<body class="home">
    <center>
    <img src="GYm logo.png" alt="Gym Logo" width="370px" height="150px">
    </center>
    <p>
        <nav>
            <div class="topnav" id="myTopnav">
                <a href="home.html">Home</a>
                <a href="about.html">About Us</a>
                <a href="contact.html">Contact Us</a>
                <a href="timetable.html">Gym Classes</a>
                <a href="registration.php">Become a Member</a>
                <a href="login.html">Login</a>
            </div>
        </nav>
    </p>
    <div class="entries">
        <?php
        $host = "localhost";
        $user = "root";
        $passwd = "";
        $database = "test";
        $table_name = "user";

        // Establish database connection
        $connect = mysqli_connect($host, $user, $passwd, $database) or die("Could not connect to database");

        // Get user input using mysqli_real_escape_string to prevent SQL injection
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        // Create and execute SQL query
        $sql = "SELECT * FROM $table_name WHERE uname = '$username' AND upwd = '$password'";
        $result = mysqli_query($connect, $sql);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            // Start a session and store session id
            session_start();
            $_SESSION['sid'] = session_id();

            // Redirect to the welcome page
            header("Location: Welcome.html");
        } else {
            // Display error message for unsuccessful login
            echo "<center><h3>Login failed. Invalid username or password.</h3></center>";
        }

        // Close the database connection
        mysqli_close($connect);
        ?>
    </div>
</body>
</html>
