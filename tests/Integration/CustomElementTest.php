<?php

namespace Ubermanu\Hyperhtml\Tests\Integration;

use Ubermanu\Hyperhtml\Tests\Fixtures\CustomHeading;
use Ubermanu\Hyperhtml\Tests\Fixtures\CustomInput;

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
}
