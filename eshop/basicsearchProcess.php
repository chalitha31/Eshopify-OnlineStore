<?php
session_start();
require "connection.php";

$sText = $_POST["st"];
$sSelect = $_POST["ss"];

$query = "SELECT * FROM product ";

$status = 0;

if ($status == 0) {

    if (!empty($sText) &&  $sSelect == "0") {

        $query .= " WHERE `title` LIKE '%" . $sText . "%'";
        $status = 1;
    } else if (empty($sText) && $sSelect != "0") {

        $query .= " WHERE `category` = '" . $sSelect . "'";
        $status = 1;
    } else if (!empty($sText) && $sSelect != "0") {

        $query .= " WHERE `title` LIKE '%" . $sText . "%' AND `category` = '" . $sSelect . "'";
        $status = 1;
    }
} else if ($status ==   1) {

    if (!empty($sText) &&  $sSelect == "0") {

        $query .= " AND `title` LIKE '%" . $sText . "%'";
        $status = 1;
    } else if (empty($sText) && $sSelect != "0") {

        $query .= " AND `category` = '" . $$sSelect . "'";
        $status = 1;
    }
}

$query1 = $query;

?>

<div class="row">
    <div class="offset-0 offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">

            <?php

            if ("0" != ($_POST["page"])) {

                $pageno = $_POST["page"];
            } else {

                $pageno = 1;
            }


            $products = Database::search($query);
            $nProduct = $products->num_rows; //total results
            $userProducts = $products->fetch_assoc();

            $results_per_page = 6;
            $num_of_pages = ceil($nProduct / $results_per_page);

            $viewed_results_count = ((int)$pageno - 1) * $results_per_page;
            $query1 .= "LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . " ";
            $selectedrs = Database::search($query1);

            $srn = $selectedrs->num_rows;


            while ($ps = $selectedrs->fetch_assoc()) {

                // for ($x = 0; $x < $srn; $x++) {}

            ?>

                <div class="card mb-3 mt-3 col-12 col-lg-6">
                    <div class="row">
                        <div class="col-md-4 mt-4">

                            <?php

                            $pimgrs = Database::search("SELECT * FROM images WHERE `product_id` = '" . $ps["id"] . "' ");
                            $presult = $pimgrs->fetch_assoc();

                            ?>

                            <img src="<?php echo $presult["code"]; ?>" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                                <h5 class="card-title fw-bold"><?php echo $ps["title"]; ?></h5>
                                <span class="card-text text-primary fw-bold"><?php echo $ps["price"]; ?></span>
                                <br />
                                <span class="card-text text-success fw-bold fs"><?php echo $ps["qty"]; ?></span>

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row g-1">
                                            <div class="col-12 col-lg-4 d-grid">
                                                <a href="#" class="btn btn-success fs">Buy Now</a>
                                            </div>
                                            <div class="col-12 col-lg-4 d-grid">
                                                <a href="#" class="btn btn-danger fs">Add Cart</a>
                                            </div>
                                            <div class="col-12 col-lg-4 d-grid">

                                                <?php


                                                if (isset($_SESSION["u"])) {
                                                    $watchers = Database::search("SELECT * FROM `watchlist` WHERE `product_id` = '" . $ps["id"] . "' AND `user_email` = '" . $_SESSION["u"]["email"] . "'");

                                                    if ($watchers->num_rows == 1) {

                                                ?>

                                                        <a onclick='addToWatchlist("<?php echo $ps["id"]; ?>");' class="btn btn-secondary col-12 mt-1" style="background-color: #097fec;" id="heart<?php echo $ps["id"]; ?>"><i class="bi bi-heart-half fs-5"></i></a>

                                                    <?php

                                                    } else {

                                                    ?>

                                                        <a onclick='addToWatchlist("<?php echo $ps["id"]; ?>");' class="btn btn-secondary col-12 mt-1" id="heart<?php echo $ps["id"]; ?>"><i class="bi bi-heart-half fs-5"></i></a>

                                                    <?php



                                                    }
                                                } else {
                                                    ?>

                                                    <a onclick="Watchlist();" class="btn btn-secondary col-12 mt-1"><i class="bi bi-heart-half fs-5"></i></a>

                                                <?php
                                                }

                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            <?php

            }

            ?>

        </div>

    </div>

    <div class="offset-0 offset-lg-4 col-12 col-lg-4">
        <div class="row">
            <div class="pagination">
                <a <?php

                    if ($pageno <= 1) {

                        echo "#";
                    } else {

                    ?> onclick="basicSearch('<?php echo ($pageno - 1); ?>');" <?php

                                                                            }

                                                                                ?>>&laquo;</a>

                <?php

                for ($page = 1; $page <= $num_of_pages; $page++) {

                    if ($page == $pageno) {

                ?>

                        <a onclick="basicSearch('<?php echo $page; ?>');" class="active"><?php echo $page; ?></a>

                    <?php

                    } else {

                    ?>

                        <a onclick="basicSearch('<?php echo $page; ?>');"><?php echo $page; ?></a>

                <?php

                    }
                }

                ?>

                <!-- <a href="#">1</a>
                <a href="#" class="active">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a> -->


                <a <?php

                    if ($pageno >= $num_of_pages) {

                        echo "#";
                    } else {

                    ?> onclick="basicSearch('<?php echo ($pageno + 1); ?>');" <?php

                                                                            }

                                                                                ?>>&raquo;</a>
            </div>
        </div>
    </div>

</div>