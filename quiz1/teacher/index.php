<?php include '../config.php'; ?>
<?php

//Teacher
//checkAuth('Teacher');
$user = $_SESSION['auth'];
 echo $user;
?>
<?php include 'header.php'; ?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-secondary"><span class="text-success">T</span>eacher Pannel</h1>
    </div>
<?php
if(!empty($_SESSION['message'])) {

    echo "<div class='alert alert-success alert-dismissible'>" .
        $_SESSION['message'] .
        '<button type="button" class="close" data-dismiss="alert">&times;</button>' .
        "</div>";
    unset($_SESSION['message']);
}
?>
   
