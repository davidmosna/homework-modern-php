<?php

use Decorators\FilterDecorator;
use Decorators\LevelDecorator;
use Generators\Stats;

class App
{
    private \Iterator $stream;

    public function __construct(string $filename)
    {
        $file = new SplFileObject($filename);
        $file->setFlags(SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY);

        $this->stream = new LevelDecorator($file);
        $this->stream = new FilterDecorator($this->stream, 'debug');
        $this->stream = Stats::buildStats($this->stream);
    }

    public function run()
    {
        foreach ($this->stream as $line) {
            echo $line . PHP_EOL;
        }
    }
}
