<?php
require "connection.php";

session_start();


if (isset($_SESSION["u"])) {

?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>eShop | Add Product</title>

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
                        <h3 class="h2 text-center text-primary">Product Listing</h3>
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
                                        <Select class="form-select" id="ca">

                                            <?php

                                            $category = Database::search("SELECT * FROM `category` WHERE `id` = '" . $product["category"] . "'");
                                            $cd = $category->fetch_assoc();

                                            ?>

                                            <option value="0">Select Category</option>

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
                                        <Select class="form-select " id="br">
                                            <option value="0">All Brand</option>

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
                                        <Select class="form-select" id="mo">
                                            <option value="0">Select model</option>

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
                                        <input type="text" class="form-control" type="text" id="ti" />
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

                                            <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn" checked>
                                                <label class="form-check-label" for="bn">
                                                    Brandnew
                                                </label>
                                            </div>

                                            <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="us">
                                                <label class="form-check-label" for="us">
                                                    Used
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label lbl1">Select Product Colour</label>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">

                                                    <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                        <input class="form-check-input" type="radio" name="crlRadio" id="crl1" checked>
                                                        <label class="form-check-label" for="crl1">
                                                            Gold
                                                        </label>
                                                    </div>

                                                    <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                        <input class="form-check-input" type="radio" name="crlRadio" id="crl2">
                                                        <label class="form-check-label" for="crl2">
                                                            Silver
                                                        </label>
                                                    </div>

                                                    <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                        <input class="form-check-input" type="radio" name="crlRadio" id="crl3">
                                                        <label class="form-check-label" for="crl3">
                                                            Graphite
                                                        </label>
                                                    </div>

                                                    <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                        <input class="form-check-input" type="radio" name="crlRadio" id="crl4">
                                                        <label class="form-check-label" for="crl4">
                                                            Pacific Blue
                                                        </label>
                                                    </div>

                                                    <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                        <input class="form-check-input" type="radio" name="crlRadio" id="crl5">
                                                        <label class="form-check-label" for="crl5">
                                                            Rose Gold
                                                        </label>
                                                    </div>

                                                    <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                        <input class="form-check-input" type="radio" name="crlRadio" id="crl6">
                                                        <label class="form-check-label" for="crl6">
                                                            Jet Black
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>



                                        </div>

                                    </div>



                                    <div class="col-12 col-lg-4">
                                        <div class="row">
                                            <label class="form-label lbl1">Add Project Quantity</label>
                                            <input class="form-control" type="number" value="0" min="0" id="qty" />
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
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="cost">
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
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="dwc">
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
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="doc">
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
                                        <textarea class="form-control" cols="100" rows="15" id="desc"></textarea>
                                    </div>

                                </div>
                            </div>

                            <hr class="hr-break-1" />

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Add Product Image</label>
                                    </div>

                                    <div class="col-12">

                                        <img src="resources/addproductimg.svg" class="col-5 col-lg-2 ms-2 img-thmbnail addimg" id="prev1" />
                                        <img src="resources/addproductimg.svg" class="col-5 col-lg-2 ms-2 img-thmbnail addimg" id="prev2" />
                                        <img src="resources/addproductimg.svg" class="col-5 col-lg-2 ms-2 img-thmbnail addimg" id="prev3" />

                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="col-12 col-lg-12 mt-2 ms-2 ">

                                                <input type="file" class="d-none" accept="img/*" id="imageUploder1" />
                                                <label for="imageUploder1" class="col-12 col-lg-2 btn btn-primary" onclick="changeProductImg1();">Upload</label>

                                                <input type="file" class="d-none" accept="img/*" id="imageUploder2" />
                                                <label for="imageUploder2" class="ms-3 col-12 col-lg-2 btn btn-primary" onclick="changeProductImg2();">Upload</label>

                                                <input type="file" class="d-none" accept="img/*" id="imageUploder3" />
                                                <label for="imageUploder3" class="ms-2 col-12 col-lg-2 btn btn-primary" onclick="changeProductImg3();">Upload</label>

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
                                <button class="btn btn-success search-btn mt-1" onclick="addProduct();">Add Product</button>
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