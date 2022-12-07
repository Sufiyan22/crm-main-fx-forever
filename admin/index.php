<?php include('top.php');

if(isset($_SESSION['USER_ROLE']) && $_SESSION['USER_ROLE']>0){
	// redirect('index.php');
	die();
}
else
{
	redirect('login.php');
}
if(!isset($_SESSION['IS_LOGIN'])){
		redirect('login.php');
}

?>

<?php include('footer.php');?>