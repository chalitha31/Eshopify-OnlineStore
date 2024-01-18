<?php
require "connection.php";

session_start();

$product = $_SESSION["p"];

if (isset($product)) {

?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>eShop | Update Product</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="resources/logo.svg" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />

    </head>

    <body>

        <div class="container-fluid">
            <div class="row gy-3">

                <div class="col-12">
                    <div class="col-12 mb-2">
                        <h3 class="h2 text-center text-primary">Product Update</h3>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">

                            <span class="text-danger" id="msg"></span>

                            <div class="col-12 col-lg-4">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product Category</label>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <Select class="form-select" id="ca" disabled>

                                            <?php

                                            $category = Database::search("SELECT * FROM `category` WHERE `id` = '" . $product["category"] . "'");
                                            $cd = $category->fetch_assoc();

                                            ?>

                                            <option value="0"><?php echo $cd["name"]; ?></option>

                                            <?php

                                            $rs = Database::search("SELECT * FROM  `category`");
                                            $n = $rs->num_rows;

                                            for ($x = 0; $x < $n; $x++) {

                                                $d = $rs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>

                                            <?php

                                            }

                                            ?>

                                        </Select>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product Brands</label>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <Select class="form-select " id="br" disabled>

                                            <?php

                                            // $brand = Database::search("SELECT * FROM `barnd` WHERE `id` IN (SELECT `brand_id` FROM `model_has_brand` WHERE `id` = '" . $product["model_has_brand_id"] . "')");
                                            // $bd = $brand->fetch_assoc();

                                            $mhb = Database::search("SELECT * FROM `model_has_brand` WHERE `id` = '" . $product["model_has_brand_id"] . "'");
                                            $mhbd = $mhb->fetch_assoc();

                                            $brand = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $mhbd["brand_id"] . "'");
                                            $bd = $brand->fetch_assoc();

                                            ?>

                                            <option value="0"><?php echo $bd["name"]; ?></option>

                                            <?php

                                            $rs = Database::search("SELECT * FROM  `brand`");
                                            $n = $rs->num_rows;

                                            for ($x = 0; $x < $n; $x++) {

                                                $d = $rs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>

                                            <?php

                                            }

                                            ?>

                                        </Select>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product Model</label>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <Select class="form-select" id="mo" disabled>

                                            <?php

                                            // $model = Database::search("SELECT * FROM `model` WHERE `id` IN (SELECT `model-id` FROM `model_has_brand` WHERE `id` = '" . $product["model_has_brand_id"] . "')");
                                            // $md = $model->fetch_assoc();

                                            $model = Database::search("SELECT * FROM `model` WHERE `id` = '" . $mhbd["model_id"] . "'");
                                            $md = $model->fetch_assoc();

                                            ?>

                                            <option value="0"><?php echo $md["name"]; ?></option>

                                            <?php

                                            $rs = Database::search("SELECT * FROM  `model`");
                                            $n = $rs->num_rows;

                                            for ($x = 0; $x < $n; $x++) {

                                                $d = $rs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>

                                            <?php

                                            }

                                            ?>

                                        </Select>
                                    </div>

                                </div>
                            </div>

                            <hr class="hr-break-1" />

                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Add a Title to your Project</label>
                                    </div>

                                    <div class=" offset-lg-2 col-12 col-lg-8">
                                        <input type="text" class="form-control" type="text" id="ti" value="<?php echo $product["title"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <hr class="hr-break-1" />

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label lbl1">Select Product Condition</label>
                                            </div>

                                            <?php

                                            if ($product["condition_id"] == 1) {

                                            ?>

                                                <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn" checked disabled>
                                                    <label class="form-check-label" for="bn">
                                                        Brand New
                                                    </label>
                                                </div>


                                                <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="us" disabled>
                                                    <label class="form-check-label" for="us">
                                                        Used
                                                    </label>
                                                </div>

                                            <?php

                                            } else if ($product["condition_id"] == 2) {

                                            ?>

                                                <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn" disabled>
                                                    <label class="form-check-label" for="bn">
                                                        Brand New
                                                    </label>
                                                </div>


                                                <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="us" checked disabled>
                                                    <label class="form-check-label" for="us">
                                                        Used
                                                    </label>
                                                </div>

                                            <?php
                                            }

                                            ?>

                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label lbl1">Select Product Colour</label>
                                            </div>

                                            <?php

                                            if ($product["colour_id"] == 1) {
                                            ?>

                                                <div class="col-12">
                                                    <div class="row">

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl1" checked disabled>
                                                            <label class="form-check-label" for="crl1">
                                                                black
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl2" disabled>
                                                            <label class="form-check-label" for="crl2">
                                                                white
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl3" disabled>
                                                            <label class="form-check-label" for="crl3">
                                                                blue
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl4" disabled>
                                                            <label class="form-check-label" for="crl4">
                                                                Grey
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl5" disabled>
                                                            <label class="form-check-label" for="crl5">
                                                                Transparent
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl6" disabled>
                                                            <label class="form-check-label" for="crl6">
                                                                green
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>

                                            <?php
                                            } else if ($product["colour_id"] == 2) {
                                            ?>
                                                <div class="col-12">
                                                    <div class="row">

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl1"  disabled>
                                                            <label class="form-check-label" for="crl1">
                                                                black
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl2"checked disabled>
                                                            <label class="form-check-label" for="crl2">
                                                                white
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl3" disabled>
                                                            <label class="form-check-label" for="crl3">
                                                                blue
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl4" disabled>
                                                            <label class="form-check-label" for="crl4">
                                                                Grey
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl5" disabled>
                                                            <label class="form-check-label" for="crl5">
                                                                Transparent
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl6" disabled>
                                                            <label class="form-check-label" for="crl6">
                                                                green
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php
                                            } else if ($product["colour_id"] == 4) {
                                            ?>
                                                <div class="col-12">
                                                    <div class="row">

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl1"  disabled>
                                                            <label class="form-check-label" for="crl1">
                                                                black
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl2" disabled>
                                                            <label class="form-check-label" for="crl2">
                                                                white
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl3"checked disabled>
                                                            <label class="form-check-label" for="crl3">
                                                                blue
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl4" disabled>
                                                            <label class="form-check-label" for="crl4">
                                                                Grey
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl5" disabled>
                                                            <label class="form-check-label" for="crl5">
                                                                Transparent
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl6" disabled>
                                                            <label class="form-check-label" for="crl6">
                                                                green
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php
                                            } else if ($product["colour_id"] == 8) {
                                            ?>
                                                <div class="col-12">
                                                    <div class="row">

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl1"  disabled>
                                                            <label class="form-check-label" for="crl1">
                                                                black
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl2" disabled>
                                                            <label class="form-check-label" for="crl2">
                                                                white
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl3" disabled>
                                                            <label class="form-check-label" for="crl3">
                                                                blue
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl4"checked disabled>
                                                            <label class="form-check-label" for="crl4">
                                                                Grey
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl5" disabled>
                                                            <label class="form-check-label" for="crl5">
                                                                Transparent
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl6" disabled>
                                                            <label class="form-check-label" for="crl6">
                                                                green
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php
                                            } else if ($product["colour_id"] == 9) {
                                            ?>
                                                <div class="col-12">
                                                    <div class="row">

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl1"  disabled>
                                                            <label class="form-check-label" for="crl1">
                                                                black
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl2" disabled>
                                                            <label class="form-check-label" for="crl2">
                                                                white
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl3" disabled>
                                                            <label class="form-check-label" for="crl3">
                                                                blue
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl4" disabled>
                                                            <label class="form-check-label" for="crl4">
                                                                Grey
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl5" checked disabled>
                                                            <label class="form-check-label" for="crl5">
                                                                Transparent
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl6" disabled>
                                                            <label class="form-check-label" for="crl6">
                                                                green
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php
                                            } else if ($product["colour_id"] == 7) {
                                            ?>
                                                <div class="col-12">
                                                    <div class="row">

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl1"disabled>
                                                            <label class="form-check-label" for="crl1">
                                                                black
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl2" disabled>
                                                            <label class="form-check-label" for="crl2">
                                                                white
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl3" disabled>
                                                            <label class="form-check-label" for="crl3">
                                                                blue
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl4" disabled>
                                                            <label class="form-check-label" for="crl4">
                                                                Grey
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl5" disabled>
                                                            <label class="form-check-label" for="crl5">
                                                                Transparent
                                                            </label>
                                                        </div>

                                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                            <input class="form-check-input" type="radio" name="crlRadio" id="crl6" checked  disabled>
                                                            <label class="form-check-label" for="crl6">
                                                                green
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>

                                    </div>


                                    <div class="col-12 col-lg-4">
                                        <div class="row">
                                            <label class="form-label lbl1">Add Project Quantity</label>
                                            <input class="form-control" type="number" min="0" id="qty" value="<?php echo $product["qty"]; ?>" />
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>

                        <hr class="hr-break-1" />

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Cost per Item</label>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="cost" value="<?php echo $product["price"]; ?>">
                                            <span class="input-group-text">.00</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Approved Payment Method</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="offset-2 col-2 pm1"></div>
                                                <div class=" col-2 pm2"></div>
                                                <div class=" col-2 pm3"></div>
                                                <div class=" col-2 pm4"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr class="hr-break-1" />

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Delivery Costs</label>
                                        </div>

                                        <div class="col-12 col-lg-3 offset-lg-1">
                                            <label class="form-label">Delivery Costs Within Colombo</label>
                                        </div>

                                        <div class="col-12 col-lg-7">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Rs.</span>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="dwc" value="<?php echo $product["delivery_fee_colombo"]; ?>">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="row mt-lg-4">
                                        <div class="col-12"></div>

                                        <div class="col-12 col-lg-3 offset-lg-1">
                                            <label class="form-label">Delivery Costs outof Colombo</label>
                                        </div>

                                        <div class="col-12 col-lg-7">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Rs.</span>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="doc" value="<?php echo $product["delivery_fee_other"]; ?>">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="hr-break-1" />

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Product Distribution</label>
                                    </div>

                                    <div class="col-12">
                                        <textarea class="form-control" cols="100" rows="15" id="desc"><?php echo $product["description"]; ?></textarea>
                                    </div>

                                </div>
                            </div>

                            <hr class="hr-break-1" />

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Add Product Image</label>
                                    </div>

                                    <?php

                                    $img = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product["id"] . "'");
                                    $imgcode = $img->fetch_assoc();

                                    ?>

                                    <div class="col-12">
                                        <img src="<?php echo $imgcode["code"]; ?>" class="col-5 col-lg-2 ms-2 img-thmbnail addimg" id="prev" />


                                        <div class="col-12 col-lg-7 mt-2  ">
                                            <input type="file" class="d-none" accept="img/*" id="imageUploder" />
                                            <label for="imageUploder" class="col-12 col-lg-4 btn btn-primary" onclick="changeProductImg();">Upload</label>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="hr-break-1" />

                <div class="col-12">
                    <label class="form-label lbl1">Notice...</label>

                    <br />

                    <label class="form-label ">We are taking 5% of the product from price from every product as a service charge.</label>
                </div>

                <div class="col-12 col-lg-4 offset-lg-4 d-grid mb-2">
                    <button class="btn btn-success search-btn mt-1" onclick="UpdateProduct();">Update Product</button>
                </div>

                <?php

                require "footer.php";

                ?>

            </div>
        </div>



        <script src="script.js"></script>
    </body>

    </html>

<?php

} else {

?>

    <script>
        alert("You have to sign In or Register First");
        window.location = "index.php";
    </script>

<?php


}

?>