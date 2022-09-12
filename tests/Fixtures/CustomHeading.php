<?php

namespace Ubermanu\PhpElements\Tests\Fixtures;

use Ubermanu\PhpElements\Element;

final class CustomHeading extends Element
{
    /**
     * @var string
     */
    protected string $tag = 'h1';

    /**
     * @param int $level
     */
    public function __construct(int $level)
    {
        parent::__construct();
        $this->tag = "h{$level}";
    }
}
