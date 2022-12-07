<?php
include('../include/config.php');

include('function.inc.php');
session_start();
$my_name = $_SESSION['ADMIN_USER_NAME'];
$get_role = $_SESSION['USER_ROLE'];
$get_id = $_SESSION['ADMIN_USER_ID'];

if(!isset($_SESSION['IS_LOGIN'])){
  redirect('login.php');
}

if($_SESSION['USER_ROLE']>0){
	// redirect('index1.php');
  
	// die();

}
else
{
	// redirect('login.php');
}
$msgg;
$get_id;
// $_SESSION['ADMIN_USER_NAME'] = "";
// $get_id = $_SESSION['ADMIN_USER_ID'] = "";
// $get_role = $_SESSION['USER_ROLE'] = "";

// $staff_name = $_SESSION['ADMIN_USER_NAME'];
// $get_id = $_SESSION['ADMIN_USER_ID'];
// $get_role = $_SESSION['USER_ROLE'];




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

  @$client_name = $_POST['client_name'];

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

   $query = "INSERT INTO `tbl_clients_records`(`client_name`, `client_email`, `client_number`, `trading_experience`, `ib_experience`, `ib_of_broker`, `active_clients`, `per_lot_rebate`, `other_benefits`, `services`, `marketing`, `how_did_you_know_us`, `monthly_deposited_clients`, `monthly_lots`, `what_you_want`, `starting_date_time`, `follow_up_date_time`, `staff_opinion`, `willingness_to_join_us`, `comments`, `added_on`, `added_by`) VALUES ('$client_name','$client_email','$client_number','$trading_experience','$ib_experience','$ib_of_broker','$active_clients','$per_lot_rebate','$other_benefits','$services','$marketing','$how_did_you_know_us','$monthly_deposited_clients','$monthly_lots','$what_you_want','$starting_date_time','$follow_up_date_time','$staff_opinion','$willingness_to_join_us','$comments','$added_on','$get_id')";
  // die($query);



  $fire = mysqli_query($con, $query) or die("Can not insert data into database." . mysqli_error($con));
  echo '<script> alert("success") </script>';
  if ($fire>0) {
    $success_msg = "Data Submitted to Database";
    redirect('index1.php?success_msg=' . $success_msg);
   
    
  }
    redirect('index1.php');
  

}



?>

<style>
  .table td,
  .table th {
    padding: 0rem !important;
  }

  .date_css {
    border: 1px solid #d1d3e2;
    padding: 5px;
    border-radius: 5px;
  }


  .btn_logout {
    border: 1px solid #4e73df;
    padding: 5px;
    border-radius: 10px;
  }

  .btn_logout:hover {
    background-color: #4e73df;
    color: #ffffff;
    transition: 0.6s;
    text-decoration: none;
  }


  .para_1 {
    margin-top: 3px;
    background-color: #4e73df;
    color: #fff !important;
    /* border-radius: 10px; */
    padding: 3px;
  }

  @media only screen and (max-width: 570px) {
    .media_set {
      text-align: center;
      justify-content: space-around;
      align-items: center;
      float: inherit !important;
    }

    .media_set p {
      float: inherit !important;
    }
  }
</style>
<?php include('panel-top.php'); ?>

<!-- <div class="container"> -->

