<?php include '../config.php'; ?>
<?php include 'header.php'; ?>
<?php


if(isset($_POST['done']))
{

if(empty($_POST['name'])||empty($_POST['Email'])||empty($_POST['password'])||empty($_POST['department'])||empty($_POST['studyProgram']))
 {
	  echo 'Fields should not empty';
}
 else
 {
	 
 $name = $_POST['name'];
 $Email = $_POST['Email'];
 
 $password = $_POST['password'];
 $repassword = $_POST['repassword'];
 $gender = $_POST['gender'];
 $mobileNo = $_POST['mobileNo'];
 
 //student table
 
 $department = $_POST['department'];
 $cgpa = $_POST['cgpa'];
 
 $studyProgram=$_POST['studyProgram'];
 $userType='student';
 
 if($password== $repassword)
	 {
	  
 $q1 = "INSERT INTO `users`( `Name`, `Gender`, `userType`, `Email`, `Password`, `MobileNo`) VALUES ('$name','$gender','$userType','$Email','$password','$mobileNo') ";

 $query = mysqli_query($con,$q1);
                                                                           //INSERT INTO `student`(`studentID`, `department`, `StudyProgram`, `CGPA`)
 $q2 = "INSERT INTO `student`(`studentID`, `department`, `StudyProgram`, `CGPA`)  VALUES ( '$Email', '$department','$studyProgram','$cgpa' )";

 $query = mysqli_query($con,$q2);
 
 echo 'Student is registered successfully';
 
 
	  }
	 else
	 {
		 
	 echo 'Error: password doesnot match ';	 
		 
	 }
	 
	 
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
 <h1 class="text-white text-center">  Student Registeration Page </h1>
 </div><br>
<label> Name : </label>
 <input type="text" name="name" class="form-control"> <br>
 
 <label> Email : </label>
 <input type="text" name="Email" class="form-control"> <br>
 <label> Password : </label>
 <input type="password" name="password" class="form-control"> <br>
 
<label> Retyep Password : </label>
 <input type="password" name="repassword" class="form-control"> <br>

 
 Gender:
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="other") echo "checked";?>
value="other">Other <br>
  
  <label> Mobile Number : </label>
 <input type="text" name="mobileNo" class="form-control"> <br>
 
 <label> Department : </label>
 <input type="text" name="department" class="form-control"> <br>
 
 <label> studyProgram : </label>
 <input type="text" name="studyProgram" class="form-control"> <br>
 
 <label> cgpa : </label>
 <input type="text" name="cgpa" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
<?php include 'footer.php'; ?>