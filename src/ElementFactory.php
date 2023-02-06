<?php

namespace Ubermanu\Hyperhtml;

class ElementFactory
{
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
     * @return Element
     */
    public function create(string $selector): Element
    {
        $result = $this->selectorParser->parse($selector);

        $element = new Element($result['tag']);
        $element->setAttribute('id', $result['id']);
        $element->setAttribute('class', implode(' ', $result['classes']));
        $element->addAttributes($result['attributes']);

        return $element;
    }
}
