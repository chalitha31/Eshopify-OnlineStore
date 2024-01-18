<?php

session_start();
require "connection.php";

$search_txt = $_POST["s"];
$category = $_POST["ca"];
$brand = $_POST["b"];
$model = $_POST["m"];
$condition = $_POST["con"];
$colour = $_POST["col"];
$price_from = $_POST["pf"];
$price_to = $_POST["pt"];
$sort = $_POST["sort"];

$query = "SELECT * FROM product ";
$status = 0;

if (!empty($search_txt)) {

    $query .= "WHERE `title` LIKE '%" . $search_txt . "%'";
    $status = 1;
}



if ($category != "0" && $status == 0) {

    $query .= "WHERE `category`='" . $category . "'";
    $status = 1;
} else if ($category != "0" && $status == 1) {

    $query .= "AND `category`='" . $category . "'";
}

$status2 = 0;

if ($brand != "0" || $model != "0") {

    $modelHasBrandId = Database::search("SELECT `id` FROM model_has_brand WHERE `brand_id`='" . $brand . "'
    OR `model_id`='" . $model . "' ");

    $n = $modelHasBrandId->num_rows;

    if ($n == "1") {
        $f = $modelHasBrandId->fetch_assoc();
        $i = $f["id"];
        $status2 = 1;
    } else {
        $status2 = 0;
    }
}

if (empty($search_txt) && $category = "1" && $status2 == "1") {
    $query .= " WHERE `model_has_brand_id`='" . $i . "'";
    $status = 1;
} else if ($status2 == "1") {
    $query .= " AND `model_has_brand_id`='" . $i . "'";
    $status = 1;
}

if ($condition != "0" && $status == 0) {

    $query .= "WHERE `condition_id`='" . $condition . "'";
    $status = 1;
} else if ($condition != "0" && $status == 1) {

    $query .= "AND `condition_id`='" . $condition . "'";
}

if ($colour != "0" && $status == 0) {

    $query .= "WHERE `colour_id`='" . $colour . "'";
    $status = 1;
} else if ($colour != "0" && $status == 1) {

    $query .= "AND `colour_id`='" . $colour . "'";
}

if ($status == 0) {

    if (!empty($price_from) && empty($price_to)) {

        $query .= "WHERE `price` >='" . $price_from . "'";
        $status = 1;
    } else if (empty($price_from) && !empty($price_to)) {
        $query .= "WHERE `price` <='" . $price_to . "'";
        $status = 1;
    } else if (!empty($price_from) && !empty($price_to)) {
        $query .= "WHERE `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
        $status = 1;
    }
} else if ($status == 1) {

    if (!empty($price_from) && empty($price_to)) {

        $query .= "AND `price` >='" . $price_from . "'";
        $status = 1;
    } else if (empty($price_from) && !empty($price_to)) {
        $query .= "AND `price` <='" . $price_from . "'";
        $status = 1;
    } else if (!empty($price_from) && !empty($price_to)) {

        $query .= "AND `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
        $status = 1;
    }
}

if($sort == 1){

    $query .= " ORDER BY `price` ASC ";

}else if($sort == 2){

    $query .= " ORDER BY `price` DESC ";
    
}else if($sort == 3){

    $query .= " ORDER BY `qty` ASC ";
    
}else if($sort == 4){

    $query .= " ORDER BY `qty` DESC ";
    
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
            $nProducts = $products->num_rows;
            $userProducts = $products->fetch_assoc();

            $results_per_page = 6;
            $number_of_pages = ceil($nProducts / $results_per_page);

            $viewed_result_count = ((int)$pageno - 1) * $results_per_page;
            $query1 .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_result_count . " ";
            $selectedrs = Database::search($query1);
            $srn = $selectedrs->num_rows;

            while ($ps = $selectedrs->fetch_assoc()) {

            ?>

                <div class="card mb-3 mt-3 col-12 col-lg-6">
                    <div class="row">
                        <div class="col-md-4 mt-4">

                            <?php

                            $pimgrs = Database::search("SELECT * FROM images WHERE `product_id`='" . $ps["id"] . "'");
                            $presult = $pimgrs->fetch_assoc();

                            ?>

                            <img src="<?php echo $presult["code"]; ?>" class="img-fluid rounded-start" alt="...">
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
                                            <div class="col-12 col-lg-4 ">
                                                <a href='<?php echo "singleProductView.php?id=" . ($ps["id"]) ?>' class="btn btn-success fs">Buy Now</a>
                                            </div>
                                            <div class="col-12 col-lg-4 ">
                                                <a href="#" class="btn btn-danger fs">Add Cart</a>
                                            </div>
                                            <div class="col-12 col-lg-4 ">
                                                <?php

                                                if (isset($_SESSION["u"])) {

                                                    $watchrs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $ps["id"] . "'
                                                    AND `user_email`='" . $_SESSION["u"]["email"] . "'");

                                                    if ($watchrs->num_rows == 1) {
                                                ?>

                                                        <a onclick='addToWatchlist(<?php echo $ps["id"]; ?>);' class="btn btn-secondary col-12 mt-1"><i class="bi bi-heart-fill fs-5 text-danger" id="heart<?php echo $ps["id"]; ?>"></i></a>

                                                    <?php
                                                    } else {
                                                    ?>

                                                        <a onclick='addToWatchlist(<?php echo $ps["id"]; ?>);' class="btn btn-secondary col-12 mt-1"><i class="bi bi-heart-fill fs-5" id="heart<?php echo $ps["id"]; ?>"></i></a>

                                                    <?php
                                                    }
                                                } else {
                                                    ?>

                                                    <a onclick="watchlist();" class="btn btn-secondary col-12 mt-1"><i class="bi bi-heart-fill fs-5"></i></a>

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


    <div class="offset-5 offset-lg-5 col-12 col-lg-4">
        <div class="row">
            <div class="pagination">
                <a <?php if ($pageno <= 1) {
                        echo "#";
                    } else {

                    ?> onclick="advancedSearch('<?php echo ($pageno - 1); ?>')" <?php

                                                                            } ?>>&laquo;</a>

                <?php

                for ($page = 1; $page <= $number_of_pages; $page++) {

                    if ($page == $pageno) {

                ?>

                        <a onclick="advancedSearch('<?php echo $page; ?>');" class="active"><?php echo $page; ?></a>

                    <?php

                    } else {

                    ?>

                        <a onclick="advancedSearch('<?php echo $page; ?>');"><?php echo $page; ?></a>

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

                <a <?php if ($pageno >= $number_of_pages) {
                        echo "#";
                    } else {

                    ?> onclick="advancedSearch('<?php echo ($pageno + 1); ?>')" <?php

                                                                            } ?>>&raquo;</a>
            </div>
        </div>
    </div>

</div>

<?php
