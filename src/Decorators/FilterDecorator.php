<?php

namespace Decorators;

use Iterator;

class FilterDecorator extends \FilterIterator
{
    private mixed $filter;

    public function __construct(Iterator $iterator, mixed $filter)
    {
        parent::__construct($iterator);
        $this->filter = $filter;
    }

    public function accept(): bool
    {
        return parent::current() !== $this->filter;
    }
}