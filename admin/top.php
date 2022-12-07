<?php
session_start();
// include('database.inc.php');
include('function.inc.php');
// include('constant.inc.php');
include('../include/config.php');

// $_SESSION['ADMIN_USER']="";
$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];

if(!isset($_SESSION['IS_LOGIN'])){
	redirect('login.php');
  die();
}
$page_title='';
if($cur_path=='' || $cur_path=='index.php'){
	$page_title='Dashboard';
}elseif($cur_path=='clients.php' || $cur_path=='clients.php'){
	$page_title='Manage Clients';
}

if($_SESSION['USER_ROLE']==1)
{
  $name_p="Admin";
}
elseif($_SESSION['USER_ROLE']==0)
{
  $name_p="Staff";
// echo "dfd";
  redirect('login.php');
}
else
{
  // redirect('./login.php');
  // echo "ergs";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $page_title?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
              <p><?php echo $name_p; ?></p>
            </button>
          </li>
          
        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"><img src="#" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="#" alt="logo"/></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name">Logout</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         

       
          <li class="nav-item">
            <a class="nav-link" href="clients.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title"> Clients</span>
            </a>
          </li>
      
          <li class="nav-item">
            <a class="nav-link" href="staff.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title"> Staff </span>
            </a>
          </li>
     

          <!-- <li li class="nav-item">
            <a class="nav-link" href="manage_clients_by_staff.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title"> Manage Staff </span>
            </a>
          </li> -->

          <!-- <li li class="nav-item">
            <a class="nav-link" href="client_record.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title"> Client Record </span>
            </a>
          </li> -->

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">