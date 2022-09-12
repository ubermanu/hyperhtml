<?php

namespace Ubermanu\PhpElements;

class Text implements Node
{
    /**
     * @var string
     */
    protected string $content;

    /**
     * @param string|null $content
     */
    public function __construct(?string $content = null)
    {
        $this->content ??= $content;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return \htmlspecialchars($this->content);
    }
}
