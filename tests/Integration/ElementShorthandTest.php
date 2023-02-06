<?php

namespace Ubermanu\Hyperhtml\Tests\Integration;

use function Ubermanu\Hyperhtml\html as h;

class ElementShorthandTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testElement(): void
    {
        $element = h('p');
        $this->assertEquals('<p></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithText(): void
    {
        $element = h('p', 'Fish');
        $this->assertEquals('<p>Fish</p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithAttributesAndText(): void
    {
        $element = h('p', ['class' => 'test'], 'Mouse');
        $this->assertEquals('<p class="test">Mouse</p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithAttributesOnly(): void
    {
        $element = h('input', ['class' => 'test']);
        $this->assertEquals('<input class="test">', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithChildren(): void
    {
        $element = h('p', [
            h('span', 'Cat')
        ]);

        $this->assertEquals('<p><span>Cat</span></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithAttributesAndChildren(): void
    {
        $element = h('p', ['class' => 'test'], [
            h('span', 'Dog')
        ]);

        $this->assertEquals('<p class="test"><span>Dog</span></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithSelectorAsTag(): void
    {
        $element = h('p.test');
        $this->assertEquals('<p class="test"></p>', $element->render());
    }
}
