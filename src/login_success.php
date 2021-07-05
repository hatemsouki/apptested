
<?php  
  
 session_start();  
 

  // Include database file
  include 'customers.php';

  $customerObj = new Customers();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $sql= $customerObj->deleteRecord($deleteId);
      if ($sql==true) {
				header("Location:login_success.php?msg3=delete");
			}else{
				echo "Record does not delete try again";
			}
  }
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP: CRUD (Add, Edit, Delete, View) Application using OOP (Object Oriented Programming) and MYSQL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.css"/>
</head>
<body>
  <div class="container" style="width:500px;">  
               
                <?php  
				 echo '<h3 >Hello  Admin   , Welcome - '.$_SESSION["username"]. '</h3> ';
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
              <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
           </div>  
		   
<div class="card text-center" style="padding:15px;">
  <h4>Mon PFE </h4>
</div><br><br> 

<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  ?>
  <h2>Liste des utilisateurs    <a href="add.php" class="btn btn-primary" style="float:right;">Ajouter </a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $customers = $customerObj->displayData(); 
          foreach ($customers as $customer) {
        ?>
        <tr>
          <td><?php echo $customer['id'] ?></td>
          <td><?php echo $customer['name'] ?></td>
          <td><?php echo $customer['email'] ?></td>
          <td><?php echo $customer['username'] ?></td>
          <td>
            <a class="btn btn-primary btn-sm" href="edit.php?editId=<?php echo $customer['id'] ?>" style="color:white">Edit</a>
            <a class="btn btn-danger btn-sm" href="login_success.php?deleteId=<?php echo $customer['id'] ?>" style="color:white" onclick="confirm('Are you sure want to delete this record')">
              Del
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

 