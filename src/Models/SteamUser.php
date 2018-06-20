<?php

namespace B3none\SteamIDConverter\Models;

class SteamUser
{
    /**
     * @var bool
     */
    protected $hasConverted = false;

    /**
     * @var string
     */
    protected $steamID;

    /**
     * @var string
     */
    protected $steamID3;

    /**
     * @var string
     */
    protected $steamID64;

    /**
     * @var string
     */
    protected $vanity;

    /**
     * SteamUser constructor.
     *
     * @param array $steamIds
     */
    public function __construct(array $steamIds = [])
    {
        if (!empty($steamIds['steamID'])) {
            $this->setSteamID($steamIds['steamID']);
        }

        if (!empty($steamIds['steamID3'])) {
            $this->setSteamID3($steamIds['steamID3']);
        }

        if (!empty($steamIds['steamID64'])) {
            $this->setSteamID64($steamIds['steamID64']);
        }

        if (!empty($steamIds['vanity'])) {
            $this->setVanity($steamIds['vanity']);
        }
    }

    /**
     * @return string
     */
    public function getSteamID() : string
    {
        return $this->steamID;
    }

    /**
     * @param string $steamID
     */
    public function setSteamID(string $steamID) : void
    {
        $this->steamID = $steamID;
    }

    /**
     * @return string
     */
    public function getSteamID3() : string
    {
        return $this->steamID3;
    }

    /**
     * @param string $steamID3
     */
    public function setSteamID3(string $steamID3) : void
    {
        $this->steamID3 = $steamID3;
    }

    /**
     * @return string
     */
    public function getSteamID64() : string
    {
        return $this->steamID64;
    }

    /**
     * @param string $steamID64
     */
    public function setSteamID64(string $steamID64) : void
    {
        $this->steamID64 = $steamID64;
    }

    /**
     * @return string
     */
    public function getVanity() : string
    {
        return $this->vanity;
    }

    /**
     * @param string $vanity
     */
    public function setVanity(string $vanity) : void
    {
        $this->vanity = $vanity;
    }

    protected function convert()
    {
    }
}