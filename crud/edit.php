<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $id = $_GET['id']; // Retrieve the id from the query parameter
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    // Use prepared statements to update the user data
    $sql = "UPDATE `crud` SET `first_name`=?, `last_name`=?, `email`=?, `gender`=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $first_name, $last_name, $email, $gender, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?msg=Data updated successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
} else {
    $id = $_GET['id']; // Retrieve the id from the query parameter

    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>





<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiva="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.
    css" rel="stylesheet"
    integrity="sha384-18mE4kWBq781YhFldvKuhfTAU6auU8tT94WrHftjDbгCEXSU1oBoqy12QvZ6jIw3 
    " crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD Application</title>
 </head>
 <body>
                <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
                    PHP Complete CRUD Application
                </nav>

                <div class="container">
                    <div class="text-center mb-4">
                        <h3>Edit User Information</h3>
                        <p class="text-muted">Click update after changing any information</p>
                    </div>  
                    
                    <?php
                    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <div class="container d-flex justify-content-center">
                        <form action="" method="post" style="width:50vw; min-width:300px;">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">First Name:</label>
                                <input type="text" class="form-control" name="first_name"
                                value="<?php echo $row['first_name']?>">
                               </div>

                               <div class="col">
                                <label class="form-label">Last Name:</label>
                                <input type="text" class="form-control" name="last_name"
                                value="<?php echo $row['last_name']?>">
                               </div>
                        </div>
                         <div class="mb-3">
                         <label class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email"
                                value="<?php echo $row['email']?>">
                               </div>

                               <div class="form-group mb-3">
                                <label>Gender:</label> &nbsp;
                                <input type="radio" class="form-check-input" name="gender"
                                id="male" value="male" <?php echo ($row['gender']=='male')?"checked":"";?>>
                                <label for="male" class="form-input-label">Male</label>
                               &nbsp;
                                <input type="radio" class="form-check-input" name="gender"
                                id="female" value="female" <?php echo ($row['gender']=='female')?"checked":"";?>>
                                <label for="female" class="form-input-label">Female</label>
                               </div>

                               <div>
                                 <button type="submit" class="btn btn-success" name="submit">Update</button>
                                 <a href="index.php" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>    
                <!-- Bootstrap -->

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.
                bundle.min.js" integrity="sha384-ka7Sk0G1n4gmtz2M1QnikT1wXgYs0g+OMhuP 
                +I1RH9SENBOOLRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                
 </body>
 </html>