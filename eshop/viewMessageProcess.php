<?php

session_start();
require "connection.php";

$recever_email = $_SESSION["u"]["email"];
$sender_email = $_GET["email"];

$message_rs = Database::search("SELECT * FROM `message` WHERE `from`='" . $sender_email . "'
OR `to`='" . $sender_email . "'");

$message_num = $message_rs->num_rows;

for ($x = 0; $x < $message_num; $x++) {

    $message_data = $message_rs->fetch_assoc();

    if ($message_data["from"] == $sender_email & $message_data["to"] == $recever_email) {

?>

        <!-- receiver's message -->

        <div class="mb-3 w-50">
            <img src="resources/user.svg" style="width: 50px;" class="rounded-circle mb-1" />

            <div>

                <div class="bg-light rounded py-2 px-3 mb-2">
                    <p class="mb-0 text-dark"><?php echo $message_data["content"]; ?></p>
                </div>

                <p class="small text-black-50 text-end">01:10 | 10.05.2022</p>
                <p class="invisible" id="rmail"><?php echo $message_data["from"]; ?></p>

            </div>
        </div>

        <!-- receiver's message -->

    <?php

    } else if ($message_data["to"] == $sender_email & $message_data["from"] == $recever_email) {

    ?>

        <!-- sender's message -->

        <div class="mb-3 w-50">
            <div>

                <div class="bg-primary rounded py-2 px-3 mb-2">
                    <p class="mb-0 text-white"><?php echo $message_data["content"]; ?></p>
                </div>

                <p class="small text-black-50 text-end">01:10 | 10.05.2022</p>

            </div>
        </div>

        <!-- sender's message -->


<?php

    }

    Database::iud("UPDATE `message` SET `status`='1' WHERE `from`='" . $sender_email . "' AND
    `to`='" . $sender_email . "'");
}


?>