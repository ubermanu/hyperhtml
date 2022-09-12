<?php

use Ubermanu\PhpElements\Element;
use Ubermanu\PhpElements\Fragment;
use Ubermanu\PhpElements\Node;
use Ubermanu\PhpElements\Text;

/**
 * TODO: Allow passing a class as tag
 * @return Element
 */
function el(): Element
{
    $args = func_get_args();

    if (count($args) === 0) {
        throw new \InvalidArgumentException('You must pass at least one argument to the el() function');
    }

    if (count($args) === 1) {
        return new Element($args[0]);
    }

    if (count($args) === 2) {
        if (is_string($args[1])) {
            return new Element($args[0], [], [new Text($args[1])]);
        }
        return new Element($args[0], [], $args[1]);
    }

    if (count($args) === 3) {
        if (is_string($args[2])) {
            return new Element($args[0], $args[1], [new Text($args[2])]);
        }
        return new Element($args[0], $args[1], $args[2]);
    }

    throw new \InvalidArgumentException('You must pass at least one argument to the el() function');
}

/**
 * @param Node[] $children
 * @return Fragment
 */
function frag(array $children): Fragment
{
    return new Fragment($children);
}
