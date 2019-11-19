<?php

declare(strict_types = 1);

namespace Iammordaty\GuzzleHttp;

use GuzzleHttp\HandlerStack;

class HandlerStackFactory
{
    /**
     * @param callable|iterable $handlers
     * @param HandlerStack|null $stack
     * @return HandlerStack
     */
    public static function create($handlers = null, HandlerStack $stack = null): HandlerStack
    {
        $stack = $stack ?: HandlerStack::create();

        if (!$handlers) {
            return $stack;
        }

        if (!is_iterable($handlers)) {
            $handlers = [ $handlers ];
        }

        foreach ($handlers as $handler) {
            $stack->push($handler);
        }

        return $stack;
    }
}
