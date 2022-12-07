<?php
include('../include/config.php');
$id = $_GET['nameid'];
mysqli_query($con,"delete from tbl_data where id='$id'");

		// redirect('staff.php');
// echo $id;   
 
?>