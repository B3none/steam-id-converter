<?php

namespace B3none\SteamIDConverter\Processors;

use B3none\SteamIDConverter\Models\SteamUser;

class ConversionProcessor
{
    /**
     * @var SteamUser
     */
    protected $steamUser;

    /**
     * ConversionProcessor constructor.
     *
     * @param array $steamId
     */
    public function __construct(array $steamId)
    {
        $this->steamUser = new SteamUser($steamId);

        $this->convert();
    }

    /**
     * I've made this function recursive so that when I implement different
     * SteamID types then they can be easily implemented.
     *
     * @return SteamUser
     */
    protected function convert() : SteamUser
    {
        if ($this->steamUser->hasSteamID64()) {
            if (!$this->steamUser->hasSteamID()) {
                $this->steamID64toSteamID();
            }
        } else {
            if ($this->steamUser->hasSteamID()) {
                $this->steamIDtoSteamID64();
            }
        }

        if (!$this->steamUser->isComplete()) {
            $this->convert();
        } else {
            return $this->steamUser;
        }
    }

    const STEAM_ID_64_BASE = '76561197960265728';

    /**
     * This function was refactored from:
     * https://github.com/callumthomson/steamid-converter
     */
    protected function steamID64toSteamID() : void
    {
        $id = $this->steamUser->getSteamID64();

        $idNumber = '0';

        if (bcmod($id, '2') == 0) {
            $temp =	bcsub($id, self::STEAM_ID_64_BASE);
        } else {
            $idNumber = '1';
            $temp =	bcsub($id, bcadd(self::STEAM_ID_64_BASE, '1'));
        }

        $accountNumber	= bcdiv($temp, '2') ?? 0;
        $steamID3 = "STEAM_0:" . $idNumber . ":" . number_format($accountNumber, 0, '', '');
        $this->steamUser->setSteamID((string)$steamID3);
    }

    /**
     * This function was refactored from:
     * https://github.com/callumthomson/steamid-converter
     */
    protected function steamIDtoSteamID64() : void
    {
        $id = $this->steamUser->getSteamID();

        $account = explode(":", $id);
        $steamID64 = bcadd(bcmul($account[1], 2), bcadd($account[0], self::STEAM_ID_64_BASE));

        $this->steamUser->setSteamID64($steamID64);
    }
}