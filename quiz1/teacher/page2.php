<?php include '../config.php'; ?>
<?php
//checkAuth('Admin');
$qry = "SELECT questions.*,options.* FROM questions  INNER JOIN options ON questions.Question=options.quesID WHERE questions.subjectID='Introduction to programming'";
$result = mysqli_query($con,$qry);//questions
 if(isset($_POST['submit']))
 {
if(!empty($_POST)) 
{
	$answers= $_POST['answers'];//$result['option1']
echo $answers;//show answer
	
}
 }
?>


<?php include 'header.php'; ?>

<?php
 while ($row_all = mysqli_fetch_assoc($result)) 
                {
                    echo '<form method="post">';
                        echo '<u>'.$row_all["name"].'</u>';

                        echo '<br>';

                        echo '<button name="add_to_cart" value='.$row_all['name'].' type="submit">Add to Cart</button>';

                        echo '<hr>';
                    echo '</form>';



                }



            if(isset($_POST["add_to_cart"]))
            {

                //CREATE A VARIABLE THAT HOLDS THE SELECTED PRODUCTED TO BE ADDED TO CART
                    $selectedProduct = $_POST["add_to_cart"];

                echo 'Selected Product  = '.$selectedProduct;

            }

    mysqli_close($conn);
	?>