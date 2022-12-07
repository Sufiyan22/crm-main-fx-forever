<?php
include('function.inc.php');
include('./database/config.php');
session_start();


if(isset($_POST['submitRecord'])) {
  $id = "";
  $client_name = "";
  $client_email = "";
  $client_number = "";

  $trading_experience = "";
  $ib_experience = "";
  $ib_of_broker = "";
  $active_clients = "";
  $per_lot_rebate = "";
  $other_benefits = "";
  $services = "";
  $marketing = "";
  $how_did_you_know_us = "";
  $monthly_deposited_clients = "";
  $monthly_lots = "";
  $what_you_want = "";
  $staff_opinion = "";
  $willingness_to_join_us = "";
  $comments = "";
  $submitRecord = "";
  $starting_date_time = "";
  $follow_up_date_time = "";
  $added_on = "";
  $added_by = "";
  //Storing current date & Time
  $added_on = date("Y-m-d");
  // $time = date("h:i:s A");

  @$client_name = $_POST['client_name']="";

  @$client_email = $_POST['client_email'];

  @$client_number = $_POST['client_number'];

  @$trading_experience = $_POST['trading_experience'];

  @$ib_experience = $_POST['ib_experience'];

  @$ib_of_broker = $_POST['ib_of_broker'];
  $ib_of_broker = implode(" , ", $ib_of_broker);

  @$active_clients = $_POST['active_clients'];

  @$per_lot_rebate = $_POST['per_lot_rebate'];

  @$other_benefits = $_POST['other_benefits'];
  @$other_benefits = implode(" , ", $other_benefits);


  @$services = $_POST['services'];
  @$services = implode(" , ", $services);

  @$marketing = $_POST['marketing'];
  @$marketing = implode(" , ", $marketing);

  @$how_did_you_know_us = $_POST['how_did_you_know_us'];
  @$how_did_you_know_us = implode(" , ", $how_did_you_know_us);


  @$monthly_deposited_clients = $_POST['monthly_deposited_clients'];

  @$monthly_lots = $_POST['monthly_lots'];

  @$what_you_want = $_POST['what_you_want'];
  @$what_you_want = implode(" , ", $what_you_want);


  @$staff_opinion = $_POST['staff_opinion'];

  @$willingness_to_join_us = $_POST['willingness_to_join_us'];

  @$comments = $_POST['comments'];

  @$starting_date_time = $_POST['starting_date_time'];

  @$follow_up_date_time = $_POST['follow_up_date_time'];

  if ($id == '') {
    $sql = "select * from tbl_clients_records where client_email='$client_email'";
  } else {
    $sql = "select * from tbl_data where client_email and client_email!='$client_email'";
  }
  if (mysqli_num_rows(mysqli_query($con, $sql)) > 0) {
    $msg = "Client email already added";
  } else {
    if ($id == '') {
      $query = "INSERT INTO `tbl_clients_records`(`client_name`, `client_email`, `client_number`, `trading_experience`, `ib_experience`, `ib_of_broker`, `active_clients`, `per_lot_rebate`, `other_benefits`, `services`, `marketing`, `how_did_you_know_us`, `monthly_deposited_clients`, `monthly_lots`, `what_you_want`, `starting_date_time`, `follow_up_date_time`, `staff_opinion`, `willingness_to_join_us`, `comments`, `added_on`, `added_by`) VALUES ('$client_name','$client_email','$client_number','$trading_experience','$ib_experience','$ib_of_broker','$active_clients','$per_lot_rebate','$other_benefits','$services','$marketing','$how_did_you_know_us','$monthly_deposited_clients','$monthly_lots','$what_you_want','$starting_date_time','$follow_up_date_time','$staff_opinion','$willingness_to_join_us','$comments','$added_on','1')";

      $fire = mysqli_query($con, $query) or die("Can not insert data into database." . mysqli_error($con));
      if ($fire) {
        $success_msg = "Data Submitted to Database";
        redirect('index.php?success_msg=' . $success_msg);
      }
    } else {
      mysqli_query($con, "UPDATE `tbl_clients_records` SET `id`='[value-1]',`client_name`='[value-2]',`client_email`='[value-3]',`client_number`='[value-4]',`trading_experience`='[value-5]',`ib_experience`='[value-6]',`ib_of_broker`='[value-7]',`active_clients`='[value-8]',`per_lot_rebate`='[value-9]',`other_benefits`='[value-10]',`services`='[value-11]',`marketing`='[value-12]',`how_did_you_know_us`='[value-13]',`monthly_deposited_clients`='[value-14]',`monthly_lots`='[value-15]',`what_you_want`='[value-16]',`starting_date_time`='[value-17]',`follow_up_date_time`='[value-18]',`staff_opinion`='[value-19]',`willingness_to_join_us`='[value-20]',`comments`='[value-21]',`added_on`='[value-22]',`added_by`='[value-23]' WHERE 1");
    }
    redirect('clients.php');
  }
}

// if(isset($_SESSION['USER_ROLE']) && $_SESSION['USER_ROLE']>0){
// 	redirect('index.php');
// 	die();
// }
// else
// {
// 	redirect('login.php');
// }
$msgg;
$get_id;
$_SESSION['ADMIN_USER_NAME'] = "";
$get_id = $_SESSION['ADMIN_USER_ID'] = "";
$get_role = $_SESSION['USER_ROLE'] = "";

$staff_name = $_SESSION['ADMIN_USER_NAME'];
$get_id = $_SESSION['ADMIN_USER_ID'];
$get_role = $_SESSION['USER_ROLE'];


// if(!isset($_SESSION['IS_LOGIN'])){
// 		redirect('login.php');
// }


?>
