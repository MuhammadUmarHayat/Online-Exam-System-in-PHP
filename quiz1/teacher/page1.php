<?php
// Start the session
session_start();

if (empty($_SESSION["s"])) 
{	echo "session is empty";
}
else
{
	$n=$_SESSION["s"];
echo $n;
	
}
?>
<html>  
<body>  
<form action="page1.php" method="post">  
Enter First Number:  
<input type="number" id="n1" name="number1" value=<?php echo $n ?> /><br><br>  
<br><br>  
<div>
 
 </div>


<input  type="submit" name="submit" value="Add">  
</form> 
<?php  
    if(isset($_POST['submit']))  
    {  
        $number1 = $_POST['number1'];  
      
        $number1++;  
		$_SESSION["s"]=$number1;
	
  header("Location: http://localhost/quiz1/teacher/page1.php");
	
	}
?>

</body>  
</html>  
