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
    echo "<div class=entries>";    
    echo "<center><h3>Logged out successfully</h3></center><br>"; 
    session_start();
    session_destroy(); 
    echo "</div>";   
 
?>
 
</body>
</html>