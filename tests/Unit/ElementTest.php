<?php

namespace Ubermanu\PhpElements\Tests\Unit;

use Ubermanu\PhpElements\Element;

class ElementTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testElement(): void
    {
        $element = new Element('p');
        $this->assertEquals('<p></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithAttrs(): void
    {
        $element = new Element('p', ['class' => 'test']);
        $this->assertEquals('<p class="test"></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithChildren(): void
    {
        $element = new Element('p', [], [new Element('span')]);
        $this->assertEquals('<p><span></span></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementClosingTag(): void
    {
        $element = new Element('br');
        $this->assertEquals('<br>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementAttributeEscaped(): void
    {
        $element = new Element('p', ['class' => 'test"']);
        $this->assertEquals('<p class="test&quot;"></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithSelectorAsTag(): void
    {
        $element = new Element('p.test');
        $this->assertEquals('<p class="test"></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementBoolAttribute(): void
    {
        $element = new Element('input', ['checked' => true]);
        $this->assertEquals('<input checked>', $element->render());
    }
}
