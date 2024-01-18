function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                fname.value = "";
                lname.value = "";
                email.value = "";
                password.value = "";
                mobile.value = "";
                document.getElementById("msg").innerHTML = "";
                changeView();

            } else {
                document.getElementById("msg").innerHTML = t;
            }
        }
    };

    r.open("POST", "SignUpProcess.php", true);
    r.send(form);


}

function signIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2")
    var rememberMe = document.getElementById("rememberMe");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rememberMe", rememberMe.checked);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "Home.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }
        }
    };

    r.open("POST", "SignInProcess.php", true);
    r.send(form);

}

var bm;

function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                alert("Verification Code Send to You Email. Please Check the inbox.");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();

            } else {
                document.getElementById("msg2").innerHTML = t;

            }
        }
    };

    r.open("GET", "ForgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

function ShowPassword1() {

    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (npb.innerHTML == "Show") {

        np.type = "text";
        npb.innerHTML = "Hide";

    } else {

        np.type = "password";
        npb.innerHTML = "Show";


    }
}

function ShowPassword2() {

    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnpb.innerHTML == "Show") {

        rnp.type = "text";
        rnpb.innerHTML = "Hide";

    } else {

        rnp.type = "password";
        rnpb.innerHTML = "Show";


    }
}

function resetPassword() {



    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var form = new FormData();

    form.append("e", e.value);
    form.append("np", np.value);
    form.append("rnp", rnp.value);
    form.append("vc", vc.value);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                alert("Password reset success.");

                bm.hide();
            } else {
                alert(text);
            }
        }

    };

    r.open("POST", "resetPassword.php", true);
    r.send(form);

}

function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                window.location = "Home.php";
            }
        }
    };

    r.open("GET", "signOutProcess.php", true);
    r.send();
}

function prButton() {


    var pb = document.getElementById("pButton");
    var fi = document.getElementById("field");

    if (pb.innerHTML == '<i class="bi bi-eye-fill"></i>') {

        fi.type = "text";
        pb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';

    } else {

        fi.type = "password";
        pb.innerHTML = '<i class="bi bi-eye-fill"></i>';


    }

}

function changeImage() {

    var image = document.getElementById("profileimg"); //file chooser
    var prev = document.getElementById("prev0"); //image tag

    image.onchange = function() {

        var file0 = this.files[0];

        var url0 = window.URL.createObjectURL(file0);

        prev.src = url0;
    }

}

function updateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var addressline1 = document.getElementById("addline1");
    var addressline2 = document.getElementById("addline2");
    var city = document.getElementById("usercity");
    var image = document.getElementById("profileimg");


    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("m", mobile.value);
    form.append("a1", addressline1.value);
    form.append("a2", addressline2.value);
    form.append("c", city.value);
    form.append("i", image.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var text = r.responseText;
            alert(text);

        }
    };

    r.open("POST", "updateProfileProcess.php", true);
    r.send(form);

}

function changeProductImg1() {

    var image = document.getElementById("imageUploder1");
    var view = document.getElementById("prev1");

    image.onchange = function() {


        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        view.src = url;

    }

}

function changeProductImg2() {

    var image = document.getElementById("imageUploder2");
    var view = document.getElementById("prev2");

    image.onchange = function() {


        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        view.src = url;

    }

}

function changeProductImg3() {

    var image = document.getElementById("imageUploder3");
    var view = document.getElementById("prev3");

    image.onchange = function() {


        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        view.src = url;

    }

}


function addProduct() {

    var category = document.getElementById("ca");
    var brand = document.getElementById("br");
    var model = document.getElementById("mo");
    var title = document.getElementById("ti");

    var condition = 0;

    if (document.getElementById("bn").checked) {

        condition = 1;

    } else if (document.getElementById("us").checked) {

        condition = 2;
    }

    var color = 0;

    if (document.getElementById("crl1").checked) {

        color = 1;

    } else if (document.getElementById("crl2").checked) {

        color = 2;

    } else if (document.getElementById("crl3").checked) {

        color = 3;

    } else if (document.getElementById("crl4").checked) {

        color = 4;

    } else if (document.getElementById("crl5").checked) {

        color = 5;

    } else if (document.getElementById("crl6").checked) {

        color = 6;

    }

    var qty = document.getElementById("qty");
    var price = document.getElementById("cost");
    var delivery_within_colombo = document.getElementById("dwc");
    var delivery_outof_colombo = document.getElementById("doc");
    var description = document.getElementById("desc");
    var image1 = document.getElementById("imageUploder1");
    var image2 = document.getElementById("imageUploder2");
    var image3 = document.getElementById("imageUploder3");

    // alert(condition);
    // alert(price.value);
    // alert(color);
    // alert(description.value);

    var f = new FormData();
    f.append("c", category.value);
    f.append("b", brand.value);
    f.append("m", model.value);
    f.append("t", title.value);
    f.append("co", condition);
    f.append("col", color);
    f.append("qty", qty.value);
    f.append("p", price.value);
    f.append("dwc", delivery_within_colombo.value);
    f.append("doc", delivery_outof_colombo.value);
    f.append("desc", description.value);
    f.append("img1", image1.files[0]);
    f.append("img2", image2.files[0]);
    f.append("img3", image3.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == "success") {
                alert("Success");

            } else {
                document.getElementById("msg").innerHTML = text;
            }


        }

    };

    r.open("POST", "addProductProcess.php", true);
    r.send(f);

}


