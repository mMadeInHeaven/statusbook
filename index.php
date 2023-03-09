<?php
$insert=false;
$servername="localhost";
$username="root";
$password="";
$database="statusbook";


//create a connection
$conn=mysqli_connect($servername,$username,$password,$database);//connect to localdatabase
?>
<div class="phpclass">
  <?php
  
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=$_POST['name'];
        $message=$_POST['message'];
        
        $sql="INSERT INTO `table1` ( `Name`, `Message`, `Time:`) VALUES ( '$name', '$message', current_timestamp())";
        
       
        $result= mysqli_query($conn,$sql);
        if($result){
            // echo"success";
            header("index.php",true,303);
            $insert=true;
        }
        
        
      }


?>
</div>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


    <title>ConfessOutThames.</title>
    
    

    
    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #4c61cc;">
        
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="thames-logo.webp" alt="" width="30" height="24">
              </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Creator info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Suggestions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
          </div>
        </div>
     
      </nav>
<?php

if($insert==true){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Yay!!</strong> Confession added Successfully
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}

?>
     
     




<div class="headingcontainer" style=" margin: auto 21%; margin-top: 40px;">

   <h1>

       Confession goes here!!!
   </h1>
</div>
<div class="allinfo" style="margin: auto;
display: flex;
flex-direction: column;
width: 70%;">

  <div class="mb-3" >
    <form action="index.php" method="POST" >
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label" >Name:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Your name here!!"name="name" required>
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Confession:</label>
  <input type="text" class="form-control" id="formGroupExampleInput2" name="message"placeholder="Enter your confession here!!" required>
</div>
<button type="submit" class="btn " name="submit" style="background-color: #4c61cc; color: aliceblue;"  >Add Confession</button>
</form>

</div>






<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Message</th>
      <th scope="col">Time</th>
      <th scope="col">Actions</th>
      
      
      
    </tr>
  </thead>
  <tbody>
  <?php
        $sql="SELECT * FROM `table1`";
        $result=mysqli_query($conn,$sql);
        $sno=0;
        while($row=mysqli_fetch_assoc($result)){
          $sno++;
          echo"<tr>";
          echo "<td>". $sno."</td>";
          echo "<td>".$row['Name'] ."</td>"; 
          echo "<td>".$row['Message']."</td>"; 
          echo "<td>".$row['Time:']."</td>"; 
          echo "<td> <button type='button' class='btn btn-primary btn-sm' style='margin: 5px; height: 22px;'> Edit</button><button type='button' class='btn btn-primary btn-sm' style=' height: 22px;'> Delete</button></td>";
          echo"</tr>";
        }
        
        ?>
    
  </tbody>
</table>
</div>
    


    </div>

   <div>
     <hr style="margin: 50px;">
   </div>
    
    


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

  </body>
</html>