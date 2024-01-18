<?php

require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>eShop |Advance Search</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body class="bg-info">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-body border border-primary border-start-0 border-end-0 border-top-0">
                <?php require "header.php"; ?>
            </div>

            <div class="col-12 bg-white">

                <div class="row">
                    <div class="offset-0 offset-lg-4 col-12 col-lg-4">
                        <div class="row">

                            <div class="col-2 mt-2">
                                <div class="mb-3 logo-img"></div>
                            </div>

                            <div class="col-10">
                                <label class="text-black-50 fw-bold fs-2 mt-4">Advanced Search</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="offset-0 offset-lg-2 col-12 col-lg-8 bg-white mt-3 mb-3 rounded">
                <div class="row">

                    <div class="offset-0 offset-lg-1 col-12 col-lg-10">
                        <div class="row">

                            <div class="col-12 col-lg-10 mt-3 mb-2">
                                <input type="text" class="form-control fw-bold" placeholder="Type keyword to search..." id="s1" />
                            </div>

                            <div class="col-12 col-lg-2 mt-3 mb-2 d-grid">
                                <button class="btn btn-primary search-btn1" onclick="advancedsearch(0);">Search</button>
                            </div>

                            <div class="col-12">
                                <hr class="border border-primary border-3" />
                            </div>

                        </div>
                    </div>

                    <div class="offset-0 offset-lg-1 col-12 col-lg-10">
                        <div class="row">

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12 col-lg-4 mb-3">
                                        <select class="form-select" id="ca1" onchange="advancedsearch(0);">
                                            <option value="0">Select Category</option>
                                            <?php

                                            $rs1 = Database::search("SELECT *FROM `category`");
                                            $n1 = $rs1->num_rows;

                                            for ($x = 0; $x < $n1; $x++) {
                                                $fa1 = $rs1->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $fa1["id"]; ?>"><?php echo $fa1["name"]; ?></option>

                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 mb-3">
                                        <select class="form-select" id="br1" onchange="advancedsearch(0);">
                                            <option value="0">Select Brand</option>

                                            <?php

                                            $rs1 = Database::search("SELECT *FROM `brand`");
                                            $n1 = $rs1->num_rows;

                                            for ($x = 0; $x < $n1; $x++) {
                                                $fa1 = $rs1->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $fa1["id"]; ?>"><?php echo $fa1["name"]; ?></option>

                                            <?php
                                            }

                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 mb-3">
                                        <select class="form-select" id="mo1" onchange="advancedsearch(0);">
                                            <option value="0">Select Model</option>

                                            <?php

                                            $rs1 = Database::search("SELECT *FROM `model`");
                                            $n1 = $rs1->num_rows;

                                            for ($x = 0; $x < $n1; $x++) {
                                                $fa1 = $rs1->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $fa1["id"]; ?>"><?php echo $fa1["name"]; ?></option>

                                            <?php
                                            }

                                            ?>

                                        </select>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-12 col-lg-6 mb-3">
                                        <select class="form-select" id="co1" onchange="advancedsearch(0);">
                                            <option value="0">Select Condition</option>

                                            <?php

                                            $rs1 = Database::search("SELECT *FROM `condition`");
                                            $n1 = $rs1->num_rows;

                                            for ($x = 0; $x < $n1; $x++) {
                                                $fa1 = $rs1->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $fa1["id"]; ?>"><?php echo $fa1["name"]; ?></option>

                                            <?php
                                            }

                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6 mb-3">
                                        <select class="form-select" id="col1" onchange="advancedsearch(0);">
                                            <option value="0">Select Color</option>

                                            <?php

                                            $rs1 = Database::search("SELECT *FROM `colour`");
                                            $n1 = $rs1->num_rows;

                                            for ($x = 0; $x < $n1; $x++) {
                                                $fa1 = $rs1->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $fa1["id"]; ?>"><?php echo $fa1["name"]; ?></option>

                                            <?php
                                            }

                                            ?>

                                        </select>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-12 col-lg-6 mb-3">
                                        <input type="text" class="form-control" placeholder="Price From..." id="pf1" onkeyup="advancedsearch(0);" />
                                    </div>

                                    <div class="col-12 col-lg-6 mb-3">
                                        <input type="text" class="form-control" placeholder="Price To..." id="pt1" onkeyup="advancedsearch(0);" />
                                    </div>

                                </div>


                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="offset-lg-2 col-lg-8 bg-white rounded mb-3">
                <div class="row">
                    <div class="offset-8 col-4">
                        <select class="form-select border-0 border-bottom border-primary border-3" id="sort">
                            <option value="0">SORT BY</option>
                            <option value="1">PRICE LOW TO HIGH</option>
                            <option value="2">PRICE HIGH TO LOW</option>
                            <option value="3">QUANTITY LOW TO HIGH</option>
                            <option value="4">QUANTITY HIGH TO LOW</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="offset-0 offset-lg-2 col-12 col-lg-8 rounded bg-white mb-3" id="results">
                <div class="row">
                    <div class="offset-0 offset-lg-1 col-12 col-lg-10 text-center">
                        <div class="row">

                            <div class="offset-5 col-2 mt-5">
                                <span class="h1 text-black-50 fw-bold"><i class="bi bi-search fs-1"></i></span>
                            </div>

                            <div class="offset-3 col-6 mt-5 mb-5">
                                <span class="h1 text-black-50 ">No Item Search Yet.</span>
                            </div>

                            <!-- <div class="card mb-3 mt-3 col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-md-4 mt-4">

                                        <img src="resources/mobile_images/iphone12.jpg" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">

                                            <h5 class="card-title fw-bold">iPhone 12</h5>
                                            <span class="card-text text-primary fw-bold">Rs.500000.00</span>
                                            <br />
                                            <span class="card-text text-success fw-bold fs">10 Items Left</span>

                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="row g-1">
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <a href="#" class="btn btn-success fs">Update</a>
                                                        </div>
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <a href="#" class="btn btn-danger fs">Delete</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                    </div>

                    <!-- <div class="offset-0 offset-lg-4 col-12 col-lg-4">
                        <div class="row">
                            <div class="pagination">
                                <a href="#">&laquo;</a>
                                <a href="#">1</a>
                                <a href="#" class="active">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">5</a>
                                <a href="#">6</a>
                                <a href="#">&raquo;</a>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>





        <?php require "footer.php"; ?>

    </div>
    </div>

    <script src="script.js"></script>
</body>

</html>