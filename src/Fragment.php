<?php

namespace Ubermanu\Hyperhtml;

class Fragment implements Node
{
    /**
     * @var Node[]
     */
    protected array $children;

    /**
     * @param Node[] $children
     */
    public function __construct(array $children = [])
    {
        $this->children = $children;
    }

    /**
     * @param array $children
     * @return $this
     */
    public function setChildren(array $children): Fragment
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @return Node[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        $html = '';

        foreach ($this->children as $child) {
            $html .= $child->render();
        }

        return $html;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
