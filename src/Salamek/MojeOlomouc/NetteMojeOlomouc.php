<?php

namespace Salamek\MojeOlomouc;

use GuzzleHttp\Client;


/**
 * Class NetteMojeOlomouc
 * @package Salamek\MojeOlomouc
 */
class NetteMojeOlomouc extends MojeOlomouc
{
    /**
     * NetteMojeOlomouc constructor.
     * @param string $apiKey
     * @param bool $isProduction
     * @param array $hydrationTable
     * @param bool $appendDefaultHydrationTable
     */
    public function __construct(string $apiKey, bool $isProduction = false, array $hydrationTable = [], bool $appendDefaultHydrationTable = true)
    {
        $guzzleHttpConfig = [
            'base_uri' => ($isProduction ? 'https://app.olomouc.eu': 'https://www.olomouc.app')
        ];

        parent::__construct(new Client($guzzleHttpConfig), $apiKey, $hydrationTable, $appendDefaultHydrationTable);
    }
}