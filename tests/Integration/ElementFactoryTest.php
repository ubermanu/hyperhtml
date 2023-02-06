<?php

namespace Ubermanu\Hyperhtml\Tests\Integration;

use Ubermanu\Hyperhtml\Element;
use Ubermanu\Hyperhtml\ElementFactory;
use Ubermanu\Hyperhtml\SelectorParser;

class ElementFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new ElementFactory(new SelectorParser());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementFactory(): void
    {
        $element = $this->factory->create('p');
        $this->assertInstanceOf(Element::class, $element);
        $this->assertEquals('<p></p>', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testElementFactoryWithAttrs(): void
    {
        $element = $this->factory->create('p.test');
        $this->assertInstanceOf(Element::class, $element);
        $this->assertEquals('<p class="test"></p>', $element->render());
    }
}
