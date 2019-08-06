<?php 
include("db.php");
    ob_start();
    session_start();
    //Insert Mail Receiver Email Address at $to
    $to="ataur.neub@gmail.com"; 
    include("function/lib.php"); 

 ?>
<?php
  
  //$checkBox = implode(',', $_POST['checkbox1']);


  if(isset($_POST['registration']))
  {
    
    
    $company_name = ucfirst(stripslashes($_POST['company_name']));

    $company_type = ucfirst(stripslashes($_POST['company_type']));

    $no_employee = stripslashes($_POST['no_employee']);

    $contact_person = ucfirst(stripslashes($_POST['contactperson']));

    $designation = ucfirst(stripslashes($_POST['designation']));

    $phone = stripslashes($_POST['phone']);

    $email = stripslashes($_POST['email']);

  
    $address = ucfirst(stripslashes($_POST['address']));

    $checkBox = implode(',', $_POST['checkbox1']);
   // $checkBox = $_POST['checkbox1'];
   // if(!empty($_POST["checkbox1"])){

   // }

    //$msg = stripslashes($_POST['msg']);
    $Time = date('Y-m-d H:i:s');
    //$user_ip = $_SERVER['REMOTE_ADDR'];
    //get user's IP;

/*test*/

$from=$email;
              $fl2=0;
              $subject="ERP Request";
              $msg='<table width="1000" border="0" cellpadding="0" cellspacing="0" vspace="0" hspace="0" align="LEFT">
                <tbody>
                  <tr>
                    <td width="150" style="padding:4px 0px;"><b>company name</b></td>
                    <td>: '.$company_name.'</td>
                  </tr>
                  <tr>
                    <td style="padding:4px 0px;"><b>Contact Number</b></td>
                    <td>: '.$phone.'</td>
                  </tr>
                  <tr>
                    <td style="padding:4px 0px;"><b>Email</b></td>
                    <td>: '.$email.'</td>
                  </tr>
                  <tr>
                    <td valign="top" style="padding:4px 0px;"><b>contact person</b> </td>
                    <td>: '.$contact_person.'</td>
                  </tr>
                 
                </tbody>
              </table>';
              
              
             /* $_SESSION['fl2']=1;*/
              
              sent_mail($to,$from,$company_name,$subject,$msg);
              
             /* header("Location: index.php");*/
            

/*test finish*/



    function get_ip(){
      if(isset($_SERVER['HTTP_CLIENT_IP'])){
        return $_SERVER['HTTP_CLIENT_IP'];
      }
      elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          return $_SERVER['HTTP_X_FORWARDED_FOR'];
      }
      else{
        return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']:'');
      }
    }
    $user_ip=get_ip();
    //get location from user

    $query=@unserialize(file_get_contents('http://ip-api.com/php/'.$user_ip));
    if($query && $query['status']=='success'){
      $country=$query['country'];
      $city=$query['city'];
      $zip=$query['zip'];
    }
    else{
      echo "something wrong";
    }

    
    $registration = "INSERT INTO erp_reg_tbl (id, companyName, companyType, employee_no, designation, phone, email, address, contact,module, c_date,ip_address,country,city,zip
) 
VALUES ('', '$company_name', '$company_type', '$no_employee', '$designation', '$phone', '$email', '$address', '$contact_person','".$checkBox."','$Time','$user_ip','$country','$city','$zip')";
    
    if($conn->query($registration)==true){
      
      //  echo $result;
      $_SESSION['Successfull'] = "Successfull";
      }else {
      die($conn->error);
    }
    
    
  }
  ?>


<!DOCTYPE html>
<html>
<head>
  <meta name="keyword" content="cloud company in Bangladesh.This company also provides internet also">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="author" content="plexus.com.bd">
   
   <link rel="stylesheet" type="text/css" href="style.css"/>
 


<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
  -->
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="script2.js"></script>
</head>
<body>
<!-- notification -->
<div id="notification_sk" style=" text-align: center; background: #03A9F4; color: white; ">
  <?php  if(isset($_SESSION['Successfull'])){  echo $_SESSION['Successfull'];  unset($_SESSION['Successfull']); } ?>  
</div>
<!--end notification -->

 
 <div class="col-md-7">
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

  <!--start row -->

   <div class="row">
        <div class="col-md-4 mb-4 col-sm-4">
          <div class="card h-100">
            <div class="card-body">
              <img src="images/adapt2.png" class="" alt="Cinque Terre" width="190" height="145"> 
              <h4 class="card-title" style="color:purple;">Smart and adaptable</h4>
              <p class="card-text">Leverage intelligent ERP with built-in machine learning, predictive analytics, and optimized processes. Keep the latest innovations at your fingertips with automatic updates.</p>
            </div>
            <div class="card-footer">
             <!-- <a href="#" class="btn btn-primary">More Info</a>-->
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4 col-sm-4">
          <div class="card h-100">
            <div class="card-body">
              <img src="images/fast3.png" class="" alt="Cinque Terre" width="190" height="145"> 
              <h4 class="card-title" style="color:purple;">Fast and affordable</h4>
              <p class="card-text">Tap into Plexus Cloud world-class cloud infrastructure to run lean and flexible business processes. Get up and running quickly – anywhere in the world – for a low monthly cost</p>
            </div>
            <div class="card-footer">
             <!-- <a href="#" class="btn btn-primary">More Info</a>-->
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4 col-sm-4">
          <div class="card h-100">
            <div class="card-body">
              <img src="images/secure4.png" class="" alt="Cinque Terre" width="190" height="145"> 
              <h4 class="card-title" style="color:purple;">Secure and reliable</h4>
              <p class="card-text">Our cloud-based ERP solutions have you covered – from system security to compliance. Your data is hosted on world-class servers with global teams dedicated to its safety. </p>
            </div>
            <div class="card-footer">
             <!-- <a href="#" class="btn btn-primary">More Info</a>-->
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->

      </div>
      <!-- /.row -->

    </div>

  <!--end row -->

 </div> 
 


