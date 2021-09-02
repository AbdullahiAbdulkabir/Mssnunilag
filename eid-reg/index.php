 <?php 
  // session_start();
 include('conn.php');
if (isset($_POST['submit'])) {
   $pin= $_POST['pin'];
   $pin = mysqli_real_escape_string($conn, $pin);
   $quer = "SELECT * FROM pin_gen WHERE  '$pin'= pin LIMIT 1 ";
        $res = mysqli_query($conn, $quer);
        $pinnum='';
        $status='';
    while($row = mysqli_fetch_assoc($res) )
     {               
          $pinnum = $row['pin'];
          $status = $row['status'];
          $_SESSION['serial_no'] = $row['serial_no'];            
      } 
  if ($pinnum===$pin && $status=='Active') {
    $var_val = $pin;
     echo "<script> window.location.href = 'register.php?pin=$var_val' </script>";
  
   }else if($status=='Inactive')
   {
    echo "<script>
        alert('Inactive pin|Pin Already used')</script>";
   }
   else{
     echo "<script>
        alert('Incorrect pin')</script>  ";
   }
}
 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Eid get together 1442AH  - MSSN UNILAG BRANCH </title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
   <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <header class="header" >

    <div class="imgs">
      <img src="./imgs/mssnlogos.png" width="50%" alt="">
     <h5>MSSN UNILAG EID GET TOGETHER</h5>
    </div>
   
 
<div class="event">
    <div class="col-md-12 bgevent" id="bgevent">
        <div class="count" >DAYS<p id="day"> <?php echo date('d'); ?> </p></div>
        <div class=" count" >HOURS<p id="hour"><?php echo date('h'); ?> </p></div>
        <div class=" count" >MINUTES<p id="min"> <?php echo date('i'); ?></p></div>
        <div class=" count" >SECONDS<p id="sec"><?php echo date('s'); ?> </p></div>
   </div>
</div>
  
</header>

<div class="container">
   <div class="row ">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
           
                    <div class="panel-heading">
                        <h3 class="panel-title">Eid get together 1442AH - MSSN UNILAG</h3>
                        <h3 class="panel-title text-center">Time: 2:00pm to 6:00pm <br/>  Arrival: 1:30pm <br/>All participants are advised to come early</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php $_SERVER['PHP_SELF']?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Pin" name="pin"  autofocus>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button  class="btn btn-lg btn-success btn-block" type="submit" name="submit">Submit</a>
                            </fieldset>
                        </form>
                        <!-- <a href="oldm.php"><h4>Old members</h4></a>
                        <a href="http://localhost/mu/muidcheck"><h4>Check MSSN ID</h4></a> -->
                    </div>
                </div>
            </div>
        </div>
   </body>
<script>

 // Set the date we're counting down to
var countDownDate = new Date("May 16, 2021 01:30:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("day").innerHTML = days + "d ";
  document.getElementById("hour").innerHTML =  hours + "h ";;
  document.getElementById("min").innerHTML = minutes + "m ";
  document.getElementById("sec").innerHTML = seconds +"s";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("bgevent").innerHTML = "IT'S TODAY";
  }
}, 1000);

</script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

<!-- <script type="text/javascript" src="js/app.js"></script> -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>