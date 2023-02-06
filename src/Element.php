<?php

namespace Ubermanu\Hyperhtml;

class Element implements Node
{
    /**
     * List of the self-closing tags.
     */
    const SELF_CLOSING_TAGS = [
        'area',
        'base',
        'br',
        'col',
        'embed',
        'hr',
        'img',
        'input',
        'link',
        'meta',
        'param',
        'source',
        'track',
        'wbr',
    ];

    /**
     * @var string
     */
    protected string $tag;

    /**
     * @var array
     */
    protected array $attributes = [];

    /**
     * @var Node[]
     */
    protected array $children = [];

    /**
     * @param string $tag
     */
    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes): Element
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function addAttributes(array $attributes): Element
    {
        $this->attributes = array_merge($this->attributes, $attributes);
        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function setAttribute(string $name, mixed $value): Element
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * @param string $name
     * @return string|null
     */
    public function getAttribute(string $name): ?string
    {
        return $this->attributes[$name] ?? null;
    }

    /**
     * @param Node $child
     * @return $this
     */
    public function appendChild(Node $child): Element
    {
        $this->children[] = $child;
        return $this;
    }

    /**
     * @param Node $child
     * @return $this
     */
    public function prependChild(Node $child): Element
    {
        array_unshift($this->children, $child);
        return $this;
    }

    /**
     * @param Node $child
     * @return $this
     */
    public function removeChild(Node $child): Element
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
    public function setChildren(array $children): Element
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
        $html = "<{$this->tag}" . $this->renderAttributes() . '>';

        if ($this->isSelfClosing()) {
            return $html;
        }

        return $html . $this->renderChildren() . "</{$this->tag}>";
    }

    /**
     * @return string
     */
    protected function renderAttributes(): string
    {
        $html = '';

        foreach ($this->getAttributes() as $key => $value) {
            if (is_bool($value)) {
                if ($value) {
                    $html .= " {$key}";
                }
            } elseif (is_string($value) && !empty($value)) {
                $value = \htmlspecialchars($value);
                $html .= " {$key}=\"{$value}\"";
            }
        }

        return $html;
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

    /**
     * Returns TRUE if the tag is considered as self-closing.
     *
     * @return bool
     */
    public function isSelfClosing(): bool
    {
        return in_array($this->tag, self::SELF_CLOSING_TAGS);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
