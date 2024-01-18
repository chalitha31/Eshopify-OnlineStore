<?php

require "connection.php";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $invoice_status_rs = Database::search("SELECT `status` FROM `invoice` WHERE `id` = '" . $id . "'");
    $invoice_status_data = $invoice_status_rs->fetch_assoc();

    $old_status = $invoice_status_data["status"];
    $new_status = 0;

    if ($old_status == 0) {
        Database::iud("UPDATE `invoice` SET `status`='1' WHERE `id` = '" . $id . "'");
        $new_status = 1;
    } else if ($old_status == 1) {
        Database::iud("UPDATE `invoice` SET `status`='2' WHERE `id` = '" . $id . "'");
        $new_status = 2;
    } else if ($old_status == 2) {
        Database::iud("UPDATE `invoice` SET `status`='3' WHERE `id` = '" . $id . "'");
        $new_status = 3;
    } else if ($old_status == 3) {
        Database::iud("UPDATE `invoice` SET `status`='4' WHERE `id` = '" . $id . "'");
        $new_status = 4;
    }

    echo $new_status;
}
