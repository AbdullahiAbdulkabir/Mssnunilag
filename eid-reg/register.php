<?php 
 
 include('conn.php');
    
      // print_r($_GET['pin']); 

      
    if (isset($_POST['submit'])) {
   $name= $_POST['name'];
   
   $name = mysqli_real_escape_string($conn, $name);
   $course= $_POST['course'];
   $course = mysqli_real_escape_string($conn, $course);
   $school= $_POST['school'];
   $school = mysqli_real_escape_string($conn, $school);
   $sex= $_POST['sex'];
   $sex = mysqli_real_escape_string($conn, $sex);
   $level= $_POST['level'];
   $email= $_POST['email'];
   $email = mysqli_real_escape_string($conn, $email);
   $number= $_POST['number'];
  
 
   
   $pin= $_GET['pin'];
   $serial_no=$_SESSION['serial_no'];
   $quer = "SELECT * FROM register WHERE name= '$name'";
        $res = mysqli_query($conn, $quer);
        $namedb='';
        $emaildb='';
        $houseno='';

    while( $row = mysqli_fetch_assoc($res) ) {               
            $namedb = $row['name'];
            $emaildb = $row['email']; 
    } 
    echo "$namedb";

  if (!($namedb===$name) && !($emaildb === $email)) {
    
      $p= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM register"))+1;
  
      $query = "INSERT INTO register (name,pin,serial_no,sex, email, phone_number, school, department, level) VALUES ('$name','$pin','$serial_no','$sex', '$email', '$number', '$school', '$course', '$level')";
      $result= mysqli_query($conn,$query);
      $dis = "UPDATE pin_gen SET Status='Inactive' WHERE pin= '$pin' ";
      $res= mysqli_query($conn,$dis);
      

       if ($result & $res) {
    $var_val = $pin;
    echo "<script>window.location.href ='success.php?pin=$var_val'</script>";
    // header("Location: success.php?pin=$var_val");


        }else{
           echo "<script>
        alert('Register again')</script>";
         // ;
        }
   }else{
     echo "<script>
        alert('Already Registered before')</script>";
   }
}

                            ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="imgs/favicon.ico">

  <title>REGISTRATION PAGE - MSSUNILAG</title>
 <!--  <h5 id="stay">WE ARE CURRENTLY RENOVATING OUR SITE PLS STAY TUNED FOR MORE FEATURES</h5> -->
</head>
<body>

  <div class="container">
    <div class="container-fluid banner" >
    
    </div>
    
    
      

      
     <div class="modal-body">
                       <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
                        
               
 
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"  required autofocus>

                            </div>

                        </div>
                        
                        
                        <div class="form-group">
                            <label for="school" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                              <input id="number" type="number" class="form-control" name="number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="school" class="col-md-4 control-label">School</label>

                            <div class="col-md-6">
                                <select  id="school" type="text" class="form-control" name="school" required>
                                    <option value="UNILAG">UNILAG </option>
                                     <option value="Others">Others </option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="course" class="col-md-4 control-label">Department</label>
    
                            <div class="col-md-6">
                              <input id="course" type="course" class="form-control" name="course" required>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="course" class="col-md-4 control-label">Gender</label>
                          <div class="col-md-6">
                            <select name="sex" id="" required>
                              <option selected disabled hidden >Select Option</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="level" class="col-md-4 control-label">Level</label>

                            <div class="col-md-6">
                              <select class="form-control" id="status" name="level"  autofocus>
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="Year 1">Year 1</option>
                                    <option value="Year 2">Year 2</option>
                                    <option value="Year 3">Year 3</option>
                                    <option value="Year 4">Year 4</option>
                                    <option value="Year 5">Year 5</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                         <!-- <div class="form-group">
                            <label for="course" class="col-md-4 control-label">Address|Hostel </label>
                            <div class="col-md-6">
                              <input id="address" type="address" class="form-control" name="address" required>
                            </div>
                        </div> -->
                       
                         <div class="col-md-6 ">
                                
                          </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="submit" class="btn btn-lg btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                                    
                                
      </div>
        
        </div>
        
  </div>

</body>

</html>





