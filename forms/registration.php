<?php
    $dbConnection = new mysqli("localhost","root","","store");
    if(isset($_POST['register'])){
        $user_email  	= trim($dbConnection->real_escape_string($_POST['user_email']));
        $user_password  = $dbConnection->real_escape_string($_POST['user_password']);
        $regular_expression = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
 
        if(preg_match($regular_expression, $user_email)){
            $checkEmailId = "SELECT id FROM tbl_users_registration WHERE email_id = '".$user_email."'";
            $resEmail=$dbConnection->query($checkEmailId);
            $rows_returned = $resEmail->num_rows;
            if($rows_returned > 0){
                $msg = 'The email is already taken, please try new.';
            }else{
                $activation_key =md5($user_email.time());
                $salt = 'randomstring'; //generate random string
                $hashed_value = md5($salt.$user_password);
                $sqlInsertUser = $dbConnection->query("INSERT INTO tbl_users_registration (email_id, password,activation_key) VALUES('$user_email', '$hashed_value','$activation_key')");
				
                /*** Script for send email start here ***/
                $subject = 'PCT :: Email verification';
                $body='Please verify your email <br/> <br/> <a href="http://localhost/__PCT/PopCornTime/forms/activation.php?key='.$activation_key.'">http://localhost/__PCT/PopCornTime/forms/activation.php?key='.$activation_key.'</a>';
                
			require ("phpmailer/PHPMailerAutoload.php");
				
			$mail = new PHPMailer;
			$mail->isSMTP();                                    // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  					// Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                             // Enable SMTP authentication
			$mail->Username = 'georgemilojevic@gmail.com';      // SMTP username
			$mail->Password = '16Djordje77**';                  // SMTP password
			$mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                  // TCP port to connect to

			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			$mail->setFrom('georgemilojevic@gmail.com', 'Mailer Registration');
			$mail->addAddress($user_email, 'Php Mailer');     // Add a recipient
			$mail->isHTML(true); 
			$mail->Subject = 'Finish your registration for PCT';
			$mail->Body    = $body;
			$mail->send();
			/*** Script for send email ends here ***/
				
			$msg = 'Go to your inbox and follow the link to finish your registration';
            }
        }else{
            $msg = 'The email you have entered is invalid, please try again.';
        }
    }	
?>