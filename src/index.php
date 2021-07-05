<!DOCTYPE html>
<html lang="en">
<head>
  <title>PFE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.css"/>
</head>
<body>

<div class="container"> 
     <div class="row text-center" style="margin-top:100px;">
       <div class="col-md-12">
       <?php
  
  echo '<h4>Bonjour bienvenue a notre PFE</h4>';
     
?> 
       <h4>Bienvenue</h4>
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
              <a href="can_login.php" class="btn btn-primary">Entrer</a>
       </div>
  
     </div>
             
           </div>  
		  

<script src="js/jquery.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
