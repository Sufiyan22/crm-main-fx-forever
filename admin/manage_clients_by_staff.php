
<?php 
include('top.php');
$get_id;
$_SESSION['ADMIN_USER']="";
$staff_name= $_SESSION['ADMIN_USER'];
$get_id=$_SESSION['ADMIN_USER_ID'];
$msg="";
$name="";
$email="";
$brokers="";
$services="";
$id="";
$services=array();

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from tbl_data where id='$id'"));
	$name=$row['name'];
	$email=$row['email'];
	$brokers=$row['brokers'];
	$services=$row['services'];
}

if(isset($_POST['submit'])){
	$success_msg = "";
	$name=get_safe_value($_POST['name']);
	$email=get_safe_value($_POST['email']);
	$brokers=get_safe_value($_POST['brokers']);
	$services=$_REQUEST['services'];
	$ser_imp=implode(" , ",$services);
	// echo $b;


	//Storing current date & Time
	$date = date("Y-m-d");
	$time = date("h:i:s A");
	// $added_on=date('Y-m-d h:i:s');
	
	
	if($id==''){
		$sql="select * from tbl_data where email='$email'";
	}else{
		$sql="select * from tbl_data where email and email!='$email'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="email already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into tbl_data(name,email,brokers,services,created_date,created_time,created_by_id,created_by_name) values('$name','$email',$brokers,'$ser_imp','$date','$time','$get_id','$staff_name')");
			
			$success_msg="Data submitted to database";
			redirect('manage_clients_by_staff.php?success_msg='.$success_msg);

		}else{
			mysqli_query($con,"update tbl_data set name='$name', email='$email', brokers='$brokers', services='$ser_imp' where id='$id'");
		}
		redirect('clients.php');
	}
}

$res_brokers=mysqli_query($con,"select * from tbl_brokers order by id asc");

?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Category</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">

                    <div class="form-group">
                      <label for="exampleInputName1">Client Name</label>
                      <input type="text" class="form-control" placeholder="Client Name" name="name" required value="<?php echo $name?>">
                    </div>

					<div class="form-group">
                      <label for="exampleInputName1">E-mail</label>
                      <input type="email" class="form-control" placeholder="E-mail" name="email" required value="<?php echo $email?>">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>

					<div class="form-group">
                      <label for="exampleInputName1">Brokers</label>
                      <select class="form-control" name="brokers" required>
						<option value="<?php echo $brokers; ?>">Select Broker</option>
						<?php
						while($row_category=mysqli_fetch_assoc($res_brokers)){
							if($row_category['id']==$category_id){
								echo "<option value='".$row_category['id']."' selected>".$row_category['broker_name']."</option>";
							}else{
								echo "<option value='".$row_category['id']."'>".$row_category['broker_name']."</option>";
							}
						}
						?>
					  </select>
					  
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Sevices </label>
                     
					  <!-- <input type="textbox" class="form-control" placeholder="Order Number" name="order_number"  value=""> -->
					  <table border="1" require class="table table-hover table-dark">  
   <tr>  
      <td colspan="2">Select Services:</td>  
   </tr>  
   <tr>  
      <td> Tradeable Bonus</td>  
      <td><input type="checkbox" name="services[]" value="Tradeable-Bonus"></td>  
   </tr>  
   <tr>  
      <td> Fast Withdrawals</td>  
      <td><input type="checkbox" name="services[]" value="Fast-Withdrawals"></td>  
   </tr>  
   <tr>  
      <td> Fast Execuations</td>  
      <td><input type="checkbox" name="services[]" value="Fast-Execuations"></td>  
   </tr>  
   <!-- <tr>  
      <td colspan="2" align="center"><input type="submit" value="submit" name="sub"></td>  
   </tr>   -->
</table>  
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