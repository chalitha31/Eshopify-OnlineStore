<?php

require "connection.php";

if(isset($_POST["t"]) && isset($_POST["c"]) && isset($_POST["e"])){

    $vcode = $_POST["t"];
    $cname = $_POST["c"];
    $uemail = $_POST["e"];

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$uemail."'");
    $admin_num = $admin_rs->num_rows;

    if($admin_num == 1){

        $admin_data = $admin_rs->fetch_assoc();

        if($vcode == $admin_data["verification_code"]){

            Database::iud("INSERT INTO `category` (`name`) VALUES ('".$cname."')");
            echo "success";

        }else{

            echo "Invalid verification code";

        }

    }else{
        echo "Something went wrong";
    }


}

?>