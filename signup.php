<!DOCTYPE html>
<html>
<body>
<style>
img {
    display:block;
    margin-left: auto;
    margin-right: auto;
}
.button {
    background-color: #4CAF50; /* Green */
    border: 1px solid green;
    color: white;
    padding: 10px 20px;
    margin-left:750px;
    text-decoration: none;
    display: block;
    font-size: 16px;
    cursor: pointer;
    float: left;
}
.text{ 
    
    padding: 5px 20px;
    margin-left:550px;
    text-decoration: none;
    display: block;
    font-size: 16px;
    cursor: pointer;
    float: left;
}  
	
</style>
<img src="train1.png" alt="logo" align="middle" width="1300" height="150"/>
<h1 style="text-align:center;">Sign Up<br></h1>
<form method='post'>
 
    <input type="text" class="text" name="fname" placeholder="First Name"><br><br>
	<input type="text" class="text" name="lname" placeholder="Last Name"><br><br>
	<input type="text" class="text" name="user" placeholder="Username"><br><br>
	<input type="text" class="text" name="mob" placeholder="Mobile No."><br><br>
	<input type="text" class="text" name="pass" placeholder="Password"><br><br>
	<input id="date" class="text" type="date" name="dt" min="2018-06-09" max="2018-09-08" ></h4 ><br><br>
	<input type="submit" class="button" value="Create Account" >
	
 
<?php
if (empty($_POST["fname"])){
  	$nameErr = "Name is required";
     }
else{
	
  $id=$_POST['mob'];
  $user=$_POST['user'];
  $pass=$_POST['pass'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $date=$_POST['dt'];
  $conn =mysqli_connect("localhost", "root", "", "mydb");
  if($conn->connect_error){
	die("connection failed:".$conn->connect_error);
       } 
  	
        $sql="INSERT INTO login ( mob, username, password, fname, lname, date)
        VALUES ('$id','$user','$pass','$fname','$lname','$date')";
if($conn->query($sql)===TRUE)
{
  header("Location:login.php") ;
}
else{
     echo "Something Wrong"	;
      echo $id."<br>".$user."<br>".$pass."<br>".$fname."<br>".$lname."<br>".$date;
    }
}	
?>
</form> 

</body>
</html>