<?php 
include('top.php');
// include('function.inc.php');

// session_start();
// if(isset($_SESSION['ROLE']) && $_SESSION['ROLE']=='1'){
// 	redirect('index.php');
// 	die();
// }
// else
// {
// 	redirect('login.php');
// }

if(isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	if(1==1){
	// mysqli_query($con,"delete from tbl_users where id='$id'");
	// 	redirect('staff.php');
	?>

	
	<?php
	}
	

}
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	if($type='delete'){
	
		mysqli_query($con,"delete from tbl_data where id='$id'");
		redirect('clients.php');
	}
	else
	{
		redirect('clients.php');
	}
	

}
$sql="select * from tbl_data order by id DESC";
$res=mysqli_query($con,$sql);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Client Master</h1>
			  <a href="manage_clients_by_staff.php" class="add_link">Add Data</a>
              <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%" aria-sort="descending" >S.No #</th>
                            <th width="20%">Name</th>
                            <th width="15%">E-mail</th>
							<th width="15%">Services</th>
                            <th width="20%">Broker</th>
							<th width="20%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['name']?></td>
							<td><?php echo $row['email']?></td>
							<td><?php echo $row['services']?></td>
							<td>
							<?php
							// echo $broker_name = $row['brokers'];
							if($row['brokers']=="1")
							{
								$broker_name = "XM";
							}
							elseif($row['brokers']=="2")
							{
								$broker_name = "Exness";
							}
							elseif($row['brokers']=="3")
							{
								$broker_name="Octa FX";
							}

							echo $broker_name;?>
							</td>
							<td>
								<a href="manage_clients_by_staff.php?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
							
								&nbsp;
					<a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red hand_cursor"  onclick="return confirm('Are you sure want to delete?');">Delete</label></a>

					<!-- <a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a> -->
							</td>
                           
                        </tr>
                        <?php 
						$i++;
						} } else { ?>
						<tr>
							<td colspan="5">No data found</td>
						</tr>
						<?php } ?>
                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          </div>
		  <script>
		function deleteItem(id)
		{
			// alert("Deleted Success");
			if(confirm("are you sure?"))
				{
					
					$.get("clients-delete.php?nameid="+id,function(res)
					{
						
						// alert("Deleted Success");
						// window.location.href="clients-delete.php";
						
					})
					
				}
		}
	</script>
<?php include('footer.php');?>