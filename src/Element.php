<?php

namespace Ubermanu\Hyperhtml;

class Element implements Node, \Stringable
{
    use Traits\WithAttributes,
        Traits\WithChildren;

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
     * @param string $tag
     */
    public function __construct(string $tag)
    {
        $this->tag = $tag;
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
