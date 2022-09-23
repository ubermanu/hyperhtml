<?php

namespace Ubermanu\PhpElements;

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
        $output = '';

        foreach ($this->children as $child) {
            $output .= $child->render();
        }

        return $output;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
