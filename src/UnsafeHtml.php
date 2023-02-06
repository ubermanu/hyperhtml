<?php

namespace Ubermanu\Hyperhtml;

class UnsafeHtml implements Node, \Stringable
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
    public function setContent(string $content): UnsafeHtml
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
     * @return string
     */
    public function render(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
