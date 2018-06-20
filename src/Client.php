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
     * [U:1:68245118]
     *
     * @param string $steamId
     * @return SteamUser
     */
    public function createFromSteamID3(string $steamId) : SteamUser
    {
        return new SteamUser([
            'steamID3' => $steamId
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

    /**
     * Create a SteamUser from one of these:
     * b3none
     *
     * i.e. https://steamcommunity.com/id/b3none
     *
     * @param string $vanityId
     * @return SteamUser
     */
    public function createFromVanity(string $vanityId) : SteamUser
    {
        return new SteamUser([
            'vanity' => $vanityId
        ]);
    }
}