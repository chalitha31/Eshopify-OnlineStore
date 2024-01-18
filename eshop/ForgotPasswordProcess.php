<?php

    require "connection.php";

    require "SMTP.php";
    require "Exception.php";
    require "PHPMailer.php";

    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_GET["e"])){
        $email = $_GET["e"];

        if(empty($email)){
            echo "Please enter an Valid Email";
        }else{

            $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'"); 
            if($rs->num_rows == 1){
                $code = uniqid();
                Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$email."'");

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email'; 
            $mail->Password = 'your_password'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('sandunpiyarathne95@gmail.com', 'eshop'); 
            $mail->addReplyTo('sandunpiyarathne95@gmail.com', 'eshop'); 
            $mail->addAddress($email); 
            $mail->isHTML(true);
            $mail->Subject = 'eshop Forgot Password Verification Code'; 
            $bodyContent = '<h1 style = "color : red";>Your Verification code is : '.$code.'</h1>'; 
            $mail->Body    = $bodyContent ;
            

            if (!$mail->send()) {

                echo 'Verification code sending failed';

            } else {

                echo 'Success';
            }

            }else{
                echo "Email address not found";
            }
        }

    }else{
        echo "Please enter Your email address";
    }

   
    

?>