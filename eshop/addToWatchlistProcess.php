<?php 

session_start();

require "connection.php";

if (isset($_SESSION["u"])){

    $id = $_GET["id"];
    $mail = $_SESSION["u"]["email"];

    $watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE `product_id` = '".$id."' AND `user_email` = '".$mail."'");

    if($watchlistrs->num_rows == 1){

        $watchlist = $watchlistrs->fetch_assoc();
 
        Database::iud("DELETE FROM `watchlist` WHERE `id` = '".$watchlist["id"]."'");
        echo "success2";

    }else{

        Database::iud("INSERT INTO `watchlist` (`product_id`, `user_email`) VALUES ('".$id."','".$mail."')");
        echo "success";

    }

}else{

    echo "You have to sign in first";
}




?>