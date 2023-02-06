<?php

namespace Ubermanu\Hyperhtml\Tests\Unit;

use Ubermanu\Hyperhtml\Element;

class ElementTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testRender(): void
    {
        $element = new Element('p');
        $this->assertEquals('<p></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testRenderWithAttrs(): void
    {
        $element = new Element('p');
        $element->setAttribute('class', 'test');
        $this->assertEquals('<p class="test"></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testRenderWithChildren(): void
    {
        $element = new Element('p');
        $element->appendChild(new Element('span'));
        $this->assertEquals('<p><span></span></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testRenderClosingTag(): void
    {
        $element = new Element('br');
        $this->assertEquals('<br>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testRenderAttributeEscaped(): void
    {
        $element = new Element('p');
        $element->setAttribute('class', 'test"');
        $this->assertEquals('<p class="test&quot;"></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testRenderBoolAttribute(): void
    {
        $element = new Element('input');
        $element->setAttribute('checked', true);
        $this->assertEquals('<input checked>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testRenderToString(): void
    {
        $element = new Element('p');
        $this->assertEquals('<p></p>', (string)$element);
    }
}
