<?php

namespace Ubermanu\PhpElements\Tests\Fixtures;

use Ubermanu\PhpElements\CustomElement;

final class CustomInput extends CustomElement
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
