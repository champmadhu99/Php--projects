  
  
<?php
include "db_connected.php"; 
$id = $_GET['id'];

if(isset($_POST["submit"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    
    $query = "UPDATE crud SET first_name='$first_name',last_name='$last_name',email='$email',gender='$gender' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Updated Successfully'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
  
  
  
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
  <nav class="navbar navbar-light justify-content-center fs-2 mb-5 "
  style="background-color:#89CFF0;" >PHP Complete Crud Application
</nav>

<div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php 
       
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex  justify-content-center">
                <form action="insert.php" method="post" style="width:50vw; min-width:300px;">
                    <div class="row mb-3">
                        
                        <div class="col">
                            
                            <label class="form-label">First Name:</label>
                            <input type="text" class="form-control" value="<?php echo $row['first_name'] ?>" name="first_name">
                        </div>

                        <div class="col">
                            <label class="form-label">Last Name:</label>
                            <input type="text" class="form-control" value="<?php echo $row['last_name'] ?>"name="last_name">
                        </div>

                    </div>

                        <div class="col mb-3">
                            <label class="form-label">Email:  </label>
                            <input type="email" class="form-control" value="<?php echo $row['email'] ?>" name="email">
                        </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Gender:  </label>&nbsp;
                        <input type="radio" class="form-check-input"  name="gender" id="male" value="male" <?php echo ($row['gender']=='male') ?"checked":"";?>>
                        <label for="male" class="form-input-label">Male</label>
                        &nbsp;
                        <input type="radio" class="form-check-input"  name="gender" id="female" value="female" <?php echo ($row['gender']=='female') ?"checked":"";?>>

                        <label for="female" class="form-input-label">Female</label>

                    </div>

                    <div >
                        <button class="btn btn-primary" type="submit" name="submit">Save</button>
                        <a href="index.php" class="btn btn-secondary">Cancel </a>

                    </div>

                

                </form>

        </div>


    </div>


    
       
            
          
    








        <!--Bootstap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>
</html>