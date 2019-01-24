<!DOCTYPE html>
<html>
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
c{
    border:1px solid black;
	padding:10px;
}	
.a:link {
    background-color:white;
	
    margin:50px;
    text-decoration: none;
    font-size: 20px;
   
}
.form{
	  background-image:url("train2.jpg");
	  width:100%;
	  height:700px;
	  
}
.input{
	  
	  
	  display:inline;
	  background-color: white; /* Green */
      border: 1px solid light grey;
      padding: 15px 20px;
      text-decoration: none;
      font-size: 13px;
	  height:20px;
	  margin:0 -3px;
}
.button{
	background-color: #4CAF50; /* Green */
    border: 1px solid green;
    color: white;
    padding: 5px 10px;
    margin-left:0px;
    text-decoration: none;
    display:inline;
    font-size: 16px;
    text-align:center;
    margin-top:15;
    
    
}
.button1{
	background-color: #4CAF50; /* Green */
    border: 1px solid green;
    color: white;
    padding: 10px 25px;
    margin-right:20px;
    text-decoration: none;
    display:inline;
    font-size: 16px;
    text-align:center;
    margin-top:15;
    float:right;
    
}
.close{
    background-color: #4CAF50; /* Green */
    border: 1px solid green;
    color: white;
    padding: 10px 25px;
    margin:0 -3px;
    text-decoration: none;
    display:block;
    font-size: 15px;

}
a{
  text-decoration:none;
}  

.dropdown:hover .a {
    background-color: red;
}

div.dropdown {
    display: inline-block;
}


.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	font-size:20px;
}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}
.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
	
</style>
<body>
<img src="rail.png" alt="logo" width="300" height="150">
<div style="border:1px solid black;" >
   <div class="container">
   <a class="a" href="#Popular Trains">Popular Trains</a>
   <a class="a" href="rail1.php">Routes & Planning</a>
   <a class="a" href="#Customer Support">Customer Support</a>
   <a class="a" href="#About">About</a>
   <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Sign In</button>
<?php
/*<!div class="dropdown">
<a href="javascript:void(0)" class="a","dropdown">Sign in</a>
    <div class="dropdown-content">
      <a href="login.php">Log In</a>
      <a href="signup.php">Sign Up</a>
      </div>
    </div>*/
    ?>
	    

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">LOGIN</h4>
        </div>
        <div class="modal-body">
          <img src="irctc.png" width=auto hieght=10 style="margin-left:150px">
         <form method="post">
             <h4 style="text-align:center;">USERNAME &#160
	         <input type="  text" name="username" required></h4>
             <h4 style="text-align:center;">PASSWORD &#160   
             <input type="text" name="password" required></h4 ><br>
             <button class="button1">submit</button ><br>
             <a style="margin-left:452px" href="signup.php" >New User</a>
         <div >
             <button type="button" class="close" data-dismiss="modal">Close</button>
         </div>
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
                      $ch=0;
                  while($row=$result->fetch_assoc())
	               {
                    if($user==$row["username"] and $pass==$row["password"])
		             {
                       $_SESSION['user']=$row["fname"]; 
                       header("Location:user.php");
                       $ch=1;
                    }
                } 
                   
                   if($ch==0){
                    echo "Information Incorrect";
                   }
                
            
                  }	  
	
                }
            
  ?>
        </form>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</div>
<!img src="train2.jpg" width="1320" height="700"> 
<form class="form" method="post" >
 <br><br><br><br><br><br><br><br><br><br> <div style="text-align:center;">
	<input type="text" class="input" name="dep" placeholder="DEPATURE FROM" required>    
    <input type="text" class="input" name="ari" placeholder="ARRIVAL TO" required>
	 <input id="date" class="input" type="date" name="dt" >
    <button class="button" onclick="myfun();">Search Trains <i class="fa fa-search" style="font-size:20px;"></i></button><br><br>
   </div>
   <script>
    function myfun(){
		confirm("Please Sign In");
	}
   </script>
   

</form>

</body>
</html>