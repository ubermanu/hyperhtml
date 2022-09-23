<?php

namespace Ubermanu\PhpElements;

class Comment implements Node
{
    /**
     * @var string
     */
    protected string $content = '';

    /**
     * @param string|null $content
     */
    public function __construct(?string $content = null)
    {
        $this->content = $content ?? $this->content;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        if (empty($this->content)) {
            return '';
        }

        return '<!-- ' . \htmlspecialchars($this->content) . ' -->';
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
