<?php

namespace Ubermanu\PhpElements;

class Doctype implements Node
{
    /**
     * @var string
     */
    protected string $name = 'html';

    /**
     * @var string
     */
    protected string $publicId = '';

    /**
     * @var string
     */
    protected string $systemId = '';

    /**
     * @return string
     */
    public function render(): string
    {
        $result = '<!DOCTYPE ' . $this->name;

        if (!empty($this->publicId)) {
            $result .= ' PUBLIC "' . $this->publicId . '"';
        }

        if (!empty($this->systemId)) {
            $result .= ' "' . $this->systemId . '"';
        }

        $result .= '>';

        return $result;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): Doctype
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $publicId
     * @return $this
     */
    public function setPublicId(string $publicId): Doctype
    {
        $this->publicId = $publicId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublicId(): string
    {
        return $this->publicId;
    }

    /**
     * @param string $systemId
     * @return $this
     */
    public function setSystemId(string $systemId): Doctype
    {
        $this->systemId = $systemId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSystemId(): string
    {
        return $this->systemId;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
