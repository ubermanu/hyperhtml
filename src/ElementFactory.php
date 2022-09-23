<?php

namespace Ubermanu\PhpElements;

class ElementFactory
{
    /**
     * @var array
     */
    protected array $elements = [];

    /**
     * @var SelectorParser
     */
    protected SelectorParser $selectorParser;

    /**
     * @param SelectorParser|null $selectorParser
     */
    public function __construct(
        ?SelectorParser $selectorParser = null
    ) {
        $this->selectorParser = $selectorParser ?? new SelectorParser();
    }

    /**
     * @param string $selector
     * @param array $attributes
     * @return Element
     */
    public function create(string $selector, array $attributes = []): Element
    {
        $result = $this->selectorParser->parse($selector);

        $element = new Element($result['tag']);
        $element->setAttribute('id', $result['id']);
        $element->setAttribute('class', implode(' ', $result['classes']));
        $element->addAttributes($result['attributes']);
        $element->addAttributes($attributes);

        return $element;
    }
}
