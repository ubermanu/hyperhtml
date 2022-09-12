<?php

namespace Ubermanu\PhpElements;

class Element implements Node
{
    /**
     * @var string
     */
    protected string $tag = 'div';

    /**
     * @var string[]
     */
    protected array $attributes = [];

    /**
     * @var Node[]
     */
    protected array $children = [];

    /**
     * @param string|null $tag
     * @param string[]|null $attributes
     * @param Node[]|null $children
     */
    public function __construct(?string $tag = null, ?array $attributes = null, ?array $children = null)
    {
        $this->tag = $tag ?? $this->tag;
        $this->attributes = array_merge($this->attributes, $attributes ?? []);
        $this->children = $children ?? $this->children;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        $output = "<{$this->tag}";

        foreach ($this->attributes as $key => $value) {
            $output .= " {$key}=\"{$value}\"";
        }

        $output .= '>';

        foreach ($this->children as $child) {
            $output .= $child->render();
        }

        $output .= "</{$this->tag}>";

        return $output;
    }
}
