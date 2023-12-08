<!DOCTYPE html>
<html>
<head>
           <meta charset = 'utf-8'>
           <title>TMC Student Club</title>
          <link rel="stylesheet" type="text/css" href="TStyle.css"/>
          <style>  
             .error {color: #FF0001;}  
          </style>          
</head>

<body class="home">
<?php
$nameErr = $sidErr = $emailErr = $contactErr = $genderErr = "";  
$name = $sid = $email = $contact = $gender = "";  
  
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
    //String Validation  
        if (empty($_POST["fname"])) 
        {  
             $nameErr = "Name is required";  
        } else 
        {  
            $name = input_data($_POST["fname"]);  
                // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                    $nameErr = "Only alphabets and white space are allowed";  
            }  
        } 
        
        if (empty($_POST["ssid"])) {  
            $sidErr = "Student id is required";  
        } 
        else{
            $sid=$_POST["ssid"];
        }   
        
        //Email Validation   
        if (empty($_POST["email"])) {  
                $emailErr = "Email is required";  
        } else {  
                $email = input_data($_POST["email"]);  
                // check that the e-mail address is well-formed  
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                    $emailErr = "Invalid email format";  
                }  
        }    
        //phone Number Validation  
        if (empty($_POST["telno"])) {  
                $contactErr = "Mobile no is required";  
        } else {  
                $contact = input_data($_POST["telno"]);  
                // check if mobile no is well-formed  
                if (!preg_match ("/^[0-9]*$/", $contact) ) {  
                    $contactErr = "Only numeric value is allowed.";  
                    } 
        }  
        if (empty ($_POST["gender"])) {  
            $genderErr = "Gender is required";  
         } else {  
            $gender = input_data($_POST["gender"]);  
        }  
    }
    function input_data($data) {  
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);  
        return $data;  
      }  
      ?>
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

<div class="entries">
<h1 align="center">Registration Form</h1>
</br>
<center><span class = "error">* required field </span></center>
<form name="registerForm" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<table border=0 cellpadding=5 align="center">
<tr>
   <td>Full name</td>
   <td><input type="text" name="fname" size="30">
       <span class="error">* <?php echo $nameErr; ?> </span></td>
</tr>
<tr>
<td>Student ID :</td>
<td><input type="text" name="ssid" size="30">
    <span class="error">* <?php echo $sidErr; ?> </span></td></tr>
<tr>
   <td>Contact Non:</td>
   <td><input type="text" name="telno" size="30">
   <span class="error">* <?php echo $contactErr; ?> </span></td>
</tr>
<tr>
    <td>E-Mail Address:</td>
    <td><input type="text" name="email" size="30">
    <span class="error">* <?php echo $emailErr; ?></span></td>
</tr>
<tr>
     <td>Gender</td>
     <td><input type="radio" name="gender" value="Male" >Male
             <input type="radio" name="gender" value="Female">Female
             <span class="error">* <?php echo $genderErr; ?></span>
     </td>
</tr>
<tr>
    <td colspan=2 style="text-align:center">
    <input type="submit" name="submit" value="submit"><input type="reset" value="Reset Form">
    </td>
</tr>
</table>
</form>
<?php  
    if(isset($_POST['submit'])) 
    { 
        
    if($nameErr=="" && $sidErr=="" && $emailErr=="" && $contactErr=="" && $genderErr=="") {
      $host = "localhost";
      $user = "root";
      $passwd = "";
      $database = "tennisdb";
      $table_name = "member";

       $connect = mysqli_connect($host,$user,$passwd,$database) 
       or die("could not connect to database");

      $sql="INSERT INTO $table_name(name,sid,telno,email,gender)
      VALUES('$_POST[fname]','$_POST[ssid]','$_POST[telno]',
       '$_POST[email]','$_POST[gender]')";

       if (!mysqli_query($connect,$sql))
       {
           die('Error: ' . mysqli_error($connect));
       }
       else{       
       echo "<center>Successfully added</center>";       
       }
       mysqli_close($connect);    
   }
   else{      
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
       } 
   }
?>
</div>
</body>
</html>




