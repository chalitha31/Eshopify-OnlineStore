<?php

session_start();

require "connection.php";

$t = $_POST["t"];
$qty = $_POST["qty"];
$c = $_POST["c"];
$dwc = $_POST["dwc"];
$doc = $_POST["doc"];
$desc = $_POST["desc"];
$i = $_FILES["i"];

$productid = $_SESSION["p"]["id"];

Database::iud("UPDATE product SET `title` = '".$t."',`qty` ='".$qty."',`price` ='".$c."',`delivery_fee_colombo` = '".$dwc."',`delivery_fee_other` = '".$doc."',`description` ='".$desc."'
WHERE `id` = '".$productid."'");

echo "Product updated successfully";

$last_id = Database::$connection->insert_id;

$allowed_image_extensions = array("image/jpeg","image/jpg","image/png","image/svg");

if (isset($i)){
    $images = $i;

    $file_extension = $images["type"];

    if(!in_array($file_extension,$allowed_image_extensions)){

        echo "Please select an valid image file";
    }else {
        $fileName = "resources//products//".uniqid().$images["name"];
        move_uploaded_file($images["tmp_name"],$fileName);

        Database::iud("UPDATE `images` SET `code` = '".$fileName."' WHERE `product_id` = '".$productid."'");

        echo "product Image Uploaded Success";
    }

}else {
    echo "Please select an image file.";
}

?>