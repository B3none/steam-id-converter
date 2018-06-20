<?php

namespace B3none\SteamIDConverter\Models;

class SteamUser
{
    /**
     * @var bool
     */
    protected $isComplete = false;

    /**
     * @var string
     */
    protected $steamID;

    /**
     * @var string
     */
    protected $steamID64;

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

        if (!empty($steamIds['steamID64'])) {
            $this->setSteamID64($steamIds['steamID64']);
        }
    }

    /**
     * @return string
     */
    public function getSteamID() : ?string
    {
        return $this->steamID;
    }

    public function hasSteamID() : bool
    {
        return !empty($this->getSteamID());
    }

    /**
     * @param string $steamID
     */
    public function setSteamID(string $steamID) : void
    {
        $this->steamID = $steamID;
        $this->detectIsComplete();
    }

    /**
     * @return string
     */
    public function getSteamID64() : ?string
    {
        return $this->steamID64;
    }

    public function hasSteamID64() : bool
    {
        return !empty($this->getSteamID64());
    }

    /**
     * @param string $steamID64
     */
    public function setSteamID64(string $steamID64) : void
    {
        $this->steamID64 = $steamID64;
        $this->detectIsComplete();
    }

    /**
     * @return bool
     */
    public function isComplete() : bool
    {
        return $this->isComplete;
    }

    public function detectIsComplete() : void
    {
        $this->isComplete = (
            $this->hasSteamID64()
            && $this->hasSteamID()
        );
    }
}