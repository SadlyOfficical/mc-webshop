<?php

require '../config.php';
require '../connection.php';

$id = strip_tags($_GET['id']);
$username = strip_tags($_GET['username']);
$voucher = strip_tags($_GET['voucher']);

require_once "../api/Rcon.php";

use Thedudeguy\Rcon;

if (isset($id) && isset($username) && isset($voucher)) {
    $url = "https://gift.truemoney.com/campaign/vouchers/" . $voucher . "/redeem";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = <<<DATA
    {"mobile":"$phone",
     "voucher_hash":"$voucher"}
    DATA;

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);

    $jsonDecoded = json_decode($resp);

    if ($jsonDecoded->status->code == "SUCCESS") {
        try {
            $select_stmt = $db->prepare("SELECT * FROM goods WHERE id = :uid");
            $select_stmt->execute(array(':uid' => $id));
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

            if (floatval($jsonDecoded->data->my_ticket->amount_baht) >= floatval($row->price)) {
                $host = $row->rcon_host;
                $port = $row->rcon_port;
                $password  = $row->rcon_password;
                $timeout = $rconTimeout;

                $rcon = new Rcon($host, $port, $password, $timeout);

                if ($rcon->connect()) {
                    $rcon->sendCommand(str_replace("%player%", $username, $row->command));

                    $insert_stmt = $db->prepare("INSERT INTO history (username, goods) VALUES (:uname, :ugoods)");
                    $insert_stmt->execute(array(
                        ':uname' => $username,
                        ':ugoods' => $id
                    ));

                    header("Location: $host?page=thankyou", true, 301);
                } else {
                    header("Location: $host?page=purchase&error=1003", true, 301);
                }
            } else {
                header("Location: $host?page=purchase&error=1005", true, 301);
            }
        } catch (PDOException $e) {
            header("Location: $host?page=purchase&error=1004", true, 301);
        }
    } else {
        header("Location: $host?page=purchase&error=1002", true, 301);
    }
} else {
    header("Location: $host?page=purchase&error&error=1001", true, 301);
}
