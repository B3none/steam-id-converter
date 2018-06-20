<?php

namespace B3none\SteamIDConverter;

use B3none\SteamIDConverter\Models\SteamUser;

class Client
{
    /**
     * Create a SteamUser from one of these:
     * STEAM_1:0:34122559
     *
     * @param string $steamId
     * @return SteamUser
     */
    public function createFromSteamID(string $steamId) : SteamUser
    {
        return new SteamUser([
            'steamID' => $steamId
        ]);
    }

    /**
     * Create a SteamUser from one of these:
     * 76561198028510846
     *
     * i.e. https://steamcommunity.com/profiles/76561198028510846
     *
     * @param string $steamId
     * @return SteamUser
     */
    public function createFromSteamID64(string $steamId) : SteamUser
    {
        return new SteamUser([
            'steamID64' => $steamId
        ]);
    }
}