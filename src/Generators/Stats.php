<?php

namespace Generators;

class Stats
{
    public static function buildStats(iterable $iterator): \Generator
    {
        $stats = array();

        foreach ($iterator as $level) {
            if (array_key_exists($level, $stats)) {
                $stats[$level]++;
            } else {
                $stats[$level] = 1;
            }
        }

        foreach ($stats as $level => $count) {
            yield $level . ": " . $count;
        }
    }
}

