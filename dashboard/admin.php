<?php include("db.php"); ?>

<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

<!-- /.row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">
                                <h3 class="box-title">ERP Registration</h3>

                                <?php 								
                                $query_footer = $conn->query("SELECT * FROM `erp_reg_tbl`");
                                $data_footer = $query_footer->fetch_array(); 
                                ?>

                                <table class="table table-hover">
                                    <tr>
                                        <td class="info ">Company Name</td>
                                        <td class="info ">Company Type</td>
                                        <td class="info ">No of Employee</td>
                                        <td class="info ">Designation </td>
                                        <td class="info ">Contact No</td>
                                        <td class="info ">E-Mail Address</td>
                                        <td class="info ">Company Address</td>
                                        <td class="info ">Contact Person</td>
                                         <td class="info ">Module</td>
                                        <td class="info ">Date&Tiime</td>
                                        <td class="info ">Ip</td>
                                        <td class="info ">Country</td>
                                        <td class="info ">City</td>
                                        <td class="info ">Zip</td>
                                        <td class="info ">Action</td>
                                    </tr>

                                    <?php 	
                                    $regi_query = "SELECT * FROM `erp_reg_tbl` ORDER BY `erp_reg_tbl`.`id` DESC";
                                    $result = $conn->query($regi_query);

                                    if($result->num_rows>0)
                                    {
                                        while ($regi_row = $result->fetch_assoc()) { 



                                    ?>
                                    <tr>
                                        <td class=" "><?php echo $regi_row['companyName'];	?></td>
                                        <td class=" "><?php echo $regi_row['companyType'];	?></td>
                                        <td class=" "><?php echo $regi_row['employee_no'];	?></td>
                                        <td class=" "><?php echo $regi_row['designation'];	?> </td>
                                        <td class=" "><?php echo $regi_row['phone'];	?></td>
                                        <td class=" "><?php echo $regi_row['email'];	?></td>
                                        <td class=" "><?php echo $regi_row['address'];	?></td>
                                        <td class=" "><?php echo $regi_row['contact'];	?></td>
                                        <td class=" "><?php echo $regi_row['module'];  ?></td>
                                        <td class=" "><?php echo $regi_row['c_date'];	?></td>
                                        <td class=" "><?php echo $regi_row['ip_address'];	?></td>
                                        <td class=" "><?php echo $regi_row['country'];	?></td>
                                        <td class=" "><?php echo $regi_row['city'];	?></td>
                                        <td class=" "><?php echo $regi_row['zip'];	?></td>
                                        <td class=" "><a href="delete.php?delete=<?php echo $regi_row['id']; ?>" class="btn btn-danger btn-xs" style="">Delete</a></td>
                                    </tr>
                                     <?php

                                        }
                                    }
                                ?>
                                </table>

                               
                            </div>
                        </div>
                    </div>

</body>
</html>