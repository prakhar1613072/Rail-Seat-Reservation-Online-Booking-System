<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
 SESSION_START();
 ?>
<style>
c{
    border:1px solid black;
	padding:10px;
}	
.a:link {
    background-color:white;
	
    margin:45px;
    text-decoration: none;
    font-size: 25px;
   
}
form{
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
button{
	background-color: #4CAF50; /* Green */
    border: 1px solid green;
    color: white;
    padding: 15px 32px;
    margin:0 -3px;
    text-decoration: none;
    display:inline;
    font-size: 16px;
    
    
}
a{
  text-decoration:none;
}  

.dropdown:hover .a {
    color:#21F0A4;
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

<a class="a" href="#Popular Trains">Popular Trains</a>
<a class="a" href="rail1.php">Routes & Planning</a>
<a class="a" href="#Customer Support">Customer Support</a>
<a class="a" href="#About">About</a>

<div class="dropdown">
<a href="javascript:void(0)" class="a","dropdown"><i class="fa fa-user-circle-o" aria-hidden="true"><!/i>Hello <?php echo " ".$_SESSION['user'];?></i></a>
    <div class="dropdown-content">
      <a href="#">My Profile</a>
      <a href="#">Log Out</a>
      </div>
    </div>
	    
</div>

<!img src="train2.jpg" width="1320" height="700"> 
<form method="post" >
  <div style="text-align:center;margin-top:100px">
	<input type="text" class="input" name="dep" placeholder="DEPATURE FROM" required>    
    <input type="text" class="input" name="ari" placeholder="ARRIVAL TO" required>
	 <input id="date" class="input" type="date" name="dt" >
    <button>Search Trains <i class="fa fa-search" style="font-size:20px;"></i></button><br><br>
   </div>
   
<?php
  
         if(!empty($_REQUEST["dep"]))
      {
        
		  $_SESSION["dep"]=$_POST["dep"];
		  $_SESSION["ari"]=$_POST["ari"];
          $_SESSION["dt"]=$_POST["dt"];
          header("Location:trainsearch.php");
	  }	  
?>
</form>

</body>
</html>