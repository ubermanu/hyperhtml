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
    public function testElementWithProps(): void
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
}
