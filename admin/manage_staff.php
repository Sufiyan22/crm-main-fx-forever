<?php 
include('top.php');
$staff_name= $_SESSION['ADMIN_USER'];
$msg="";
$f_name="";
$email="";
// $phone="";
$password="";
$l_name="";
$role="";
$id="";
$services=array();
//Storing current date & Time
$date = date("Y-m-d");
$time = date("h:i:s A");

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from tbl_users where id='$id'"));
	$f_name=$row['f_name'];
	$l_name=$row['l_name'];
	// $phone=$row['phone'];
	$password=$row['password'];
	$email=$row['email'];
	$role=$row['role'];
}

if(isset($_POST['submit'])){
	$f_name=get_safe_value($_POST['f_name']);
	$l_name=get_safe_value($_POST['l_name']);
	// $phone=get_safe_value($_POST['phone']);
	$password=get_safe_value($_POST['password']);
	$email=get_safe_value($_POST['email']);
	$role=get_safe_value($_POST['role']);
	// echo $b;


	//Storing current date & Time
	$date = date("Y-m-d");
	$time = date("h:i:s A");
	// $added_on=date('Y-m-d h:i:s');
	
	
	if($id==''){
		$sql="select * from tbl_users where email='$email'";
	}else{
		$sql="select * from tbl_users where email='$email' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="E-mail already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into tbl_users(f_name,l_name,email,password,role,created_date,created_time) values('$f_name','$l_name','$email','$password','$role','$date','$time')");

			$success_msg="Data submitted to database";
			redirect('manage_staff.php?success_msg='.$success_msg);


		}else{
			mysqli_query($con,"update tbl_users set f_name='$f_name',l_name='$l_name',email='$email', password='$password', role='$role' where id='$id'");
		}
		redirect('staff.php');
	}
}

$res_category=mysqli_query($con,"select * from tbl_users order by id asc");

?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Staff</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">

                    <div class="form-group">
                      <label for="exampleInputName1">Staff First Name</label>
                      <input type="text" class="form-control" placeholder="Staff First Name" name="f_name" required value="<?php echo $f_name?>">
                    </div>

					<div class="form-group">
                      <label for="exampleInputName1">Staff Last Name</label>
                      <input type="text" class="form-control" placeholder="Staff Last Name" name="l_name" required value="<?php echo $l_name?>">
                    </div>

					<div class="form-group">
                      <label for="exampleInputName1">E-mail</label>
                      <input type="email" class="form-control" placeholder="E-mail" name="email" required value="<?php echo $email?>">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>

					<div class="form-group">
                      <label for="exampleInputName1">Password</label>
                      <input type="text" class="form-control" placeholder="Password" name="password" required value="<?php echo $password?>">
                    </div>

				

                    <div class="form-group">
                      <label for="exampleInputName1">Staff Role</label>
                      <select class="form-control" name="role" required>
						<option value="">Select Role</option>
						<option value="0" selected>Staff</option>
						<option value="1" >Admin</option>
					  </select>
					  
                    </div>
					<div id="mydiv">
					<h3 style="font-weight: bold;color:green;"><?php  if(isset($_GET['success_msg'])) echo $_GET['success_msg'];  ?></h3><hr><br>
					</div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		 <script>
			setTimeout(function() {
 		   $('#mydiv').fadeOut('fast');
			}, 2000); 
// <-- time in milliseconds
		 </script>
<?php include('footer.php');?>