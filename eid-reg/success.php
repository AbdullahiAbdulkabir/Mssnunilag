<?php 
 include('conn.php');
$pin = $_GET['pin'];
$quer = "SELECT * FROM register WHERE pin= '$pin' LIMIT 1 ";
        $res = mysqli_query($conn, $quer);
        $pinnum='';
        $name='';
        $sex='';
        $number='';
        $name='';
      
    while($row = mysqli_fetch_assoc($res) ) {               
            $pinnum = $row['pin'];
            $name = $row['name'];
            $sex = $row['sex'];
            $number = $row['phone_number'];
      
            $date_registered = $row['date_registered'];   
    } 

 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
        <link rel="shortcut icon" href="imgs/favicon.ico">

  <title>SUCCESS PAGE - MSSNUNILAG</title>
 <!--  <h5 id="stay">WE ARE CURRENTLY RENOVATING OUR SITE PLS STAY TUNED FOR MORE FEATURES</h5> -->
</head>
<body>

  <div class="container">
    <div class="container-fluid banner" >
      <!-- <img src="imgs/Capture.png" alt=""> -->
      <!-- <div class="type  ">
        <img src="imgs/header.gif" class="container-img" alt="MSSN Lagos State Chapter">
      </div> -->
    </div>
    <div style="text-align: center;">
    <h3><b>EID Get2gether</b></h3>
    <h3><b>Date:</b>Sunday, 16th May 2021</h3>
    <h3><b>Arrival:</b>1:30pm</h3>
    <h3><b>Time:</b>2:00pm to 6:00pm</h3>
   </div>
   <div class="panel panel-default">
      <div class="row"><div class="col-md-12"><div class="text-center"><h2>EID SLIP</h2></div></div></div>
      
       <table class="table table-striped">

      <tbody>
        <tr>
          <td><strong>Name:</strong>  <?php if(!empty($name)) {echo $name; }  ?>  </td>
          <td><strong>Sex:</strong>  <?php if(!empty($sex)) {echo $sex; }  ?> </td>        
        </tr>

        <tr>
          <td><strong>Phone Number:</strong> <?php if(!empty($number)) {echo $number; }  ?> </td>
          <td><strong>PIN Code:</strong>  <?php if(!empty($pin)) {echo $pin; }  ?> </td>
         
        </tr>


         <tr>
         
          <td><strong>Serial Number:</strong>    <?php if(!empty($_SESSION['serial_no'])) {echo $_SESSION['serial_no']; }   ?></td>
          <td><strong>Date Registered:</strong>  <?php if(!empty($date_registered)) {echo $date_registered; }  ?></td>
        </tr>
      
  
      </tbody>
     </table> 
        <!-- <div class="text-center"><p>YOU ARE HEREBY ADVICED TO PRINT OUT THIS SLIP AND PRESENT IT AT REGISTRATION POINT ON CAMP GATE</p> </div>   -->
        
      <div class="col-md-offset-4">
        
      <a class="text-center" href="localhost/mu/camp"><button class="btn btn-primary">Logout</button></a>
      </div>      
      </div>
    </div>
</body>
</html>


<script>
  window.onload = function()
  {
    window.print();
    //return false;
  }
</script>
