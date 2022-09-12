<?php

namespace Ubermanu\PhpElements;

abstract class CustomElement extends Element
{
    /**
     * @param array|null $attributes
     * @param array|null $children
     */
    public function __construct(?array $attributes = null, ?array $children = null)
    {
        parent::__construct(null, $attributes, $children);
    }
}
