<?php

namespace Decorators;

const LEVEL_REGEX = '/test\.(\w+)/';

class LevelDecorator extends \IteratorIterator
{
    public function current(): mixed
    {
        $current = parent::current();

        if (preg_match(LEVEL_REGEX, $current, $matches)) {
            return strtolower($matches[1]);
        }

        return $current;
    }
}
