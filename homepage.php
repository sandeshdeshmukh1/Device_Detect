<?php
      
      require_once "mobile_detect.php";
      $detect = new Mobile_Detect;
      $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'Mobile') : 'computer');
      require('database\db.php');
      if (isset($_POST['submit'])){
        $username = stripslashes($_POST['username']);
        $username = mysqli_real_escape_string($conn,$username); 
        $device = mysqli_real_escape_string($conn,$deviceType);
        $query = "INSERT INTO `users` (`UserName`,`device`) VALUES ('$username','$device')";
        $result = mysqli_query($conn,$query);  
          
        if($result){
          header("Location:index.php");
        }
        }
         
       
      
?>