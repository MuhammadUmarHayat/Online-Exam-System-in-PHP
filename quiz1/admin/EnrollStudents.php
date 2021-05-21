
<?php include '../config.php'; ?>
<?php include 'header.php'; ?>
<?php
if(isset($_POST['done']))
{
////tName,subjectsName
if(empty($_POST['studentID'])||empty($_POST['subjectID']))
 {
	  echo 'Fields should not empty';
}
 else
 {
	
 $studentID = $_POST['studentID'];
 $subjectID = $_POST['subjectID'];
 
 //INSERT INTO `student_subjects`(`studentID`, `subjectID`) 
 //INSERT INTO `teacher_subjects`(`teracherID`, `subjectID`) VALUES ([value-1],[value-2])
 
 $q1 = "INSERT INTO `student_subjects`(`studentID`, `subjectID`)  VALUES ('$studentID','$subjectID')";

 $query = mysqli_query($con,$q1);
 
 
 echo 'Data is saved  successfully';
  
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
 <h1 class="text-white text-center">  Student enrollment  </h1>
 </div><br>
  


 <br>
 Student Name
 <select name="studentID">
    <option disabled selected>-- Select Student --</option>
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT StudentID From student");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['StudentID'] ."'>" .$data['StudentID'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
 
 <br>
 Subject Name 
 <select name="subjectID">
    <option disabled selected>-- Select Subject--</option>
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT title From subject");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['title'] ."'>" .$data['title'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
 <br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
<?php include 'footer.php'; ?>