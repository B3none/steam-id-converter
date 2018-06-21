<?php

namespace B3none\SteamIDConverter\Tests;

use B3none\SteamIDConverter\Models\SteamUser;
use B3none\SteamIDConverter\Processors\ConversionProcessor;
use PHPUnit\Framework\TestCase;

class ConversionProcessorTest extends TestCase
{
    public function testConvert()
    {
        $conversionProcessor = new ConversionProcessor([
            'SteamID64' => '76561198028510846'
        ]);
        $response = $conversionProcessor->convert();

        $this->assertTrue($response instanceof SteamUser);
        $this->assertTrue($response->getSteamID() === 'STEAM_0:0:34122559');
    }
}
