<?php

namespace Ubermanu\PhpElements\Tests;

use Ubermanu\PhpElements\Tests\Fixtures\CustomInput;

class CustomElementTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testCustomElement(): void
    {
        $element = new CustomInput();

        // TODO: Fix the closing tag
        $this->assertEquals('<input type="text"></input>', $element->render());
    }
}
