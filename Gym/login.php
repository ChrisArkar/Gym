<html>
<head>
           <meta charset = 'utf-8'>
           <title>Perfect Gym</title>
          <link rel="stylesheet" type="text/css" href="TStyle.css"/>
</head>

<body class="home">
<center>
<img src="GYm logo.png" margin="auto" width="370px" height="110px"></img>
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
</center>
<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "test";
$table_name = "user";

$connect = mysqli_connect($host,$user,$passwd,$database) 
            or die("could not connect to database");

$username = $_POST['username'];  
$password = $_POST['password'];

$sql = "select * from $table_name where uname = '$username' and upwd = '$password'";  
$result = mysqli_query($connect, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result); 

echo "<div class=entries>";              
    if($count == 1){
        session_start();
        //$_SESSION['sid']=$uid;
        $_SESSION['sid']=session_id();      
        header("Location:AdminWelcome.html");       
        }  
        else{  
            echo "<center><h3> Login failed. Invalid username or password.</h3><center>";  
        }
echo "</div>";     
?> 

</body>
</html> 