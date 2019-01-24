<?php
session_start();
if(!empty($_GET['button1']))
        {
          header("Location:confirm.php");
        }   
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.table{
	 border:1px solid #8E8988;
	border-radius:8px;
	 margin-left:283px;
	 margin-down:10px;
	 margin-top:-429px;
	 font-size:25px;
	 padding:20px;
	 width:1050px;
	
   float:right;
	}
th{
	padding-right:10px;
		padding-left:10px;
		text-align:center;
		
}
td{
	margin:20px;
	text-align:center;
    
}
.checkbox{
       border:1px solid black;
       border-radius:8px;
	   padding:48px;
	   float:left;
	   margin-top:118px;
}	   
.c{
	
  border:1px solid black;
	padding:10px;
}
a:link   {
    background-color:white;
	
    margin:40px;
    text-decoration: none;
    font-size: 32px;
}
.input{
	  
	  
	  display:inline;
	  background-color: white; /* Green */
      border: 1px solid light grey;
      padding: 15px 20px;
      text-decoration: none;
      font-size: 13px;
	  height:17px;
	  margin:0 -3px;
}
.select{
   display:inline;
    padding:20px
    font-size: 13px;
	  height:50px;
	  margin:0 -3px;
    width:168px;

}
.button{
	background-color: #4CAF50; /* Green */
    border: 1px solid green;
    color: white;
    padding: 15px 32px;
    margin:0 -1px;
    text-decoration: none;
    display:inline;
    font-size: 16px;
}
.book{
  background-color: #4CAF50; /* Green */
    border: 1px solid green;
    color: white;
    padding: 5px 2px;
    text-decoration: none;
    display:inline;
    margin-left:32px;
    margin-right:-91px;
    font-size: 25px;
}
</style> 
<script language="JavaScript">
function selectAll(source) {
    checkboxes = document.getElementsByName('class[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}
</script>
<body  >
<img src="rail.png" alt="logo" width="300" height="150">
<form method="post" >
 <br> 
 <div style="text-align:center;">
 <select class="select" name="dep"><?php echo $_SESSION['dep'];?>
  <option value='NDLS'>New Delhi</option>
  <option value='DLI'>Delhi</option>
  <option value='DLS'>Delhi Shahdara</option>
  <option value='ANVT'>Anand Vihar</option>
  <option value='GZB'>Ghaziabad</option>
  <option value='PKW'>Pilkhua</option>
  <option value='HPU'>Hapur</option>
  <option value='GMS'>Garhmuktesar</option>
  <option value='GJL'>Gajraula</option>
  <option value='AMRO'>Amroha</option>
  <option value='MB'>Muradabad</option>
  <option value='RMU'>Rampur</option>
  <option value='CH'>Chandausi</option>
  <option value='AO'>Aonla</option>
  <option value='BE'>Bareilly</option>
  <option value='PMR'>Pitambarpur</option>
  <option value='TLH'>Tilhar</option>
  <option value='SPN'>Shahjahanpur</option>
</select>
<select class="select" name="ari" placeholder="<?php echo $_SESSION['ari'];?>">
  <option value='NDLS'>New Delhi</option>
  <option value='DLI'>Delhi</option>
  <option value='DLS'>Delhi Shahdara</option>
  <option value='ANVT'>Anand Vihar</option>
  <option value='GZB'>Ghaziabad</option>
  <option value='PKW'>Pilkhua</option>
  <option value='HPU'>Hapur</option>
  <option value='GMS'>Garhmuktesar</option>
  <option value='GJL'>Gajraula</option>
  <option value='AMRO'>Amroha</option>
  <option value='MB'>Muradabad</option>
  <option value='RMU'>Rampur</option>
  <option value='CH'>Chandausi</option>
  <option value='AO'>Aonla</option>
  <option value='BE'>Bareilly</option>
  <option value='PMR'>Pitambarpur</option>
  <option value='TLH'>Tilhar</option>
  <option value='SPN'>Shahjahanpur</option>
</select>
	<input id="date" class="input" name="date" type="date" value="<?php echo $_SESSION['dt'];?>" placeholder="Date">
    <button class="button" >Search</button><br><br>
   </div>
  
   <div class="checkbox" >
   <form action="/action_page.php" method="get">
   Refine Result:<br><br>
   <pre>  Journey Class<input type="checkbox" id="selectall" onClick="selectAll(this,'')" /><br><br>
  <input type="checkbox" name="class[]" value=1>AC First Class (1A)<br><br>
  <input type="checkbox" name="class[]" value=2>AC Second Class (2A)<br><br>
  <input type="checkbox" name="class[]" value=3 >AC Third Class (3A)<br><br>
  <input type="checkbox" name="class[]" value=4 >Sleeper Class (SL)<br><br>
  <input type="checkbox" name="class[]" value=5 >Chair Car (CC)<br><br>
  <input type="checkbox" name="class[]" value=6 >Second Setting (2S)<br></pre>
  
</form>
</div>
<?php 
$class=array();
$fac=$sac=$tac=$sl=$ss=$cc=2;
if(!empty($_POST['class'])){
        foreach($_POST['class'] as $selected){
  
  if($selected==1)
    {
       $fac=1;
    }
if($selected==2){
  $sac=1;
  }
  if($selected==3){
    $tac=1;
    }
    
    if($selected==4){
      $sl=1;
      }
      
      if($selected==5){
        $ss=1;
        }
        
if($selected==6){
    $cc=1;
          }
}
}
$conn = mysqli_connect("localhost", "root", "", "mydb");
if ($conn->connect_error) {
   die("Connection failed: " .$conn->connect_error);
 }
$sql4="SELECT coach_id FROM class WHERE thirdac = '$tac' or secondac = '$sac' or firstac = '$fac' or chaircar = '$cc' or sleeper = '$sl' or secondsetting = '$ss' ";
$result4=mysqli_query($conn,$sql4);
$i=0;
if(mysqli_num_rows($result4)>0)
{
 while($row4=mysqli_fetch_assoc($result4)){
  $class[$i]=$row4['coach_id'];
   $i++;
 }
}
$check=$i;

  if(empty($_POST['dep'])){
    $dep=$_SESSION['dep'];
    $ari=$_SESSION['ari'];
    $date=$_SESSION['dt'];
  }
  else{
    $dep=$_POST['dep'];
     $ari=$_POST['ari'];
     $date=$_POST['date'];
     $_SESSION['dep']=$dep;
     $_SESSION['ari']=$ari;
      $_SESSION['dt']=$date;
  }
  
  echo "<div><h4 style='text-align:center;'>".$dep."--------------------------------------------------------------------------->";
  echo $ari."</h4>";
  echo "<h4 style='text-align:center;'>".$date."<br>
   <select style='display:inline;margin-right:-500px;font-size:18px;padding:10px;'>QUOTA<option value='volvo'>GENRAL</option>
  <option value='saab'>Sr.CITIZEN</option>
  <option value='opel'>LADIES</option>
  <option value='audi'>DIVYAANG</option>
</select></h4>"; 
echo "<div style='border:1px solid black;margin-left:275px;'>";
 
  echo "</div>";
  $s=array();

    $sql="SELECT station_id FROM station WHERE stationname = '$dep'"; 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
      
         $depature=$row['station_id'];
         $train="SELECT train_id FROM route WHERE station_id = '$depature'"; 
         $result1 = mysqli_query($conn, $train);
         //$row1 = mysqli_fetch_assoc($result1);
         if (mysqli_num_rows($result1) > 0) {
           $i=0;
          while($row1 = mysqli_fetch_assoc($result1)) {
            $s[$i]=$row1['train_id'];
            $i=$i+1;
                      } 
      
                    }
       }
       
    $train="SELECT station_id FROM station WHERE stationname = '$ari'"; 
    $result1 = mysqli_query($conn, $train);
    $row1 = mysqli_fetch_assoc($result1);
    if (mysqli_num_rows($result1) > 0) {
        $arival= $row1['station_id'];
        $sql2="SELECT train_id FROM route WHERE station_id = '$arival'"; 
        $result2 = mysqli_query($conn, $sql2);
        //$row1= mysqli_fetch_assoc($result1);
        if (mysqli_num_rows($result2) > 0) {
          echo "<table class='table'><tr >
                <div style='overflow-x:auto;'>
                 <th>Train no.&nbsp</th> 
                  <th>Name</th>
                  <th>Time</th>
                  <th>Starting<br>Station</th>
                  <th>Last<br>Station</th>
                  <th>Booking</th>
                  <br><br><br></tr>";
            while($row2 = mysqli_fetch_assoc($result2)) {
            $ariv=$row2['train_id'];
            for($i=0;$i<sizeof($s);$i++){
              if($ariv==$s[$i]){
               $train1="SELECT train_id,train_no,name,time,intial,final,coach_id FROM trains WHERE train_id ='$ariv' and date ='$date'";
               $result3 = mysqli_query($conn, $train1);
               $row3 = mysqli_fetch_assoc($result3);
               for($j=0;$j<sizeof($class);$j++)
               {
               
               if ((mysqli_num_rows($result3) > 0) and ($row3['coach_id']==$class[$j])) {
                    $train=$row3['train_no'];
                    $trainid=$row3['train_id'];
                    $sql4="SELECT route_id FROM route WHERE (train_id='$trainid') and (station_id = '$depature')"; 
                    $result4 = mysqli_query($conn, $sql4);
                    $row4 = mysqli_fetch_assoc($result4);
                    if (mysqli_num_rows($result4) > 0) {
                         $de=$row4['route_id'];}
                    $sql5="SELECT time FROM time WHERE (train_id = '$trainid') AND (station_id='$depature') "; 
                    $result5 = mysqli_query($conn,$sql5);
                    $row5 = mysqli_fetch_assoc($result5);   
                    $sql6="SELECT route_id FROM route WHERE (train_id='$trainid') and (station_id = '$arival')"; 
                    $result6 = mysqli_query($conn, $sql6);
                    $row6= mysqli_fetch_assoc($result6);
                    if (mysqli_num_rows($result6) > 0) {
                          $ar=$row6['route_id'];  }         
                    $sql7="SELECT time FROM time WHERE (train_id = '$trainid') AND (station_id='$arival') "; 
                    $result7 = mysqli_query($conn,$sql7);
                    $row7 = mysqli_fetch_assoc($result7);
                         
                    if($de<$ar){
                     echo "<tr ><td>".$row3['train_no']."</a></td><td>".$row3['name']."</td><td>".$row3['time']."</td><td>".$dep."<br>".$row5['time']."</td><td>".$ari."<br>".$row7['time']."</td><td ><a href='?button1=$train'>book</a></td></tr>";
                    }
                             }
                          }
                        } 
        }
      }
     
  
        echo "</table></div>";
        if(!empty($_GET['button1']))
        {
        echo $_GET['button1']; 
        $_SESSION['book']=$_GET['button1'];
        }
    }
 }
 
         
mysqli_close($conn);
?>
</body>
</html>
  