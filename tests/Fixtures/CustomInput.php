<?php

namespace Ubermanu\PhpElements\Tests\Fixtures;

use Ubermanu\PhpElements\Element;

final class CustomInput extends Element
{
    /**
     * @var string
     */
    protected string $tag = 'input';

    /**
     * @var string[]
     */
    protected array $attributes = [
        'type' => 'text',
    ];
}
