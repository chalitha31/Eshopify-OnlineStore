<?php

require "connection.php";

$e = $_POST["e"];
$np = $_POST["np"];
$rnp = $_POST["rnp"];
$vc = $_POST["vc"];

if (empty($e)){
    echo "Missing Email Address";

}else if (empty($np)){
    echo "please enter your new password";

}else if (strlen($np) < 5 || strlen($np) >= 20){
    echo "Password Length should be between 5 to 20.";

}else if (empty($rnp)){
    echo "please re-enter your new password";

}else if ($np != $rnp) {
    echo  "Password & Re-type password does not match";

}else if(empty($vc)){
    echo "please enter your verificarion code.";

}else {

    $rs =  Database::search("SELECT * FROM `user` WHERE `email` = '".$e."' AND `verification_code` = '".$vc."'");

    if($rs->num_rows == 1){

        Database::iud("UPDATE `user` SET `password` = '".$np."' WHERE `email` = '".$e."'");

        echo "success";
        
    }else {
        echo "Password reset failed";
    }

}
    

?>