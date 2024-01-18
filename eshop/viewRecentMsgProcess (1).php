<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    $user_email = $_SESSION["u"]["email"];

    $query = "SELECT * FROM `message`";

    $allMsgrs = Database::search($query);

    $allMsgNum = $allMsgrs->num_rows;

    for($x = 0;$x < $allMsgNum;$x++){
        $allMsgData = $allMsgrs->fetch_assoc();

        if($allMsgData["to"] == $user_email){

            $query1 = "WHERE `from`='".$allMsgData["from"]."'";

            $a = Database::search("SELECT * FROM `message` WHERE `from`='".$allMsgData["from"]."'");

            $n = $a->num_rows;

            for($y = 0;$y < $n;$y++){

                $d = $a->fetch_assoc();
                echo $d["date_time"];
                echo "|";
                echo $d["content"];

            }

            

        }else{

            

        }
    }

   

    echo $allMsgNum;

}else{

    echo "Please Log In to your account first.";

}

?>