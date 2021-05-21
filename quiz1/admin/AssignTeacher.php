
<?php include '../config.php'; ?>
<?php include 'header.php'; ?>
<?php
if(isset($_POST['done']))
{
////tName,subjectsName
if(empty($_POST['tName'])||empty($_POST['subjectsName']))
 {
	  echo 'Fields should not empty';
}
 else
 {
	
 $tName = $_POST['tName'];
 $subjectsName = $_POST['subjectsName'];
 
 
 //INSERT INTO `teacher_subjects`(`teacherID`, `subjectID`) VALUES ([value-1],[value-2])
 
 $q1 = "INSERT INTO `teacher_subjects`(`teacherID`,`subjectID`) VALUES ('$tName','$subjectsName')";

 $query = mysqli_query($con,$q1);
 
 
 echo 'Data is saved  successfully';
  
 }
 
}
?>

 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Assign  Subjects to teachers </h1>
 </div><br>
  


 <br>
 Teacher Name
 <select name="tName">
    <option disabled selected>-- Select Teacher--</option>
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT name From users where usertype='teacher'");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['name'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
 
 <br>
 SubjectID: 
 <select name="subjectsName">
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