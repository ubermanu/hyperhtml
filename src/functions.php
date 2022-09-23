<?php

use Ubermanu\PhpElements\Element;
use Ubermanu\PhpElements\ElementFactory;
use Ubermanu\PhpElements\Fragment;
use Ubermanu\PhpElements\Node;
use Ubermanu\PhpElements\Text;

/**
 * @return Element
 */
function el(): Element
{
    $args = func_get_args();

    if (count($args) === 0) {
        throw new \InvalidArgumentException('You must pass at least one argument to the el() function');
    }

    $factory = new ElementFactory();
    $element = $factory->create($args[0]);

    if (count($args) === 1) {
        return $element;
    }

    if (count($args) === 2) {
        if (is_string($args[1])) {
            return $element->appendChild(new Text($args[1]));
        }

        if (count($args[1]) === 0) {
            return $element;
        }

        $isNodeList = array_map(function ($item) {
            return $item instanceof Node;
        }, $args[1]);

        if (in_array(false, $isNodeList, true)) {
            return $element->addAttributes($args[1]);
        }

        return $element->setChildren($args[1]);
    }

    if (count($args) === 3) {
        if (is_string($args[2])) {
            return $element->addAttributes($args[1])->appendChild(new Text($args[2]));
        }
        return $element->addAttributes($args[1])->setChildren($args[2]);
    }

    throw new \InvalidArgumentException('You must pass at most three arguments to the el() function');
}

/**
 * @param Node[] $children
 * @return Fragment
 */
function frag(array $children): Fragment
{
    return new Fragment($children);
}
