<!DOCTYPE html>

<html>

<head>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="col-12">
        <div class="row mt-1 mb-1">

            <div class="col-12 col-lg-3 offset-lg-1 align-self-start">

                <span class="text-lg-start label1"> <b>Wellcome</b>

                    <?php

                    session_start();

                    if (isset($_SESSION["u"])) {
                        $data = $_SESSION["u"];
                    ?>

                        <?php echo $data["fname"]; ?>

                    <?php
                    } else {

                    ?>
                        <a href="index.php">Sign In or Register</a>
                    <?php

                    }

                    ?>
                </span> |

                <span class="text-lg-start label2"> Help and Contact</span>

                <?php
                if (isset($_SESSION["u"])) {
                ?>
                    <span class="text-lg-start label2" onclick="signOut();"><u>Sign Out</u> </span>

                <?php

                } else {
                ?>
                    <span class="text-lg-start label2" onclick="signOut();"> </span>

                <?php
                }

                ?>

            </div>

            <div class="col-12 col-lg-3 offset-lg-5 align-self-end" style="text-align: center;">

                <div class="row">

                    <div class="col-1 col-lg-3 mt-2">
                        <span class="text-start label2">Sell</span>
                    </div>

                    <div class="col-2 col-lg-6 dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            My eShop
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="http://localhost/eshop/userprofile.php">My Profile</a></li>
                            <li><a class="dropdown-item" href="#">My Sellings</a></li>
                            <li><a class="dropdown-item" href="http://localhost/eshop/myProducts.php">My Products</a></li>
                            <li><a class="dropdown-item" href="#">Wish List</a></li>
                            <li><a class="dropdown-item" href="#">Purchase History</a></li>
                            <li><a class="dropdown-item" href="#">Messages</a></li>
                            <li><a class="dropdown-item" href="http://localhost/eshop/addproduct.php">Saved</a></li>
                        </ul>
                    </div>

                    <div class="col-1 col-lg-3 ms-5 ms-lg-0 mt-1 cart-icon"></div>

                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
</body>

</html>