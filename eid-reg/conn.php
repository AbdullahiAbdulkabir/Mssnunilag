<?php $database = 'us-cdbr-east-03.cleardb.com';
     session_start();
     $dbuser = 'b2cd279ecf863f';
     $dbpassword = '40efaebe';
     $dbname = 'heroku_fa8da59d389eeb4';//mssn_unilag;
// mysql://b2cd279ecf863f:40efaebe@us-cdbr-east-03.cleardb.com/heroku_fa8da59d389eeb4?reconnect=true
      $conn=mysqli_connect($database,$dbuser,$dbpassword, $dbname);

      ?>