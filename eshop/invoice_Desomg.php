<!DOCTYPE html>
<html>

<head>
    <title>eShop | Invoice</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body class="mt-2" style="background-color: #f7f7ff;">

    <div class="container-fluid">
        <div class="row">

            <?php require "header.php"; ?>

            <div class="col-12">
                <hr />
            </div>

            <div class="col-12 btn-toolbar justify-content-end">
                <button class="btn btn-dark me-2" onclick="printInvoice();">Print</button>
                <button class="btn btn-danger me-2">Export as PDF</button>
            </div>

            <div class="col-12">
                <hr />
            </div>

            <div class="col-12" id="page">
                <div class="row">

                    <div class="col-6">
                        <div class="invoiceHeaderImg"></div>
                    </div>

                    <div class="col-6">
                        <div class="row">

                            <div class="col-12 text-end text-primary text-decoration-underline">
                                <h2>eShop</h2>
                            </div>

                            <div class="col-12 text-end fw-bold">
                                <span>Maradana, Colombo 10, Sri Lanka.</span> <br />
                                <span>+9411 2245698</span> <br />
                                <span>eshop@gmail.com</span>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="border border-1 border-primary" />
                    </div>

                    <div class="col-12 mb-4">

                        <div class="row">
                            <div class="col-6">
                                <h5 class="fw-bold">INVOICE TO :</h5>
                                <h2>Thamara Navodya</h2>
                                <span>Colombo rd, Horana</span> <br />
                                <span>thamara@gmail.com</span>
                            </div>

                            <div class="col-6 text-end mt-4">
                                <h1 class="text-primary">INVOICE 01</h1>
                                <span class="fw-bold">Date and Time of Invoice :</span> &nbsp;
                                <span class="fw-bold">2022-04-09 21:00:00</span>
                            </div>

                        </div>
                    </div>

                    <th>#</th>
                    <th>Order ID & Product</th>
                    <th class="text-end">Unit Price</th>
                    <th class="text-end">Quantity</th>
                    <div class="col-12">

                        <table class="table">
                            <thead>
                                <tr class="border border-1 border-white">
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr style="height: 72px;">
                                    <td class="bg-primary text-white fs-3">01</td>
                                    <td>
                                        <span class="fw-bold p-2 text-primary text-decoration-underline">000001</span> <br />
                                        <span class="fw-bold p-2 fs-3 text-primary">Apple iPhone X</span>
                                    </td>
                                    <td class="fs-6 text-end pt-3 bg-secondary text-white">Rs. 100000 .00</td>
                                    <td class="fs-6 text-end pt-3">01</td>
                                    <td class="fs-6 text-end bg-primary text-white">Rs. 100000 .00</td>
                                </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="fs-5 text-end">SUBTOTAL</td>
                                    <td class="text-end">Rs. 100000 .00</td>
                                </tr>

                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="fs-5 text-end border-primary">DISCOUNTL</td>
                                    <td class="text-end border-primary">Rs. 00 .00</td>
                                </tr>

                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="fs-5 text-end border-primary text-primary fw-bold">GRAND TOTAL</td>
                                    <td class="text-end border-primary text-primary fs-5 fw-bold">Rs. 100000 .00</td>
                                </tr>

                            </tfoot>

                        </table>

                    </div>

                    <div class="col-4 text-center" style="margin-top: -100px; margin-bottom: 50px;">
                        <span class="fs-1">Thank You!</span>
                    </div>

                    <div class="col-12 mt-3 mb-3 border border-5 border-primary border-start border-top-0 border-bottom-0 
                    border-end-0 rounded" style="background-color: #e7f2ff;">
                        <div class="row">
                            <div class="col-12 mt-3 mb-3">
                                <label class="form-label fs-5 fw-bold">NOTICE :</label> <br />
                                <label class="form-label fs-6">Purchased items can return before 7 days of Delivery.</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="border border-1 border-primary" />
                    </div>

                    <div class="col-12 text-center">
                        <label class="form-label fs-5 text-black-50 fw-bold">Invoice was created on a computer and is valid without the signature and seal</label>
                    </div>

                </div>
            </div>

            <?php require "footer.php"; ?>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>