<?php

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Cart | eShop</title>

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php

            require "header.php";

            if (isset($_SESSION["u"])) {

                $mail = $_SESSION["u"]["email"];

                $total = "0";
                $subtotal = "0";
                $shipping = 0;


            ?>

                <div class="col-12 pt-2" style="background-color: #E3E5E4;">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="http://localhost/eshop/Home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>

                </div>

                <div class="col-12 border border-1 border-secondary rounded mb-3">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fw-bold fs-1">Basket <i class="bi bi-cart3 fs-2"></i></label>
                        </div>

                        <div class="col-12 col-lg-6">
                            <hr class="hr-break-1" />
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-0 offset-lg-2 mb-2">
                                    <input class="form-control" placeholder="Search in Basket..." type="text">
                                </div>
                                <div class="col-12 col-lg-2 d-grid mb-3">
                                    <button class="btn btn-outline-primary">Search</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="hr-break-1" />
                        </div>

                        <?php

                        $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $mail . "' ");
                        $cartnum = $cartrs->num_rows;

                        if ($cartnum == 0) {

                        ?>

                            <!-- Empty -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 emptycart"></div>
                                    <div class="col-12 text-center mb-2">
                                        <label class="form-label fs-1">You have no items in your basket</label>
                                    </div>
                                    <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-4">
                                        <a href="" class="btn btn-primary fs-3">Start Shoping.</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Empty -->

                            <?php

                        } else {

                            for ($x = 0; $x < $cartnum; $x++) {
                                $cartrow = $cartrs->fetch_assoc();
                                // echo $cartrow["user_email"];

                                $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cartrow["product_id"] . "' ");
                                $productrow = $productrs->fetch_assoc();

                                $total = $total + ($productrow["price"] * $cartrow["qty"]);

                                $userrs = Database::search("SELECT* FROM `user` WHERE `email` = '" . $productrow["user_email"] . "' ");
                                $userrow = $userrs->fetch_assoc();

                                $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $mail . "'");
                                $ar = $addressrs->fetch_assoc();
                                $cityid = $ar["city_id"];


                                $districtrs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $cityid . "'");
                                $xr = $districtrs->fetch_assoc();
                                $districtid = $ar["city_id"];

                                $ship = 0;

                                if ($districtid == 2) {
                                    $ship = $productrow["delivery_fee_colombo"];
                                    $shipping = $ship + $productrow["delivery_fee_colombo"];
                                } else {
                                    $ship = $productrow["delivery_fee_other"];
                                    $shipping = $ship + $productrow["delivery_fee_other"];
                                }

                            ?>

                                <!-- Have Products -->

                                <div class="col-12 col-lg-9">
                                    <div class="row">

                                        <div class="card mb-3 mx-0 col-12">
                                            <div class="row g-0">
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span class="fw-bold text-black-50 fs-5">Seller :</span>&nbsp;
                                                            <span class="fw-bold text-black fs-5"><?php echo $userrow["fname"] . " " . $userrow["lname"] ?></span>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <?php

                                                $imagers = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $productrow["id"] . "'");
                                                $imagesrow = $imagers->fetch_assoc();

                                                ?>

                                                <div class="col-md-4">

                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Disabled popover">
                                                        <button class="btn btn-primary" type="button" disabled>Disabled button</button>
                                                        <img src="<?php echo $imagesrow["code"]; ?>" class="img-fluid rounded-start" style="max-width: 200px;">
                                                    </span>


                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body">

                                                        <h3 class="card-title"><?php echo $productrow["title"] ?></h3>

                                                        <?php

                                                        $imagers = Database::search("SELECT * FROM `colour` WHERE `id` = '" . $productrow["colour_id"] . "'");
                                                        $colourrow = $imagers->fetch_assoc();

                                                        $brandrs = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $productrow["condition_id"] . "'");
                                                        $brandrow = $brandrs->fetch_assoc();
                                                        ?>

                                                        <span class="fw-bold text-black-50">Colour : <?php echo $colourrow["name"]; ?></span> &nbsp; |

                                                        &nbsp; <span class="fw-bold text-black-50">Condition : <?php echo $brandrow["name"]; ?></span>
                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                                        <span class="fw-bold text-black fs-5">Rs. <?php echo $productrow["price"] ?> .00</span>
                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Quantity :</span>&nbsp;
                                                        <input type="number" class="mt-3 border border-2 border-secondary fs-4 fw-bold px-3 cardqtytext" id="qty" min="1" value="<?php echo $cartrow["qty"] ?>">
                                                        <br><br>
                                                        <span class="fw-bold text-black-50 fs-5">Delivery Fee :</span>&nbsp;
                                                        <span class="fw-bold text-black fs-5">Rs.<?php echo $productrow["delivery_fee_colombo"]; ?>.00</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body d-grid">
                                                        <a class="btn btn-outline-success mb-2">Buy Now</a>
                                                        <a class="btn btn-outline-danger mb-2">Remove</a>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-6 col-md-6">
                                                            <span class="fw-bold fs-5 text-black-50">Requested Total <i class="bi bi-info-circle"></i></span>
                                                        </div>


                                                        <div class="col-6 col-md-6 text-end">
                                                            <span class="fw-bold fs-5 text-black-50">Rs.<?php echo ($productrow["price"] * $cartrow["qty"]) + $ship ?>.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Have Products -->

                        <?php
                            }
                        }

                        ?>

                        <div class="col-12 col-lg-3 ">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-label fs-3 fw-bold">Summary</label>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-6 mb-3">
                                    <span class="fs-6 fw-bold">Items (<?php echo $cartnum; ?>)</span>
                                </div>

                                <div class="col-6 text-end mb-3">
                                    <span class="fs-6 fw-bold">Rs. 350000 .00</span>
                                </div>

                                <div class="col-6">
                                    <span class="fs-6 fw-bold">Shipping</span>
                                </div>

                                <div class="col-6 text-end">
                                    <span class="fs-6 fw-bold">Rs. 250 .00</span>
                                </div>

                                <div class="col-12 mt-3">
                                    <hr>
                                </div>

                                <div class="col-6 mt-2">
                                    <label class="form-label fs-4 fw-bold">Total</label>
                                </div>

                                <div class="col-6 text-end mt-2">
                                    <label class="form-label fs-4 fw-bold">Rs. <?php echo $total + $shipping ?>.00</label>
                                </div>

                                <div class="col-12 mt-3 mb-3 d-grid">
                                    <button class="btn btn-primary fs-5 fw-bold">CHECHOUT </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <?php require "footer.php"; ?>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>

<?php

            }

?>