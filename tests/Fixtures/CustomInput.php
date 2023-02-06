<?php

namespace Ubermanu\Hyperhtml\Tests\Fixtures;

use Ubermanu\Hyperhtml\Element;

final class CustomInput extends Element
{
    /**
     * @param string $type
     */
    public function __construct(string $type = 'text')
    {
        parent::__construct('input');
        $this->setAttribute('type', $type);
    }
}
