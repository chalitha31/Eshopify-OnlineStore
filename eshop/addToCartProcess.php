<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    $uemail = $_SESSION["u"]["email"];
    $pid = $_GET["id"];

    $cartProducts = Database::search("SELECT * FROM `cart` WHERE `user_email`='".$uemail."' AND `product_id`='".$pid."'");
    $cartProductNum = $cartProducts->num_rows;

    $productqtyrs = Database::search("SELECT `qty` FROM `product` WHERE `id`='".$pid."'");
    $qtyrows = $productqtyrs->fetch_assoc();
    $productQty = $qtyrows["qty"];

    if($cartProductNum == 1){

        $cartRows = $cartProducts->fetch_assoc();
        $currentqty = $cartRows["qty"];
        $newqty = (int)($currentqty) + 1;

        if($productQty >= $newqty){

            Database::iud("UPDATE `cart` SET `qty`='".$newqty."' WHERE `user_email`='".$uemail."' AND `product_id`='".$pid."'");

            echo "Product Quantity updated.";

        }else{

            echo "Invalid Product Quantity";

        } 

    }else{
        
        Database::iud("INSERT INTO `cart` (`product_id`,`user_email`,`qty`) VALUES ('".$pid."','".$uemail."','1')");

        echo "New Product Has Been Added To Your Cart";

    }

}else{

    echo "Please Sign In First";

}



?>