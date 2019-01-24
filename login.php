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
</style>
<img  src="irctc.png" alt="irctc" width='250' height='200'>
<h1 style="text-align:center;background-color:powderblue;">LOGIN</h1><br><br>

<form method="post">
      <h4 style="text-align:center;">USERNAME &#160
	<input type="  text" name="username" required></h4>
    <h4 style="text-align:center;">    PASSWORD     
    <input type="text" name="password" required></h4 ><br>
      
    <button class="button">submit</button >

</form>
<?php
  SESSION_START();
  if($_SERVER["REQUEST_METHOD"]=="POST"){
	    $user=$_POST['username'];
		$pass=$_POST['password'];
		$conn = mysqli_connect("localhost", "root", "", "mydb");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT username,password,fname FROM login";
  $result=$conn->query($sql);
  if($result->num_rows>0){
      while($row=$result->fetch_assoc())
	  {
        if($user==$row["username"] and $pass==$row["password"])
		{
          
		  $_SESSION['user']=$row["fname"];
		  
		  header("Location:user.php");
        }
		else{
			echo "Information Incorrect";
		}
      }
  }	  
	
  }
  ?>
</html>
</body>  


