
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
<?php 
   SESSION_START();
   ?>
<body>

<style>
  /* The container */
.container {
    border:1px solid #0000000a;
    text-align:center;  
    display: block;
    position: relative;
    padding: 20px  5px;
    width:500;
    margin-bottom:0px;
    cursor: pointer;
    font-size: 22px;
    
}

/* Hide the browser's default radio button */
.container input {
   
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
   
    margin-left:400px;
    position: absolute;
    padding-top: 2px;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
a {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-left:763px;

}
</style>

<img src="rail.png" alt="logo" width="300" height="150">
<div class="container-fluid">
  <h1 style="text-align:center">CONFIRM YOUR BOOKING</h1>
   <br><br><br>
  <div class="row" style="text-align:center">
    <<div class="col-sm-4" >
    <p><br><br>From Station<p>
    <h4><?php echo $_SESSION['dep'];?> </h4> </div>
    <div class="col-sm-4" >
    <?php
    $conn = mysqli_connect("localhost", "root", "", "mydb");
    if ($conn->connect_error) {
          die("Connection failed: " .$conn->connect_error);
    }
    $trainno=$_SESSION['book'];
    $sql="SELECT name FROM trains WHERE train_no= '$trainno'"; 
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    echo "<h4>".$row['name']."</h4>";
    ?>

    <h4 ><?php echo $_SESSION['book'];?></h4>
    <i class="fa fa-train" aria-hidden="true" style="font-size:35px;"></i>
    <h4 ><?php echo $_SESSION['dt'];?></h4></div>
    <div class="col-sm-4" >
    <p><br><br>Arival Station</p>
    <h4><?php echo$_SESSION['ari'];?><h4>
    </div>
  </div>

</div>
<h3 style="text-align:center;">Choose Payment Mode<br><br><br></h3>
<label class="container">Paytm
  <input type="radio" checked="checked" name="radio">
  <span class="checkmark"></span>
</label>
<label class="container">Debit Card
  <input type="radio" name="radio">
  <span class="checkmark"></span>
</label>
<label class="container">Credit Card
  <input type="radio" name="radio">
  <span class="checkmark"></span>
</label>
<label class="container">Netbanking
  <input type="radio" name="radio">
  <span class="checkmark"></span>
</label><br><br>
<a href="last.php" >Make Payment</a>
</body>
</html>

