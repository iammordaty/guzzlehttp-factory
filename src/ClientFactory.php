<?php

declare(strict_types = 1);

namespace Iammordaty\GuzzleHttp;

use GuzzleHttp\Client;

class ClientFactory
{
    /**
     * @param array $options
     * @return Client
     */
    public static function create(array $options = []): Client
    {
        $config = $options;

        $stack = $options['stack'] ?? HandlerStackFactory::create();

        $config['handler'] = isset($options['handler'])
            ? HandlerStackFactory::create($options['handler'], $stack)
            : $stack;

        $client = new Client($config);

        return $client;
    }
}
