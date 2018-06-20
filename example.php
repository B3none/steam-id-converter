<?php

include("vendor/autoload.php");

$client = \B3none\SteamIDConverter\Client::create();
$steamUser = $client->createFromSteamID64('76561198028510846');

print_r([
    'SteamID64' => $steamUser->getSteamID64(),
    'SteamID' => $steamUser->getSteamID()
]);