<div class="col-md-5 ">

<div class="container-fluid">
  <br/><br/>


    <form class="form-horizontal" action="" method="POST"  id="contact_form" role="form" data-toggle="validator" >
<!--<h4>ERP CONTACT FORM</h4>-->
<fieldset>

<!-- Form Name -->


<!-- Text input-->

<div class="form-group">
 <legend>Get Started Today</legend>
 
  <label class="col-md-4 control-label col-sm-4">Company Name</label>  
  <div class="col-md-8 inputGroupContainer col-sm-8">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input  name="company_name" placeholder="Company Name" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group"> 
  <label class="col-md-4 control-label col-sm-4">Company Type</label>
    <div class="col-md-8 selectContainer col-sm-8">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="company_type" class="form-control selectpicker" required>
      <option value=" " >Please select your company</option>
      
      <option value="Marketing">Marketing</option>
      <option value="Grossary">Grossary</option>
      <option value="Electronics">Electronics</option>
      <option value="Cement">Cement</option>
      <option value="Multinational">Multinational</option>
      <option value="Online">Online</option>
      <option value="Cloud">Cloud</option>
      <option value="Machinaries">Machinaries</option>
      <option value="IT">IT</option>
      <option value="Ship building">Ship building</option>
      <option value="Contruction"> Contruction</option>
      <option value="Service">Service</option>
      <option value="Email-Marketing">Email-Marketing</option>
     
    </select>
  </div>
</div>
</div>

<!--no of employee-->

<div class="form-group">
  <label class="col-md-4 control-label col-sm-4">No of Employee</label>  
  <div class="col-md-8 inputGroupContainer col-sm-8">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="no_employee" placeholder="Number Of Employee" class="form-control"  type="number" required>
    </div>
  </div>
</div>

<!-- contact person-->
<div class="form-group">
  <label class="col-md-4 control-label col-sm-4">Contact Person</label>
    <div class="col-md-8 inputGroupContainer col-sm-8">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input  name="contactperson" placeholder="Contact Name" class="form-control"  type="text" required>
          
  </div>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label col-sm-4">Designation</label>  
  <div class="col-md-8 inputGroupContainer col-sm-8">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input  name="designation" placeholder=" Enter Your Designation" class="form-control"  type="text" required>
    </div>
  </div>
</div>
       
<div class="form-group">
  <label class="col-md-4 control-label col-sm-4">Contact No</label>  
    <div class="col-md-8 inputGroupContainer col-sm-8">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="(+880)000" class="form-control" type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->
  <div class="form-group">
   <label class="col-md-4 control-label col-sm-4">E-Mail Address</label>
   <!--<h6 class="col-md-8 control-h6">E-Mail Address</h6>-->
    <div class="col-md-8 inputGroupContainer col-sm-8">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" required>
    </div>
  </div>
</div>


<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label col-sm-4"><p>Address</p></label>
  <!--<h6 class="col-md-3 control-h6">Company Address</h6>-->
    <div class="col-md-8 inputGroupContainer col-sm-8">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="address" placeholder="Company Address" class="form-control" type="text" required>
    </div>
  </div>
</div>


<!-- Text area -->
  


<!-- chech box-->
  
  <div class="form-group">
  <label class="col-md-4 control-label col-sm-4">Interested</label>  
    <div class="col-md-8 inputGroupContainer col-sm-8">
    <div class="input-group">
        
        <label class="checkbox-inline">
            <input type="checkbox" name="checkbox1[]" value="Account">Account
        </label>

      <label class="checkbox-inline">
            <input type="checkbox" name="checkbox1[]" value="Inventory">Inventory
    </label>

    <label class="checkbox-inline">
      <input type="checkbox" name="checkbox1[]" value="HRM">HRM
    </label>

    <label class="checkbox-inline">
            <input type="checkbox" name="checkbox1[]" value="POS">POS
    </label>

    <label class="checkbox-inline">
      <input type="checkbox" name="checkbox1[]" value="Account,Inventory,HRM,POS">ALL
    </label>
  
    </div>
  </div>
</div>

 
<!-- -->

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label col-sm-4"></label>
  <div class="col-md-8 col-sm-8">
    <button type="submit" class="btn btn-warning" name="registration" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->

  

  </body>

</html>