function changeStatus(id) {

    var productId = id;
    var statusChange = document.getElementById("flexSwitchCheckChecked");
    var statusLable = document.getElementById("checkLable" + productId);


    var status;

    if (statusChange.checked) {

        status = 1;
    } else {

        status = 0;
    }

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Deactivated") {

                statusLable.innerHTML = "Make your product Active";

            } else if (text == "Activated") {

                statusLable.innerHTML = "Make your product Deactive";
            }

        }
    };


    r.open("GET", "statusChangeProcess.php?p=" + productId + "&s=" + status, true);
    r.send();

}

function addFilters() {

    var search = document.getElementById("s");

    var age;

    if (document.getElementById("n").checked) {

        age = 1;

    } else if (document.getElementById("o").checked) {

        age = 2;

    } else {

        age = 0;
    }


    var qty;

    if (document.getElementById("l").checked) {

        qty = 1;

    } else if (document.getElementById("h").checked) {

        qty = 2;

    } else {

        qty = 0;
    }

    var condition;

    if (document.getElementById("b").checked) {

        condition = 1;

    } else if (document.getElementById("u").checked) {

        condition = 2;

    } else {

        condition = 0;
    }

    var form = new FormData();

    form.append("s", search.value);
    form.append("a", age);
    form.append("q", qty);
    form.append("c", condition);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText

            document.getElementById("sort").innerHTML = t;

        }
    };


    r.open("POST", "sortProcess.php", true);
    r.send(form);

}


function clearfilters() {

    window.location = "myProducts.php";

}



function sendId(id) {

    var id1 = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "updateproduct.php";
            }
        }
    };

    r.open("GET", "sendProductProcess.php?id=" + id1, true);
    r.send();
}

function UpdateProduct() {

    var title = document.getElementById("ti");
    var qty = document.getElementById("qty");
    var cost = document.getElementById("cost");
    var delivery_within_colombo = document.getElementById("dwc");
    var delivery_outof_colombo = document.getElementById("doc");
    var description = document.getElementById("desc");
    var image = document.getElementById("imageUploder");


    var form = new FormData();
    form.append("t", title.value);
    form.append("qty", qty.value);
    form.append("c", cost.value);
    form.append("dwc", delivery_within_colombo.value);
    form.append("doc", delivery_outof_colombo.value);
    form.append("desc", description.value);
    form.append("i", image.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    };

    r.open("POST", "updateProcess.php", true);
    r.send(form);

}

//advnced search

function advancedsearch(x) {


    var searchtxt = document.getElementById("s1");
    var category = document.getElementById("ca1");
    var brand = document.getElementById("br1");
    var model = document.getElementById("mo1");
    var condition = document.getElementById("co1");
    var colour = document.getElementById("col1");
    var priceFrom = document.getElementById("pf1");
    var PriceTo = document.getElementById("pt1");
    var sort = document.getElementById("sort");



    var form = new FormData();

    form.append("page", x);
    form.append("s", searchtxt.value);
    form.append("ca", category.value);
    form.append("b", brand.value);
    form.append("m", model.value);
    form.append("con", condition.value);
    form.append("col", colour.value);
    form.append("pf", priceFrom.value);
    form.append("pt", PriceTo.value);
    form.append("sort", sort.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);

            document.getElementById("results").innerHTML = t;

        }

    };

    r.open("POST", "advanceSearchProcess.php", true);
    r.send(form);

}

//basic search



function basicSearch(x) {

    var searchText = document.getElementById("basic_search_txt").value;
    var searchSelect = document.getElementById("basic_search_select").value;

    var form = new FormData();

    form.append("st", searchText);
    form.append("ss", searchSelect);
    form.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText
                // alert(t);

            document.getElementById("basicSearchResult").innerHTML = t;

        }
    };

    r.open("POST", "basicsearchProcess.php", true);
    r.send(form);

}

function loadmainimg(id) {

    var pid = id;

    var img = document.getElementById("pimg" + pid).src;
    var mainimg = document.getElementById("mainimg");

    mainimg.style.backgroundImage = "url(" + img + ")";


}