<div class="" style="background:#fff;padding:10px;margin-top:10px">
  <form method="post">
    <!-- <h6 style="text-align: center;font-weight:bold;">ENTER A NEW RECORD</h6> -->
    <div class="row">
      <div class="col-md-4">
        <ul class="nav navbar-nav">

          <li style="font-weight:bold;">Hello -<?php echo $my_name; ?> <a href="logout.php" class="btn_logout">Logout</a>
          </li>
          <li style="font-weight:bold;">Role <?php 
          if($get_role=="1")
          {
            $get_role = "ADMIN";
          }
          else
          {
            $get_role = "STAFF";
          }
          echo $get_role;
          ?>

          </li>

        </ul>
        <div id="mydiv">
      <h3 style="font-weight: bold;color:green;"><?php if (isset($_GET['success_msg'])) echo $_GET['success_msg'];  ?></h3>
      <hr><br>
    </div>
      </div>
      <div class="col-md-4">
        <h1 class="h4 text-gray-900 mb-4" style="text-align: center;">ENTER A NEW RECORD</h1>
      </div>
      <div class="col-md-4">
        <div class="input-group rounded">
          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
          <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
          </span>
        </div>
      </div>
    </div>

    <div class="row" style="margin:0px">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="form-group">
          <label for="first">Client Name</label>
          <input type="text" class="form-control" name="client_name" placeholder="" id="first">
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="form-group">
          <label for="last">Client E-mail</label>
          <input type="email" class="form-control" name="client_email" placeholder="" id="last">
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="form-group">
          <label for="first">Client Number (Whatsapp)</label>
          <input type="number" class="form-control" name="client_number" placeholder="" id="first">
        </div>
      </div>
    </div>
    <!-- 
    ***********************************************************
 -->
    <p for="trading_experience" class="para_1" style="text-align: center;color:#4e73df;font-weight:bold;margin:0%">Client Background & Potential</p>

    <div class="row">

      <div class="col-lg-8">
        <div class="row">
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">

            <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Trading Experience</p><br><br><br>

            <div class="radio">
              <label>
                <input type="radio" name="trading_experience" id="trading_experience" value="0"> 0 Years+
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="radio" name="trading_experience" id="trading_experience" value="01">01 Years+
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="trading_experience" id="trading_experience" value="3">3 Years+
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="trading_experience" id="trading_experience" value="5">5 Years+
              </label>
            </div>
          </div>
          <!-- *********************** -->

          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
            <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">IB Experience</p><br><br><br>
            <div class="radio">
              <label>
                <input type="radio" name="ib_experience" id="ib_experience" value="0"> 0 Years+
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="radio" name="ib_experience" id="ib_experience" value="01">01 Years+
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="ib_experience" id="ib_experience" value="3">3 Years+
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="ib_experience" id="ib_experience" value="5">5 Years+
              </label>
            </div>
          </div>
          <!-- **************************** -->
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
            <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">IB of Broker</p><br><br><br>

            <div class="radio">
              <label>
                <input type="checkbox" name="ib_of_broker[]" id="ib_of_broker" value="xm"> XM
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="ib_of_broker[]" id="ib_of_broker" value="exness">Exness
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="ib_of_broker[]" id="ib_of_broker" value="octa-fx">Octa FX
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="ib_of_broker[]" id="ib_of_broker" value="hot-forex">Hot Forex
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="ib_of_broker[]" id="ib_of_broker" value="FBS"> FBS
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="ib_of_broker[]" id="ib_of_broker" value="IC-Market">IC Market
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="ib_of_broker[]" id="ib_of_broker" value="Xtreme-Market">Xtreme Market
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="text" name="ib_of_broker[]" style="width: 90%;" id="ib_of_broker" placeholder="Other...">
              </label>
            </div>
          </div>

          <!-- ************************ -->
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
            <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Active Clients</p><br><br><br>

            <div class="radio">
              <label>
                <input type="radio" name="active_clients" id="active_clients" value="3"> 3 Years+
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="radio" name="active_clients" id="active_clients" value="05">05 Years+
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="active_clients" id="active_clients" value="15"> 15 Years+
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="radio" name="active_clients" id="active_clients" value="25">25 Years+
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="active_clients" id="active_clients" value="50">50 Years+
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="active_clients" id="active_clients" value="100">100 Years+
              </label>
            </div>
          </div>

          <!-- ****************************** -->
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
            <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Per Lot Rebate</p><br><br><br>

            <div class="radio">
              <label>
                <input type="radio" onclick = "radioButton1(this)" name="per_lot_rebate" id="per_lot_rebate" class="per_lot_class" value="3" >03 Years+
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="radio" onclick = "radioButton1(this)"  name="per_lot_rebate" class="per_lot_class" id="per_lot_rebate" value="05">05 Years+
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" onclick = "radioButton1(this)"  name="per_lot_rebate" class="per_lot_class" id="per_lot_rebate" value="8">8 Years+
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" onclick = "radioButton1(this)"  name="per_lot_rebate" class="per_lot_class" id="per_lot_rebate" value="10">10 Years+
              </label>
            </div>

            <div class="radio">
              <label>
                <input type="radio" value="on"  onclick = "radioButton1(this)"  name="per_lot_rebate" id="others" value="Other-and-spread-share">
              </label>
            </div>
            
            <div class="radio">
              <label> Other / Spread Share %
                <input type="text" style="width: 90%;" name="per_lot_rebate"   id="other_textbox1" disabled placeholder="Spread Share % / Other..." >
              </label>
            </div>
            <!-- <div class="radio">
              <label>
                <input type="text" name="per_lot_rebate" style="width: 90%;" id="per_lot_rebate" placeholder="Spread Share %">
              </label>
            </div> -->
          </div>

          <!-- ************************************ -->
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
            <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Other Benefits</p><br><br><br>

            <div class="radio">
              <label>
                <input type="checkbox" name="other_benefits[]" id="other_benefits" value="office-expenses"> Office Expenses
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="other_benefits[]" id="other_benefits" value="fund-support">Fund Support
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="other_benefits[]" id="other_benefits" value="sponsorship">Sponsorship
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="text" name="other_benefits[]" style="width: 90%;" id="other_benefits" placeholder="Others...">
              </label>
            </div>
          </div>
        </div>

        <!--  ******************* -->

      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-xl-4 col-lg-2 col-md-2 col-sm-4 col-12 media_set">

            <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Services</p><br><br><br>

            <div class="radio">
              <label>
                <input type="checkbox" name="services[]" id="services" value="signals"> Signals
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="services[]" id="services" value="mentor">Mentor
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="services[]" id="services" value="influencer">Influencer
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="services[]" id="services" value="youtuber">YouTuber
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="services[]" id="services" value="ea/indicator"> EA/Indicator
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="services[]" id="services" value="trader-copier">Trader Copier
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="services[]" id="services" value="forex-course">Forex Course
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="services[]" id="services" value="fund-management">Fund Management
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="text" style="width: 90%;"  placeholder="Others..." name="services[]" id="services">
              </label>
            </div>
          </div>
          <!-- *********************** -->

          <div class="col-xl-4 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
            <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Marketing</p><br><br><br>
            <div class="radio">
              <label>
                <input type="checkbox" name="marketing[]" id="marketing" value="facebook"> Facebook
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="marketing[]" id="marketing" value="twitter">Twitter
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="marketing[]" id="marketing" value="instagram">Instagram
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="marketing[]" id="marketing" value="whatsapp">Whatsapp
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="marketing[]" id="marketing" value="linkedin">Linkedin
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="marketing[]" id="marketing" value="paid-boostings">Paid Boostings
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="marketing[]" id="marketing" value="offline-marketing">Offline Marketing
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="text" style="width: 90%;"  placeholder="Others..." name="marketing[]" id="marketing">
              </label>
            </div>
          </div>
          <!-- **************************** -->
          <div class="col-xl-4 col-lg-2 col-md-2 col-sm-4 col-12 media_set">

            <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">How did you know us?</p><br><br><br>

            <div class="radio">
              <label>
                <input type="checkbox" name="how_did_you_know_us[]" id="how_did_you_know_us" value="word-of-mouth"> Word Of Mouth
              </label>

            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="how_did_you_know_us[]" id="how_did_you_know_us" value="friends">Friends
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="how_did_you_know_us[]" id="how_did_you_know_us" value="social_network">Social Network
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="how_did_you_know_us[]" id="how_did_you_know_us" value="search_engines">Search Engines
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="checkbox" name="how_did_you_know_us[]" id="how_did_you_know_us" value="ads">Ads
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="text" style="width: 90%;" placeholder="Others..." name="how_did_you_know_us[]" id="how_did_you_know_us">
              </label>
            </div>
          </div>
        </div>

        <!--  ******************* -->

      </div>
    </div>

    <!-- **************** -->
    <div class="row">
      <div class="col-lg-4">
        <p for="trading_experience" style="text-align: center;color:#4e73df;font-weight:bold" class="para_1">Client Business for us</p>
      </div>
      <div class="col-lg-4">
        <p for="trading_experience" style="text-align: center;color:#4e73df;font-weight:bold" class="para_1">Client's requirments and starting of business with us</p>
      </div>
      <div class="col-lg-4">
        <p for="trading_experience" style="text-align: center;color:#4e73df;font-weight:bold" class="para_1">Write small summary or comment for this call</p>
      </div>
    </div>



    <div class="row">
      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
        <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Monthly Deposited Clients</p><br><br><br>
        <div class="radio">
          <label>
            <input type="radio" onclick = "radioButton2(this)"  name="monthly_deposited_clients" id="monthly_deposited_clients" value="5"> 5 Years+
          </label>

        </div>
        <div class="radio">
          <label>
            <input type="radio" onclick = "radioButton2(this)"  name="monthly_deposited_clients" id="monthly_deposited_clients" value="10">10 Years+
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" onclick = "radioButton2(this)"  name="monthly_deposited_clients" id="monthly_deposited_clients" value="20">20 Years+
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" onclick = "radioButton2(this)"  name="monthly_deposited_clients" id="monthly_deposited_clients" value="50">50 Years+
          </label>
        </div>
        
        <div class="radio">
              <label>
                <input type="radio" value="on" onclick = "radioButton2(this)"  name="monthly_deposited_clients" id="others" value="Other-and-spread-share">
              </label>
            </div>
            
        <div class="radio">
          <label>
            <input type="text" name="monthly_deposited_clients  "   id="other_textbox2" disabled  placeholder="Spread Share % / Other">
          </label>
        </div>
      </div>
      <!-- *********************** -->

      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
        <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Monthly Lots</p><br><br><br>
        <div class="radio">
          <label>
            <input type="radio"  onclick = "radioButton3(this)"  name="monthly_lots" id="monthly_lots" value="30"> 30+
          </label>

        </div>
        <div class="radio">
          <label>
            <input type="radio"  onclick = "radioButton3(this)"  name="monthly_lots" id="monthly_lots" value="50">50+
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio"  onclick = "radioButton3(this)"  name="monthly_lots" id="monthly_lots" value="100">100+
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio"  onclick = "radioButton3(this)"  name="monthly_lots" id="monthly_lots" value="200">200+
          </label>
        </div>

        <div class="radio">
              <label>
                <input type="radio" value="on" onclick = "radioButton3(this)"  name="monthly_lots" id="others" value="Other-and-spread-share">
              </label>
            </div>
            
        <div class="radio">
          <label>
            <input type="text" name="monthly_lots"   id="other_textbox3" disabled  placeholder="Spread Share % / Other">
          </label>
        </div>
      </div>
      <!-- **************************** -->
      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
        <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">What do you want?</p><br><br><br>

        <div class="radio">
          <label>
            <input type="checkbox" name="what_you_want[]" id="what_you_want" value="LD-Service"> LD Service
          </label>

        </div>
        <div class="radio">
          <label>
            <input type="checkbox" name="what_you_want[]" id="what_you_want" value="Fund-Support"> Fund Support
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="checkbox" name="what_you_want[]" id="what_you_want" value="Office-Expense"> Office Expense
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="text" name="what_you_want[]" id="what_you_want" placeholder="Others">
          </label>
        </div>
      </div>

      <!-- ************************ -->
      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
        <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Starting Date Time</p><br><br><br>

        <input type="datetime-local" class="form-group" name="starting_date_time" style="width:80%;padding:3px;">
        <br>
        <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Follow-up Date</p><br><br><br>

        <input type="datetime-local" class="form-group" name="follow_up_date" style="width:80%;padding:3px;">
      </div>

      <!-- ****************************** -->
      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
        <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Staff Opinion</p><br><br><br>

        <div class="radio">
          <label>
            <input type="radio" onclick = "radioButton4(this)" name="staff_opinion" id="staff_opinion" value="3"> Per Lot $3
          </label>

        </div>
        <div class="radio">
          <label>
            <input type="radio" onclick = "radioButton4(this)" name="staff_opinion" id="staff_opinion" value="5">Per Lot $5
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" onclick = "radioButton4(this)" name="staff_opinion" id="staff_opinion" value="8">Per Lot $8
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" onclick = "radioButton4(this)" name="staff_opinion" id="staff_opinion" value="10">Per Lot $10
          </label>
        </div>
        <div class="radio">
              <label>
                <input type="radio" value="on" onclick = "radioButton4(this)"  name="staff_opinion" id="others" value="Other-and-spread-share">
              </label>
            </div>
            
        <div class="radio">
          <label>
            <input type="text" name="staff_opinion"   id="other_textbox4" disabled  placeholder="Spread Share % / Other">
          </label>
        </div>

      </div>

      <!-- ************************************ -->
      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12 media_set">
        <p style="text-align: center;color:#4e73df;font-weight:bold;float:left" class="para_1">Willingness to join us?</p><br><br><br>

        <div class="radio">
          <label>
            <input type="radio" name="willingness_to_join_us" id="willingness_to_join_us" value="0"> 0%
          </label>

        </div>
        <div class="radio">
          <label>
            <input type="radio" name="willingness_to_join_us" id="willingness_to_join_us" value="10">10%
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="willingness_to_join_us" id="willingness_to_join_us" value="30">30%
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="willingness_to_join_us" id="willingness_to_join_us" value="50">50%
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="willingness_to_join_us" id="willingness_to_join_us" value="75">75%
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="willingness_to_join_us" id="willingness_to_join_us" value="90">90%
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="willingness_to_join_us" id="willingness_to_join_us" value="100">100%
          </label>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="form-group col-lg-12">
        <label for="exampleFormControlTextarea1">WRITE SMALL SUMMARY OR COMMENT FOR THIS CALL</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="comments" placeholder="Write comment here!" rows="4" cols="50"></textarea>
      </div>
    </div>





    <!-- 
    <label for="newsletter">Would you like to recieve our email newsletter?</label>
    <div class="checkbox">

      <label>
        <input type="checkbox" value="Sure!" id="newsletter"> Sure!
      </label>
    </div> -->


  
    <!-- <a href="#" >
                           
                        </a> -->
    <input type="submit" name="submitRecord" class="btn btn-primary btn-user btn-block" value="SUBMIT CLIENT DATA" />
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
  setTimeout(function() {
    $('#mydiv').fadeOut('fast');
  }, 2000);
 
