<?php

namespace Ubermanu\Hyperhtml;

/**
 * @return Element
 */
function h(): Element
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
function fragment(array $children): Fragment
{
    return new Fragment($children);
}

/**
 * A utility function to create a class attribute string, based on an array of
 * class names and their truthiness.
 *
 * @param ...$classNames
 * @return string
 */
function classnames(...$classNames): string
{
    $classes = [];

    foreach ($classNames as $className) {
        if (is_string($className) && $className) {
            $classes[] = $className;
        }

        if (is_array($className)) {
            foreach ($className as $key => $value) {
                if ($value && is_string($key) && $key) {
                    $classes[] = $key;
                }
            }
        }
    }

    return implode(' ', array_unique($classes));
}

/**
 * Render a string as HTML without escaping it.
 * This is useful for rendering HTML that you know is safe, such as a
 * translation string.
 *
 * @param string $html
 * @return UnsafeHtml
 */
function unsafe(string $html): UnsafeHtml
{
    return new UnsafeHtml($html);
}

/**
 * Create a document with a body containing the given elements.
 * This is useful for rendering a full HTML document, including the <html>,
 * <head> and <body> tags.
 *
 * @param array $elements
 * @return Document
 */
function document(array $elements = []): Document
{
    $doc = new Document();
    $doc->getBody()->setChildren($elements);
    return $doc;
}
