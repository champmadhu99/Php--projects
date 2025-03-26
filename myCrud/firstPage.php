<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
       <!--Bootstap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <!--Font awesom -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>PHP Crud Application</title>
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5 "
  style="background-color:#89CFF0;" >PHP Complete Crud Application
</nav>

  <div class="container">

  <?php
  if(isset($_GET['msg'])){
    $msg  =$_GET['msg'];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
   ?>
    <a href="index.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
  <thead class="table-dark ">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
     include "db_connected.php";
     $sql = "SELECT * FROM `crud`"; 

      $result= mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_assoc($result)){
     ?>
     <tr>
      <th><?php echo $row['id'] ?></th>
      <th><?php echo $row['first_name'] ?></th>
      <th><?php echo $row['last_name'] ?></th>
      <th><?php echo $row['email'] ?></th>
      <th><?php echo $row['gender'] ?></th>

      <td>
        <a href="edit.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="delete.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-trash"></i></a>
      </td>
    </tr>
    
    <?php
      }

    ?>

    
   
  </tbody>
</table>

  </div>

    
       
            
          
    








        <!--Bootstap -->

</body>
</html>