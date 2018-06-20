<?php

namespace B3none\SteamIDConverter\Tests;

use B3none\SteamIDConverter\Client;
use B3none\SteamIDConverter\Models\SteamUser;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testCreateFromSteamID()
    {
        $client = Client::create();

        $steamUser = $client->createFromSteamID('STEAM_0:0:34122559');
        $this->assertTrue($steamUser instanceof SteamUser);
    }

    public function testCreateFromSteamID64()
    {
        $client = Client::create();

        $steamUser = $client->createFromSteamID64('76561198028510846');
        $this->assertTrue($steamUser instanceof SteamUser);
    }

    public function testCreate()
    {
        $client = Client::create();
        $this->assertTrue($client instanceof Client);
    }
}
