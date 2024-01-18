<?php

require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>eShop | Admins | Selling History</title>

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color: #74EBD5; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-light text-center mb-3">
                <label class="form-label fs-1 fw-bold text-primary">Selling History</label>
            </div>

            <!-- search -->

            <div class="col-12 bg-white mt-3 mb-3">
                <div class="row">
                    <div class="col-12 col-lg-3 mt-3 mb-3">
                        <label class="form-label fs-5">search by invoice Id</label>
                        <input type="text" class="form-control fs-5" placeholder="Invoice Id..." id="search" onkeyup="invoiceSearch();" />
                    </div>
                    <div class="col-12 col-lg-2 mt-3 mb-3"></div>
                    <div class="col-12 col-lg-3 mt-3 mb-3">
                        <label class="form-label fs-5">From Date:</label>
                        <input type="date" class="form-control fs-5" id="from">
                    </div>
                    <div class="col-12 col-lg-3 mt-3 mb-3">
                        <label class="form-label fs-5">To Date:</label>
                        <input type="date" class="form-control fs-5" id="to">
                    </div>
                    <div class="col-12 col-lg-1 mt-3 mb-3 d-grid">
                        <button class="btn btn-primary fs-5 fw-bold" onclick="findSellings();">Find</button>
                    </div>
                </div>
            </div>

            <!-- search -->

            <div class="col-12">
                <div class="row">

                    <div class="col-1 bg-secondary text-end">
                        <label class="form-label fw-bold fs-5 text-white">Invoice ID</label>
                    </div>

                    <div class="col-3 bg-body text-end">
                        <label class="form-label fw-bold fs-5 text-black">product</label>
                    </div>

                    <div class="col-3 bg-secondary text-end">
                        <label class="form-label fw-bold fs-5 text-white">Buyer</label>
                    </div>

                    <div class="col-2 bg-body text-end">
                        <label class="form-label fw-bold fs-5 text-black">Amount</label>
                    </div>

                    <div class="col-1 bg-secondary text-end">
                        <label class="form-label fw-bold fs-5 text-white">Quantity</label>
                    </div>

                    <div class="col-2 bg-white"></div>

                </div>
            </div>

            <div class="col-12" id="loadResults">
                <div class="col-12 mt-1">
                    <div class="row">
                        <div class="col-12">

                            <?php

                            if (isset($_GET["page"])) {
                                $pageno = $_GET["page"];
                            } else {
                                $pageno = 1;
                            }

                            $invoice_rs = Database::search("SELECT * FROM `invoice`");
                            $invoice_num = $invoice_rs->num_rows;

                            $results_per_page = 15;
                            $number_of_pages = ceil($invoice_num / $results_per_page);

                            $results_count = ((int)$pageno - 1) * $results_per_page;

                            $results = Database::search("SELECT `invoice`.`id`,`product`.`title`,`user`.`fname`,
                             `user`.`lname`,`invoice`.`total`,`invoice`.`qty`,`invoice`.`status` FROM `invoice` INNER JOIN `user` ON
                                invoice.user_email = user.email INNER JOIN `product` ON invoice.product_id = product.id 
                            LIMIT " . $results_per_page . " OFFSET " . $results_count . "");

                            $results_num = $results->num_rows;



                            while ($results_data = $results->fetch_assoc()) {

                            ?>

                                <div class="row" id="box">

                                    <div class="col-1 bg-secondary text-end">
                                        <label class="form-label fw-bold fs-5 text-white"><?php echo $results_data["id"]; ?></label>
                                    </div>

                                    <div class="col-3 bg-body text-end">
                                        <label class="form-label fw-bold fs-5 text-black"><?php echo $results_data["title"]; ?></label>
                                    </div>

                                    <div class="col-3 bg-secondary text-end">
                                        <label class="form-label fw-bold fs-5 text-white"><?php echo $results_data["fname"] . " " . $results_data["lname"]; ?></label>
                                    </div>

                                    <div class="col-2 bg-body text-end">
                                        <label class="form-label fw-bold fs-5 text-black">Rs. <?php echo $results_data["total"]; ?> .00</label>
                                    </div>

                                    <div class="col-1 bg-secondary text-end">
                                        <label class="form-label fw-bold fs-5 text-white"><?php echo $results_data["qty"]; ?></label>
                                    </div>

                                    <div class="col-2 bg-white d-grid">

                                        <?php

                                        $x = $results_data["status"];

                                        if ($x == 0) {
                                        ?>

                                            <button class="btn btn-info mb-2 mt-2 fw-bold" onclick="changeInvoiceId(<?php echo $results_data['id']; ?>);" id="btn<?php echo $results_data['id']; ?>">Confirm order</button>

                                        <?php
                                        } else if ($x == 1) {

                                        ?>

                                            <button class="btn btn-success mb-2 mt-2 fw-bold" onclick="changeInvoiceId(<?php echo $results_data['id']; ?>);" id="btn<?php echo $results_data['id']; ?>">Packing</button>

                                        <?php

                                        } else if ($x == 2) {

                                        ?>

                                            <button class="btn btn-primary mb-2 mt-2 fw-bold" onclick="changeInvoiceId(<?php echo $results_data['id']; ?>);" id="btn<?php echo $results_data['id']; ?>">Dispach</button>

                                        <?php

                                        } else if ($x == 3) {

                                        ?>

                                            <button class="btn btn-warning mb-2 mt-2 fw-bold" onclick="changeInvoiceId(<?php echo $results_data['id']; ?>);" id="btn<?php echo $results_data['id']; ?>">Shipping</button>

                                        <?php

                                        } else if ($x == 4) {

                                        ?>

                                            <button class="btn btn-danger mb-2 mt-2 fw-bold" onclick="changeInvoiceId(<?php echo $results_data['id']; ?>);" id="btn<?php echo $results_data['id']; ?>">Delivered</button>


                                        <?php

                                        }

                                        ?>


                                        <!-- Packing,delivering,finish -->
                                    </div>
                                </div>


                            <?php

                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offset-4 col-12 col-lg-4 text-center mt-3 mb-3 d-flex justify-content-center">
                <div class="row">
                    <div class="pagination">
                        <a href="<?php if ($pageno <= 1) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($pageno - 1);
                                    } ?>">&laquo;</a>

                        <?php

                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            if ($page == $pageno) {
                        ?>
                                <a href="<?php echo "?page=" . ($page); ?>" class="active"><?php echo $page; ?></a>
                            <?php
                            } else {
                            ?>
                                <a href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                        <?php
                            }
                        }

                        ?>

                        <a href="<?php if ($pageno >= $number_of_pages) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($pageno + 1);
                                    } ?>">&raquo;</a>
                    </div>
                </div>
            </div>

            <?php

            require "footer.php";

            ?>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>