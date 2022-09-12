<?php

namespace Ubermanu\PhpElements\Tests\Unit;

class ElementShorthandTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testElement(): void
    {
        $element = el('p');
        $this->assertEquals('<p></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithText(): void
    {
        $element = el('p', 'test');
        $this->assertEquals('<p>test</p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithProps(): void
    {
        $element = el('p', ['class' => 'test'], '');
        $this->assertEquals('<p class="test"></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithChildren(): void
    {
        $element = el('p', [
            el('span')
        ]);

        $this->assertEquals('<p><span></span></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithPropsAndChildren(): void
    {
        $element = el('p', ['class' => 'test'], [
            el('span')
        ]);

        $this->assertEquals('<p class="test"><span></span></p>', $element->render());
    }
}
