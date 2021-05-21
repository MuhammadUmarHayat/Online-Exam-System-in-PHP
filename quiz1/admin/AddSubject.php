
<?php include '../config.php'; ?>
<?php include 'header.php'; ?>
<?php
if(isset($_POST['done']))
{

if(empty($_POST['SubjectID'])||empty($_POST['Title'])||empty($_POST['Department'])||empty($_POST['Description']))
 {
	  echo 'Fields should not empty';
}
 else
 {
	 //INSERT INTO `subject`(`SubjectID`, `Title`, `Department`, `Description`)
//	 VALUES ([value-1],[value-2],[value-3],[value-4])
 $SubjectID = $_POST['SubjectID'];
 $Title = $_POST['Title'];
 //SubjectID,Title,Department,Description
 $Department = $_POST['Department'];
 $Description = $_POST['Description'];
 
 
 
 $q1 = "INSERT INTO `subject`(`SubjectID`, `Title`, `Department`, `Description`) VALUES ('$SubjectID','$Title','$Department','$Description') ";

 $query = mysqli_query($con,$q1);
 
 
 echo 'Record is saved successfully';
  
 }
 
}
?>

<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
.error {color: #FF0000;}
</style>

</head>
<body>

 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Add Students </h1>
 </div><br>
  
<label> SubjectID : </label>
 <input type="text" name="SubjectID" class="form-control"> <br>
 
 <label> Title : </label>
 <input type="text" name="Title" class="form-control"> <br>
 <label> Department: </label>
 <input type="text" name="Department" class="form-control"> <br>
 
<label> Description : </label>
 <input type="text" name="Description" class="form-control"> <br>
 
 

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
<?php include 'footer.php'; ?>