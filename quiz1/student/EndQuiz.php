<?php include '../config.php'; ?>


<?php

 // $user = $_SESSION['auth'];
  
   session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();  
  
  
  
   if(isset($_POST['done']))
{
	header('Location:http://localhost/quiz1/index.php');//login page
	
	
	
}
  
  
  
  
  ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!--Bootstrap Dashboard Link-->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">
    <!--Icons Link-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!--Bootstrap Link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--External StyleSheet-->
    <link rel="stylesheet" href="<?php echo $url?>assets/css/style.css">
    <title>Exam System</title>
</head>
<body class="bg-white">
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

<form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Your Exam is Finished  </h1>
 </div><br>
 
 <p>Your exam is finnished. To do more exam please login again.</p>
 
 
 <button class="btn btn-success" type="submit" name="done"> Login   </button><br>

</div>
 </form>
 </div>
<canvas class="my-4 w-100" id="myChart" width="900" height="200"></canvas>
</div>
</main>
</div>
</div>
<!--JQuery, Popper and Javascript Link-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>






