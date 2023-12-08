<html>
<head>
           <meta charset = 'utf-8'>
           <title>TMC Tennis Club</title>
          <link rel="stylesheet" type="text/css" href="TStyle.css"/>
</head>

<body class="home">
<center>
<img src="logo2.png" margin="auto" width="370px" height="110px"></img>
<p>
 <nav>
    <div class="topnav" id="myTopnav">
         <a href="THome.html">Home</a>
       <a href="TAbout.html">About Tennis</a>
       <a href="Tphoto.html">Photo Gallery</a>
       <a href="timetable.html">Tennis matches</a>
       <a href="TRegistration.php">Member Registration</a>
       <a href="TLogin.html">Admin Login</a>
    </div>
 </nav>
</p>
</center>
<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "tennisdb";
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