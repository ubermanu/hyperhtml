<?php

namespace Ubermanu\Hyperhtml\Traits;

use Ubermanu\Hyperhtml\Node;

trait WithChildren
{
    /**
     * @var Node[]
     */
    protected array $children = [];

    /**
     * @param Node $child
     * @return $this
     */
    public function appendChild(Node $child): self
    {
        $this->children[] = $child;
        return $this;
    }

    /**
     * @param Node $child
     * @return $this
     */
    public function prependChild(Node $child): self
    {
        array_unshift($this->children, $child);
        return $this;
    }

    /**
     * @param Node $child
     * @return $this
     */
    public function removeChild(Node $child): self
    {
        $key = array_search($child, $this->children, true);
        if ($key !== false) {
            unset($this->children[$key]);
        }
        return $this;
    }

    /**
     * @param Node[] $children
     * @return $this
     */
    public function setChildren(array $children): self
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
     * @return string
     */
    protected function renderChildren(): string
    {
        $html = '';

        foreach ($this->getChildren() as $child) {
            if ($child instanceof Node) {
                $html .= $child->render();
            } elseif (is_string($child)) {
                $html .= $child;
            }
        }

        return $html;
    }
}
