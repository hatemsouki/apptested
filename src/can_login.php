<?php  
 include 'database.php';  
 session_start();  
 $data = new Databases;  
 $message = '';  
 if(isset($_POST["login"]))  
 {  
      $field = array(  
           'username'     =>     $_POST["username"],  
           'password'     =>     $_POST["password"]  
      );  
      if($data->required_validation($field))  
      {  
           if($data->can_login("users", $field))  
           {  
                $_SESSION["username"] = $_POST["username"];  
                header("location:login_success.php");  
           }  
           else  
           {  
                $message = $data->error;  
           }  
      }  
      else  
      {  
           $message = $data->error;  
      }  
 }  
   if(isset($_POST["register"]))  
 {  
       
                header("location:testt.php");  
           
 }  
 ?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Login Form in PHP using OOP</title>  
		   <meta name="viewport" content="width=device-width, initial-scale=1">
           <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Login Form in PHP using OOP</h3><br />  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <form method="post">  
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
					 <input type="submit" name="register" class="btn btn-info" value="register" />  
                </form>  
           </div>  
           <br />  
           <script src="js/jquery.min.js"></script> 
           <script src="js/bootstrap.min.js"></script>
      </body>  
 </html> 