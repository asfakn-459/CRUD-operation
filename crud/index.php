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
                    <?php
                    if(isset($_GET['msg'])){
                        $msg = $_GET['msg'];
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        '.$msg.'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>'; 
                    }
                    ?>
                    <a href="add.php" class="btn btn-dark mb-3">Add New</a>


                    <table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "db_conn.php";

      $sql = "SELECT * FROM `crud`";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
         <tr>
      <td><?php echo $row['id'] ?></th>
      <td><?php echo $row['first_name'] ?></td>
      <td><?php echo $row['last_name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['gender'] ?></td>
     
      <td>
        <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square
        fs-5 me-3"></i></a>
        <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fas fa-trash
        fs-5 me-3"></i></a>
      </td>
    </tr>

        <?php
      }
      ?>
    <tr>
      <td>
        <a href="" class="link-dark"><i class="fa-solid fa-pen-to-square
        fs-5 me-3"></i></a>
        <a href="" class="link-dark"><i class="fa-solid fa-trash-to-square
        fs-5 "></i></a>
      </td>
    </tr>
    
  </tbody>
</table>
                    
                </div>
                <!-- Bootstrap -->

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.
                bundle.min.js" integrity="sha384-ka7Sk0G1n4gmtz2M1QnikT1wXgYs0g+OMhuP 
                +I1RH9SENBOOLRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                
 </body>
 </html>