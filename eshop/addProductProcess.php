

<?php

session_start();

require "connection.php";

$category = $_POST["c"];
$brand = $_POST["b"];
$model = $_POST["m"];
$title = $_POST["t"];
$condition = $_POST["co"];
$color = $_POST["col"];
$qty = $_POST["qty"];
$price = $_POST["p"];
$dwc = $_POST["dwc"];
$doc = $_POST["doc"];
$description = $_POST["desc"];
$imagefile1 = $_FILES["img1"];
$imagefile2 = $_FILES["img2"];
$imagefile3 = $_FILES["img3"];


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimeZone($tz);
$date = $d->format("Y-m-d H:i:s");

$status = 1;
$usermail = $_SESSION["u"]["email"];

if ($category == "0") {
    echo "Please Select a Category.";
} else if ($brand == "0") {
    echo "Please Select a Brand.";
} else if ($model == "0") {
    echo "Please Select a Model.";
} else if (empty($title)) {
    echo "Please add a title to your product.";
} else if (strlen($title) > 100) {
    echo  "Please enter a title contains 100 characters or lower.";
} else if (empty($qty)) {
    echo "Quantity field must be not be empty.";
} else if ($qty == "0" || $qty == "e" || $qty < "0") {
    echo "Please enter a valid quantity.";
} else if (empty($price)) {
    echo "Please enter a price to your product.";
} else if (is_int($price)) {
    echo "Please enter a valid price.";
} else if (empty($dwc)) {
    echo "Please enter the delivery cost inside colombo.";
} else if (is_int($dwc)) {
    echo "Please enter a valid price for delivery inside colombo.";
} else if (empty($doc)) {
    echo "Please enter the delivery cost outside colombo.";
} else if (is_int($doc)) {
    echo "Please enter a valid price for delivery outside colombo.";
} else if (empty($description)) {
    echo "Please enter a description to your product.";
} else {

    $modelHasBrand = Database::search("SELECT `id` FROM `model_has_brand` WHERE `brand_id` ='" . $brand . "' AND `model_id` ='" . $model . "'");

    if ($modelHasBrand->num_rows == 0) {
        echo "This product does not exist.";
    } else {

        $f = $modelHasBrand->fetch_assoc();
        $modelHasBrandId = $f["id"];

        Database::iud("INSERT INTO `product` (`category`,`model_has_brand_id`,`colour_id`,`price`,`qty`,`description`,`title`,
        `condition_id`,`status_id`,`user_email`,`datetime_added`,`delivery_fee_colombo`,`delivery_fee_other`)
         VALUES ('" . $category . "', '" . $modelHasBrandId . "','" . $color . "','" . $price . "','" . $qty . "','" . $description . "','" . $title . "','" . $condition . "','" . $status . "',
         '" . $usermail . "','" . $date . "','" . $dwc . "','" . $doc . "')");


        //  echo "product has successfully";

        $last_id = Database::$connection->insert_id;

        $allowed_image_extension = array("image/jpg", "image/jpeg", "image/png", "image/svg");

        if (isset($_FILES["img1"])) {
            $image1 = $_FILES["img1"];
            $image2 = $_FILES["img2"];
            $image3 = $_FILES["img3"];
        }

        if (isset($image1)) {

            $file_extension1 = $image1["type"];
            $file_extension2 = $image2["type"];
            $file_extension3 = $image3["type"];

            if (in_array($file_extension1, $allowed_image_extension)) {

                $newimageextension1 = $file_extension1;
                if ($file_extension1 == "image1/jpg") {
                    $newimageextension1 = ".jpg";
                } else if ($file_extension1 == "image1/png") {
                    $newimageextension1 = ".png";
                } else if ($file_extension1 == "image1/svg") {
                    $newimageextension1 = ".svg";
                } else if ($file_extension1 == "image1/jpeg") {
                    $newimageextension1 = ".jpeg";
                }

                $fileName1 = "resources//products//" . uniqid() . $image1["name"];
                move_uploaded_file($image1["tmp_name"], $fileName1);

                Database::iud("INSERT INTO `images` (`CODE`,`product_id`) VALUES ('" . $fileName1 . "','" . $last_id . "')");

              
            } else {
                echo "Please Select a valid image";
            }

            if (in_array($file_extension2, $allowed_image_extension)) {

                $newimageextension2 = $file_extension2;
                if ($file_extension2 == "image2/jpg") {
                    $newimageextension2 = ".jpg";
                } else if ($file_extension2 == "image2/png") {
                    $newimageextension2 = ".png";
                } else if ($file_extension2 == "image2/svg") {
                    $newimageextension2 = ".svg";
                } else if ($file_extension2 == "image2/jpeg") {
                    $newimageextension2 = ".jpeg";
                }

                $fileName2 = "resources//products//" . uniqid() . $image2["name"];
                move_uploaded_file($image2["tmp_name"], $fileName2);

                Database::iud("INSERT INTO `images` (`CODE`,`product_id`) VALUES ('" . $fileName2 . "','" . $last_id . "')");

            } else {
                echo "Please Select a valid image";
            }


            if (in_array($file_extension3, $allowed_image_extension)) {

                $newimageextension3 = $file_extension3;
                $newimageextension3 = ".jpg";
                if ($file_extension3 == "image3/jpg") {
                } else if ($file_extension3 == "image3/png") {
                    $newimageextension3 = ".png";
                } else if ($file_extension3 == "image3/svg") {
                    $newimageextension3 = ".svg";
                } else if ($file_extension3 == "image3/jpeg") {
                    $newimageextension3 = ".jpeg";
                }

                $fileName3 = "resources//products//" . uniqid() . $image3["name"];
                move_uploaded_file($image3["tmp_name"], $fileName3);

                Database::iud("INSERT INTO `images` (`CODE`,`product_id`) VALUES ('" . $fileName3 . "','" . $last_id . "')");
                
            } else {
                echo "Please Select a valid image";
            }
        } else {
            echo "Please Select an image";
        }
    }


    echo "Success";
}

?>


