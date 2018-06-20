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
     * @var VanityProcessor
     */
    protected $vanityProcessor;

    /**
     * ConversionProcessor constructor.
     *
     * @param array $steamId
     */
    public function __construct(array $steamId)
    {
        $this->steamUser = new SteamUser($steamId);
        $this->vanityProcessor = new VanityProcessor();

        $this->convert();
    }

    protected function convert() : SteamUser
    {
        if ($this->steamUser->hasSteamID64()) {
            echo PHP_EOL . "hasSteamID64() [TRUE]";
            if (!$this->steamUser->hasSteamID3()) {
                echo PHP_EOL . "hasSteamID3() [FALSE]";
                $this->steamID64toSteamID3();
            }

//            if (!$this->steamUser->hasSteamID()) {
//                $this->steamID64toSteamID();
//            }
//
//            if (!$this->steamUser->hasVanity()) {
//                $this->steamID64toVanity();
//            }
        } else {
            if ($this->steamUser->hasSteamID()) {
                $this->steamIDToSteamID64();
            }

            if ($this->steamUser->hasSteamID3()) {
                $this->steamID3ToSteamID64();
            }

            if ($this->steamUser->hasVanity()) {
                $this->vanityToSteamID64();
            }
        }

        if (!$this->steamUser->isComplete()) {
            $this->convert();
        } else {
            return $this->steamUser;
        }
    }

    const STEAM_ID_64_BASE = '76561197960265728';
    protected function steamID64toSteamID3() : void
    {
        echo PHP_EOL . "steamID64toSteamID3() [CALLED]";

        $id = $this->steamUser->getSteamID64();

        $idnum = '0';

        if (bcmod($id, '2') == 0) {
            $temp =	bcsub($id, self::STEAM_ID_64_BASE);
        } else {
            $idnum = '1';
            $temp =	bcsub($id,bcadd(self::STEAM_ID_64_BASE, '1'));
        }

        $accnum	= bcdiv($temp, '2') ?? 0;
        $steamID3 = "STEAM_0:" . $idnum . ":" . number_format($accnum, 0, '', '');
        $this->steamUser->setSteamID3((string)$steamID3);
    }

    protected function steamID3toSteamID64() : void
    {
        $id = $this->steamUser->getSteamID3();
        $accountarray =	explode(":", $id);
        $idnum = $accountarray[1];
        $accountnum	= $accountarray[2];
        $constant =	'76561197960265728';
        $steamID64 = bcadd(bcmul($accountnum, 2), bcadd($idnum, $constant));

        $this->steamUser->setSteamID64($steamID64);
    }
}