<?php 
  include('conn.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
        <link rel="shortcut icon" href="imgs/favicon.ico">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <title>ADMIN AREA -MSSN UNILAG CAMP PORTAL</title>
</head>
<body>

  <div class="container">
      <div class="panel-body">
        <table width="70%" id="table_id" class=" table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                      <th>Name</th>
                                        <th>Serial No</th>  
                                        <th>Pin</th> 
                                        <th>Department</th>  
                                        <th>level</th>  
                                        <th>Sex</th> 
                                    </tr>
                                </thead>
                                <tbody>
<?php      $query = "SELECT * FROM register"; 
      $result = mysqli_query($conn, $query);
      
      if (mysqli_num_rows($result)==0) {
       
      }else{
          while($row = mysqli_fetch_array($result)  ) { 
             $_SESSION['name']= $details =$row['name'];
               $_SESSION['sex'] =$row['sex'];
               $_SESSION['serial_no']= $details =$row['serial_no'];
               $_SESSION['pin']= $details =$row['pin'];
               $_SESSION['department'] =$row['department'];
               $_SESSION['level'] =$row['level']; ?>
       
                                  <tr class="">
                                        
                                        <td><?php echo $_SESSION['name']; ?></td>
                                        <td><?php echo $_SESSION['serial_no']; ?></td>
                                        <td><?php echo $_SESSION['pin']; ?></td>
                                        <td><?php echo $_SESSION['department']; ?></td>
                                        <td><?php echo $_SESSION['level']; ?></td>
                                        <td><?php echo $_SESSION['sex']; ?></td>
                                       
                                        
                                        
                                    </tr> 
             
      <?php } 
      }
     ?>
                                    
                                    </tbody>
                                </table>
      </div>
        <div class="">
           
            <a onclick="printreport()"><button type="button" class="btn btn-primary ">Print page </button></a>
        </div>
        </div>
        
  </div>

</body>
<script>    $(document).ready(function() {
    $('#table_id').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
function printreport() {
    window.print();
}
</script>
</html>





