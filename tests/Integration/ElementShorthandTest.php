<?php

namespace Ubermanu\PhpElements\Tests\Integration;

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
        $element = el('p', 'Fish');
        $this->assertEquals('<p>Fish</p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithAttributesAndText(): void
    {
        $element = el('p', ['class' => 'test'], 'Mouse');
        $this->assertEquals('<p class="test">Mouse</p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithAttributesOnly(): void
    {
        $element = el('input', ['class' => 'test']);
        $this->assertEquals('<input class="test">', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithChildren(): void
    {
        $element = el('p', [
            el('span', 'Cat')
        ]);

        $this->assertEquals('<p><span>Cat</span></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementWithAttributesAndChildren(): void
    {
        $element = el('p', ['class' => 'test'], [
            el('span', 'Dog')
        ]);

        $this->assertEquals('<p class="test"><span>Dog</span></p>', $element->render());
    }
}
