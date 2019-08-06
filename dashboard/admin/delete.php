<?php include("db.php");?>  

<?php
if(isset($_REQUEST['delete'])){

    $delete = $_REQUEST['delete'];

    $deleteQuery="DELETE FROM `erp_reg_tbl` WHERE `erp_reg_tbl`.`id` = '$delete'";



    if($conn->query($deleteQuery)==true){

        $dir = "http://".$_SERVER['SERVER_NAME']."/erp_reg/dashboard/admin.php";

        session_start(); 
        $_SESSION['Successfull'] = "Delete ";

?> 

<script type="text/javascript">location.href = '<?php echo $dir; ?>';</script>

<?php 

    }else {
        die($conn->error);
    }

}
