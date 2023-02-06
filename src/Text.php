<?php

namespace Ubermanu\Hyperhtml;

class Text implements Node
{
    /**
     * @var string
     */
    protected string $content = '';

    /**
     * @param string $content
     */
    public function __construct(string $content = '')
    {
        $this->content = $content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): Text
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return \htmlspecialchars($this->content);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