</script>
<!-- </div> -->
<script>


  function radioButton1(o) {

    // var others = document.getElementById("others");
  // var other_textbox = document.getElementById("other_textbox");
  // var per_lot_class = document.getElementsByClassName("per_lot_class");

var text = document.getElementById("other_textbox1");

if (o.value == "on") {
  text.removeAttribute("disabled", "");
  text.setAttribute("enabled", "");
  // o.value="";
} else {
  text.removeAttribute("enabled", "");
  text.setAttribute("disabled", "");
  // o.value="";
}
  }

  function radioButton2(o) {


var text = document.getElementById("other_textbox2");

if (o.value == "on") {
text.removeAttribute("disabled", "");
text.setAttribute("enabled", "");
// o.value="";
} else {
text.removeAttribute("enabled", "");
text.setAttribute("disabled", "");
// o.value="";
}
}


function radioButton3(o) {


var text = document.getElementById("other_textbox3");

if (o.value == "on") {
text.removeAttribute("disabled", "");
text.setAttribute("enabled", "");
// o.value="";
} else {
text.removeAttribute("enabled", "");
text.setAttribute("disabled", "");
// o.value="";
}
}


function radioButton4(o) {


var text = document.getElementById("other_textbox4");

if (o.value == "on") {
text.removeAttribute("disabled", "");
text.setAttribute("enabled", "");
// o.value="";
} else {
text.removeAttribute("enabled", "");
text.setAttribute("disabled", "");
// o.value="";
}
}

</script>
<?php include('panel-footer.php'); ?>
