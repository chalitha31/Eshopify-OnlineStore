<!DOCTYPE html>
<html>

<head>

    <title>eShop| Messages</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

</head>

<body onload="viewRecent();" style="background-color:#74EBD5;background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);">

    <div class="container-fluid">
        <div class="row">

            <?php require "header.php"; ?>

            <div class="col-12">
                <hr>
            </div>

            <div class="col-12 py-5 px-4">
                <div class="row rounded shadow overflow-hidden">
                    <div class="col-12 col-lg-5 px-0">
                        <div class="bg-white">
                            <div class="bg-light px-4 py-2">
                                <h5 class="mb-0 py-1">Recent</h5>
                            </div>

                            <div class="message_box" id="message_box">
                                <div class="list-group rounded-0">
                                    <a href="#" class="list-group-item list-group-item-action text-white rounded-0 bg-primary">

                                        <div>
                                            <img src="resources/user.svg" width="50px" class="rounded-circle">
                                            <div class="me-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <h6 class="mb-0">Nimal</h6>
                                                    <small class="small fw-bold">01:10</small>
                                                </div>
                                                <p class="mb-0">Got the product.</p>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-7 px-0">
                        <div class="row px-4 py-5 text-white chat_box">

                            <!--Reciver's message-->

                            <div class="mb-3 w-50">
                                <img src="resources/user.svg" style="width: 50px;" class="rounded-circle mb-1">
                                <div>
                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                        <p class="mb-0 text-dark">Yes.I got the product.Thank you.</p>
                                    </div>
                                    <p class="small text-black-50 text-end">01:10 | 10.05.2022</p>
                                </div>
                            </div>

                            <!--Reciver's message-->

                            <!-- sender's message -->

                            <div class="mb-3 w-50">
                                <div>
                                    <div class="bg-primary rounded py-2 px-3 mb-2">
                                        <p class="mb-0 text-white">Have you got the product?</p>
                                    </div>
                                    <p class="small text-black-50 text-end">01:10 | 10.05.2022</p>
                                </div>
                            </div>

                            <!-- sender's message -->

                            <!-- text -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="input-group">
                                        <input type="text" placeholder="Type your message..." 
                                        aria-describedby="sendbtn" class="form-control rounded-0 border-0 py-3 bg-light"/>
                                        <button id="sendbtn" class="btn btn-link fs-2 bg-dark"><i class="bi bi-send-fill"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- text -->
                        </div>
                    </div>

                </div>
            </div>

            <?php require "footer.php"; ?>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>