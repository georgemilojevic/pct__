<?php
    $dbConnection = new mysqli("localhost","root","","store");
    $activation_key = $_GET['key'];
    if(isset($activation_key) && !empty($activation_key)){
        $activation_key = $dbConnection->real_escape_string($activation_key);
        $checkActivationKey = "SELECT id,status FROM tbl_users_registration WHERE activation_key = '".$activation_key."'";
        $resKey=$dbConnection->query($checkActivationKey);
        $rows_returned = $resKey->num_rows;
        if($rows_returned > 0){
            $rowKey = $resKey->fetch_assoc();
                if($rowKey['status'] == 'N'){
                    $sqlUpdateUser = $dbConnection->query("UPDATE tbl_users_registration SET status = 'Y' WHERE id = '".$rowKey['id']."'");
                    $msg="Your account is activated"; 
                }else{
                    $msg ="Your account is already active.";
                }
            }else{
                $msg ="Wrong activation code.";
        }
    }
 
    echo $msg;
?>