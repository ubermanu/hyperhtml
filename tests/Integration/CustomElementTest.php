<?php

namespace Ubermanu\PhpElements\Tests\Integration;

use Ubermanu\PhpElements\Tests\Fixtures\CustomHeading;
use Ubermanu\PhpElements\Tests\Fixtures\CustomInput;

class CustomElementTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testCustomInput(): void
    {
        $element = new CustomInput();
        $this->assertEquals('<input type="text">', $element->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testCustomHeading(): void
    {
        $h1 = new CustomHeading(1);
        $this->assertEquals('<h1></h1>', $h1->render());

        $h3 = new CustomHeading(3);
        $this->assertEquals('<h3></h3>', $h3->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testInlineCustomElement(): void
    {
        $customElement = new class extends \Ubermanu\PhpElements\Element {
            protected string $tag = 'p';
            protected array $attributes = ['title' => 'My custom element'];
        };

        $this->assertEquals('<p title="My custom element"></p>', $customElement->render());
    }
}
