<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Identity System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php include('header.php')?>
    <?php include('homepage.php'); ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6" style=" width: 100vw; height: 70vh;">
                    
                    <div class="outer">
                        <div class="inner">
                            <form method="post" action="homepage.php" onsubmit="validate()">
                                <input class="form-control" class="text" type="text" id="username" name="username"
                                    placeholder="Username" style="background-color: #fff;">
                                <button type="submit" name="submit">Check</button>
                            </form>
                        </div>
                    </div>
                   
                    <div class="col-md-12" style="margin-top:2rem;">
                        <div class="card">
                            <div class="card-body">
                                <h2>You are on <?php echo $deviceType; ?></h2>
                            </div>
                        </div>

                    </div>
            
                </div>
                <div class="col-md-6" style="width: 100vw;height: 70vh; ">
                    
                    <div class="card" style="margin-top: 2rem;">
                        <div class="card-body">
                            <h4 class="card-title">Number of Computer Views <img src="https://img.icons8.com/nolan/64/monitor.png"/></h4>
                            <hr>
                            <h3 class="card-text"><?php 
                        $count = "SELECT COUNT(*) FROM `users` WHERE device='computer'";
                        $countresult_comp = mysqli_query($conn,$count);
                        if(mysqli_num_rows($countresult_comp) > 0){
                            while($row = mysqli_fetch_array($countresult_comp)){
                            echo $row['COUNT(*)'];
                            };
                            
                        };
                    ?>
                            </h3>

                        </div>
                    </div>
                    <div class="card" style="margin-top: 4rem;">
                        <div class="card-body">
                            <h4 class="card-title">Number of Mobile Views <img src="https://img.icons8.com/nolan/64/google-mobile.png"/> </h4>
                            <hr>
                            <h3 class="card-text"><?php 
                      $count = "SELECT COUNT(*) FROM `users` WHERE device='mobile'";
                      $countresult_mobile = mysqli_query($conn,$count);
                      if(mysqli_num_rows($countresult_mobile) > 0){
                        while($row = mysqli_fetch_array($countresult_mobile)){
                          echo $row['COUNT(*)'];
                        };
                        
                      };
                     ?>
                            </h3>
                        </div>
                    </div>


                </div>

            </div>
            <hr>
            
            <div class="row">
                <div class="col-md-6" id="table">
                <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                <?php
                      
                      $sql = "SELECT * FROM users";
                      $resultout = mysqli_query($conn,$sql); 
                      if(mysqli_num_rows($resultout) > 0){
                        echo "<table class='table table-dark table-striped col-md-12'>";
                            echo '<thead>';
                              echo "<tr>";
                                  echo "<th scope='col'>id</th>";
                                  echo "<th scope='col'>UserName</th>";
                                  echo "<th scope='col'>Device</th>";
                              echo "</tr>";
                            echo '</thead>';
                              echo '<tbody>';
                                while($row = mysqli_fetch_array($resultout)){
                                    echo "<tr>";
                                        echo "<th scope='row'>" . $row['id'] . "</th>";
                                        echo "<td>" . $row['UserName'] . "</td>";
                                        echo "<td>" . $row['device'] . "</td>";
                                      
                                    echo "</tr>";
                                }
                              echo '</tbody>';
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($resultout);
                    } else{
                        echo "No records matching your query were found.";
                    }
                  ?>

                    
                </div>
                </div>
               
                </div>


            </div>
        </div>
        <?php include('footer.php')?>
    </main>

</body>

</html>