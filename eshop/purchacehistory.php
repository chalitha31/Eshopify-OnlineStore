<!DOCTYPE html>

<html>

<head>
    <title>eShop | Transaction History</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="resources/logo.svg" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php require "header.php"; ?>

            <div class="col-12 text-center mb-3">
                <span class="fs-1 fw-bold text-primary">Transaction History</span>
            </div>

            <!-- No Transaction History -->

            <!-- <div class="col-12 bg-light text-center">
                <span class="fs-1 fw-bold text-black-50 d-block" style="margin-top: 200px; margin-bottom: 200px;">You have no items in your Transaction history yet...</span>
            </div> -->

            <!-- No Transaction History -->

            <div class="col-12">
                <div class="row">

                    <!-- Table Head -->

                    <div class="col-12 d-none d-lg-block">
                        <div class="row">

                            <div class="col-1 bg-light">
                                <label class="form-label fw-bold">#</label>
                            </div>

                            <div class="col-3 bg-light">
                                <label class="form-label fw-bold">Order details</label>
                            </div>

                            <div class="col-1 bg-light text-end">
                                <label class="form-label fw-bold">Quantity</label>
                            </div>

                            <div class="col-2 bg-light text-end">
                                <label class="form-label fw-bold">Amount</label>
                            </div>

                            <div class="col-2 bg-light text-end">
                                <label class="form-label fw-bold">Purchase Date and Time</label>
                            </div>

                            <div class="col-3 bg-light"></div>
                            <div class="col-12">
                                <hr>
                            </div>

                        </div>
                    </div>

                    <!-- Table Head -->

                    <!-- Table Body -->

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 col-lg-1 bg-info text-center text-lg-start">
                                <label class="form-label text-white fs-6 py-5 fw-bold">111111111111</label>
                            </div>

                            <div class="col-12 col-lg-3">
                                <div class="row g-2">

                                    <div class="card mx-0 my-3" style="max-width: 500px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="resources/mobile images/iphone 12 pro.jpg" class="img-fluid rounded-start" />
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">iPhone 12 pro</h5>
                                                    <p class="card-text"><b>Seller :</b>Raveesha Madhumal</p>
                                                    <p class="card-text"><b>Price :</b>Rs. 100000 .00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-lg-1 text-center text-lg-end bg-light">
                                <label class="form-label fs-4 pt-5">1</label>
                            </div>

                            <div class="col-12 col-lg-2 text-center text-lg-end bg-info">
                                <label class="form-label fs-5 py-5 text-white fw-bold">Rs. 100000 .00</label>
                            </div>

                            <div class="col-12 col-lg-2 text-center text-lg-end bg-light">
                                <label class="form-label fs-5 px-3 py-5 fw-bold">2022-05-27 20:47:45</label>
                            </div>

                            <div class="col-12 col-lg-3">
                                <div class="row">
                                    <div class="col-6 d-grid">
                                        <button class="btn btn-secondary rounded border border-1 border-primary mt-5 fs-5"><i class="bi bi-info-circle-fill"></i> Feedback</button>
                                    </div>

                                    <div class="col-6 d-grid">
                                        <button class="btn btn-danger rounded mt-5 fs-5"><i class="bi bi-trash-fill"></i> Delete</button>
                                    </div>

                                    <div class="col-12">
                                        <hr>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Table Body -->


                </div>
            </div>

            <div class="col-12">
                <hr>
            </div>

            <div class="col-12 mb-3">
                <div class="row">
                    <div class="col-0 col-lg-10 d-none d-lg-block"></div>
                    <div class="col-12 col-lg-2 d-block d-grid">
                        <button class="btn btn-danger rounded fs-6"><i class="bi bi-trash-fill"></i>Clear All Records</button>
                    </div>
                </div>
            </div>

            <?php require "footer.php"; ?>

        </div>
    </div>

</body>

</html>