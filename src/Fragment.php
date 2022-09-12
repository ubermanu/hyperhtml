<?php

namespace Ubermanu\PhpElements;

final class Fragment implements Node
{
    /**
     * @var Node[]
     */
    protected array $children;

    public function __construct(array $children = [])
    {
        $this->children = $children;
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
}
