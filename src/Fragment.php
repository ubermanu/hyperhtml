<?php

namespace Ubermanu\Hyperhtml;

class Fragment implements Node, \Stringable
{
    use Traits\WithChildren;

    /**
     * @param Node[] $children
     */
    public function __construct(array $children = [])
    {
        $this->children = $children;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return $this->renderChildren();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
