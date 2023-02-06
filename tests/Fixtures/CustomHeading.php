<?php

namespace Ubermanu\Hyperhtml\Tests\Fixtures;

use Ubermanu\Hyperhtml\Element;

final class CustomHeading extends Element
{
    /**
     * @param int $level
     */
    public function __construct(int $level)
    {
        parent::__construct("h{$level}");
    }
}
