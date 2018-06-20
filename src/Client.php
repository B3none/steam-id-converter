<?php

namespace B3none\SteamIDConverter;

use B3none\SteamIDConverter\Models\SteamUser;
use B3none\SteamIDConverter\Processors\ConversionProcessor;

class Client
{
    static function create()
    {
        return new self();
    }

    /**
     * Create a SteamUser from one of these:
     * STEAM_1:0:34122559
     *
     * @param string $steamId
     * @return SteamUser
     */
    public function createFromSteamID(string $steamId) : SteamUser
    {
        $conversionProcessor = new ConversionProcessor([
            'steamID' => $steamId
        ]);
        return $conversionProcessor->convert();
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
        $conversionProcessor = new ConversionProcessor([
            'steamID64' => $steamId
        ]);
        return $conversionProcessor->convert();
    }
}