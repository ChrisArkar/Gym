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
    echo "<div class=entries>";    
    echo "<center><h3>Logged out successfully</h3></center><br>"; 
    session_start();
    session_destroy(); 
    echo "</div>";   
 
?>
 
</body>
</html>