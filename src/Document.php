<?php

namespace Ubermanu\Hyperhtml;

class Document implements Node, \Stringable
{
    /**
     * @var Doctype
     */
    protected Doctype $doctype;

    /**
     * @var Element
     */
    protected Element $head;

    /**
     * @var Element
     */
    protected Element $body;

    public function __construct(?Doctype $doctype = null)
    {
        $this->doctype = $doctype ?? new Doctype();
        $this->head = new Element('head');
        $this->body = new Element('body');
    }

    /**
     * @return Doctype
     */
    public function getDoctype(): Doctype
    {
        return $this->doctype;
    }

    /**
     * @return Element
     */
    public function getHead(): Element
    {
        return $this->head;
    }

    /**
     * @return Element
     */
    public function getBody(): Element
    {
        return $this->body;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return $this->doctype->render() . $this->head->render() . $this->body->render();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
