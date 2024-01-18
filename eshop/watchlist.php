<!DOCTYPE html>

<html>

<head>
    <title>Watchlist | eshop</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="resources/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php

            require "header.php";

            ?>

            <?php


            require "connection.php";

            if (isset($_SESSION["u"])) {

                $mail = $_SESSION["u"]["email"];


            ?>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 border border-1 border-secondary rounded mb-3 mt-3 me-3 pe-3 ps-3">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-label fs-1 fw-bold">Watchlist &hearts;</label>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <hr class="hr-break-1" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="offset-0 offset-lg-2 col-12 col-lg-6 mb-3">
                                            <input type="text" class="form-control" placeholder="search in watchlist..." />
                                        </div>
                                        <div class="col-12 col-lg-2 d-grid mb-3">
                                            <button class="btn btn-outline-primary">Search</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-break-1" />
                                </div>

                                <div class="col-11 col-lg-2 border border-start-0 border-top-0 border-bottom-0 border-end border-primary">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                                        </ol>
                                    </nav>
                                    <nav class="nav nav-pills flex-column">
                                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                                        <a class="nav-link" href="#">My watchlist</a>
                                        <a class="nav-link" href="#">My cart</a>
                                        <a class="nav-link disabled">Recently View</a>


                                    </nav>
                                </div>

                                <?php

                                $products = Database::search("SELECT * FROM `watchlist` WHERE `user_email` = '" . $mail . "'");
                                $productCount = $products->num_rows;
                                echo $productCount;

                                if ($productCount == 0) {
                                ?>
                                    <!-- no items -->

                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12 emptyview"></div>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-1 fw-bolder mb-3">You have no Items in your watchlist yet.</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- no items -->

                                <?php
                                } else {

                                ?>

                                    <!-- item -->

                                    <div class="col-12 col-lg-9">
                                        <div class="row g-2">

                                            <?php

                                            for ($x = 0; $x < $productCount; $x++) {

                                                $product = $products->fetch_assoc();
                                                $prod_id = $product["product_id"];
                                                $prod_details = Database::search("SELECT * FROM `product` WHERE `id` = '" . $prod_id . "'");
                                                $pn = $prod_details->num_rows;

                                                if ($pn == 1) {

                                                    $pf = $prod_details->fetch_assoc();
                                                    $pid = $pf["id"];

                                            ?>

                                                    <div class="card mb-3 mx-0 mx-lg-2  col-12">
                                                        <div class="row g-0">
                                                            <div class="col-md-4">

                                                                <?php

                                                                $pimage = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $pid . "' ");
                                                                $img = $pimage->fetch_assoc();

                                                                ?>

                                                                <img src="<?php echo $img["code"] ?>" class="img-fluid rounded-start">
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?php echo $pf["title"] ?></h5>


                                                                    <!-- <span class="fw-bold text-black-50">Colour : Pacific Blue</span>&nbsp; -->
                                                                    <?php

                                                                    $condition = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $pf["condition_id"] . "' ");
                                                                    $cname = $condition->fetch_assoc();

                                                                    ?>

                                                                    <br />
                                                                    <span class="text-black-50 fs-5">condition : <b><?php echo $cname["name"] ?></b></span>

                                                                    <br />
                                                                    <span class="text-black-50 fs-5">Price &nbsp;: </span>&nbsp;
                                                                    <span class="text-black-50 fs-5"><b>Rs : <?php echo $pf["price"] ?>.00</b></span>
                                                                    <br />
                                                                    <span class="text-black-50 fs-5">Seller :</span>&nbsp;

                                                                    <span class="text-black-50 fs-5"><b><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></b></span>&nbsp;
                                                                    <br />
                                                                    <span class="text-black-50 fs-5">Email :</span>&nbsp;
                                                                    <span class="text-black-50 fs-5"><b><?php echo $_SESSION["u"]["email"]; ?></b></span>&nbsp;


                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mt-4">
                                                                <div class="card-body d-grid">
                                                                    <a href="#" class="btn btn-outline-success mb-2">Buy now</a>
                                                                    <a href="#" class="btn btn-outline-warning mb-2">Add Cart</a>
                                                                    <a class="btn btn-outline-danger mb-2" onclick="deleteFromWatchlist(<?php echo $product['id'] ?>);">Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <?php

                                                }
                                            }

                                            ?>



                                        </div>
                                    </div>
                                    <!-- item -->

                                <?php

                                }

                                ?>

                            </div>
                        </div>

                    </div>
                </div>
        </div>


    </div>


    <?php

                require "footer.php";

    ?>

    </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.css"></script>
</body>

</html>

<?php
            } else {
                echo "You have to sign in first";
            }

?>