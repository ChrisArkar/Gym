<html>
<head>
           <meta charset = 'utf-8'>
           <title>View Database Record</title>
           <link rel="stylesheet" type="text/css" href="TStyle.css"/>
           <script language="javascript" type="text/javascript" src="Special.js">
           </script>
</head>
<body class="home">
<center>
<img src="logo2.png" margin="auto" width="370px" height="110px"></img>
<p>
<nav>
   <div class="topnav" id="myTopnav">
        <a href="AdminView.php">View Members</a>
      <a href="AdminAdd.php">Add New Member</a>
      <a href="AdminEdit.php">Edit Member</a>
      <a href="AdminDelete.php">Delete Member</a> 
      <a href="Log_out.php">Log Out</a>     
   </div>
</nav>
</p>
</center>
<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "tennisdb";
$table_name = "member";
$connect = mysqli_connect($host,$user,$passwd,$database) 
            or die("could not connect to database");

$query = "SELECT * FROM $table_name";
mysqli_select_db($connect,$database);
$result = mysqli_query($connect,$query);

echo "<div class=entries>";
echo "<h1 align=center>Member List</h1>";

if ($result) {
    print "<table align=center border=1>";
    print "<th>Member_id<th>Name<th>Student_ID<th>Phone_No<th>EMail<th>Gender";
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
    print "<tr>";
     foreach ($row as $field) 
     {
       print "<td>$field</td> ";
     }
     print "</tr>";
    }
}
else 
{ 
    die ("Query=$query failed!"); 
}
echo "</div>" ;
mysqli_close($connect);
?>
</body>
</html>