function qty_inc(qty) {

    var qty1 = qty;

    var input = document.getElementById("qtyinput");

    if (input.value < qty1) {

        var newvalue = parseInt(input.value) + 1;

        input.value = newvalue.toString();

    } else {

        alert("Maximum quantity has achieved")

    }

}

function qty_dec() {

    var input = document.getElementById("qtyinput");

    if (input.value > 1) {

        var newvalue = parseInt(input.value) - 1;
        input.value = newvalue.toString();

    } else {

        alert("Minimum quantity has achieved");

    }

}

function check_val(qty) {

    var input = document.getElementById("qtyinput");

    if (input.value > qty) {

        alert("Insufficient quantity.");

        input.value = qty;

    }

}

// watchlist

function addToWatchlist(id) {

    var wid = id;
    var icon = document.getElementById("heart" + id);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                alert("New product has added to the watchlist")
                icon.style.backgroundColor = "#097fec";

                // window.location.reload();

            } else if (t == "success2") {
                alert(" product has removed to the watchlist")
                icon.style.backgroundColor = "#6c757e";

                // window.location.reload();
            } else {
                alert(t);
            }

        }
    };

    r.open("get", "addToWatchlistProcess.php?id=" + wid, true);
    r.send();

}

function Watchlist() {
    alert("Please Sign in first");
}


function deleteFromWatchlist(id) {

    var pid = id;


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {

                window.location = "watchlist.php";
            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "deleteWatchlistProcess.php?id=" + pid, true);
    r.send();
}

// watchlist

//Cart//

function addToCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Please Sign in first.") {
                alert(t);
                window.location = "http://localhost/eshop/index.php";

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();

}


function deleteFromCart(id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Product Added to the Recent Successfully");
                alert("Product Removed from the Cart Successfully")
                window.location = "cart.php";
            }
        }
    };

    r.open("GET", "removeCartProcess.php?id=" + id, true);
    r.send();

}
//Cart//

function printInvoice() {

    var restorePage = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorePage;
}

//messages

function viewRecent() {

    var msgBox = document.getElementById("message_box");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("GET", "viewRecentMsgProcess.php", "true");
    r.send();

}

function adminVerification() {



    var e = document.getElementById("e");

    var form = new FormData();
    form.append("e", e.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                var VerificationModal = document.getElementById("verification_model");
                k = new bootstrap.Modal(VerificationModal);

                k.show();

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adminVerificationProcess.php", true);
    r.send(form);

}

function verify() {

    var v = document.getElementById("vcode");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                k.hide();
                window.location = "adminpanel.php";

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "verifyProcess.php?id=" + v.value, true);
    r.send();

}

function changeInvoiceId(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {

                document.getElementById("btn" + id).innerHTML = "packing";
                location.reload();
            } else if (t == 2) {
                document.getElementById("btn" + id).innerHTML = "Dispatch";
                location.reload();
            } else if (t == 3) {
                document.getElementById("btn" + id).innerHTML = "Shipping"
                location.reload();
            } else if (t == 4) {
                document.getElementById("btn" + id).innerHTML = "Delivered";
                document.getElementById("btn" + id).classList = "Disabled";
                location.reload();
            }

        }
    }

    r.open("GET", "changeInvoiceIdProcess.php?id=" + id, true);
    r.send();

}

function invoiceSearch() {

    var txt = document.getElementById("search");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("box").className = "";
            document.getElementById("loadResults").innerHTML = t;
        }
    }

    r.open("GET", "invoiceSearch.php?t=" + txt.value, true);
    r.send();

}

function findSellings() {

    var from = document.getElementById("from");

    var to = document.getElementById("to");




    var f = new FormData();

    f.append("f", from.value);

    f.append("t", to.value);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("loadResults").innerHTML = t;
        }
    }


    r.open("POST", "findSellingsprocess.php", true);
    r.send(f);
}

function viewMessages(email) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("chat_box").innerHTML = t;
        }
    };

    r.open("GET", "viewMessageProcess.php?email=" + email, true);
    r.send();
}

function sendMsg() {

    var recever_mail = document.getElementById("rmail");
    var msg_txt = document.getElementById("msgTxt");

    var f = new FormData();
    f.append("r", recever_mail.innerHTML);
    f.append("m", msg_txt.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "message.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "sendMsgProcess.php", true);
    r.send(f);
}

function buynow(id) {

    var product_id = id;
    var product_qty = document.getElementById("qtyinput");

    var f = new FormData();
    f.append("pid", product_id);
    f.append("pqty", product_qty.value);
    f.append("uprice", unit_price.innerHTML);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;

            window.location = "invoice.php?order_id=" + t;
        }

    }

    r.open("POST", "buyNowProcess.php?pid=" + product_id + "&pqty=" + product_qty.value, true);
    r.send(f);

}