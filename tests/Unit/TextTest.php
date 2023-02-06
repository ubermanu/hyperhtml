<?php

namespace Ubermanu\Hyperhtml\Tests\Unit;

use Ubermanu\Hyperhtml\Text;

class TextTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testRender(): void
    {
        $text = new Text('Lizard');
        $this->assertEquals('Lizard', $text->render());

        $text = new Text();
        $text->setContent('Dragon');
        $this->assertEquals('Dragon', $text->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testRenderEmptyText(): void
    {
        $text = new Text();
        $this->assertEquals('', $text->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testToString(): void
    {
        $text = new Text('Lizard');
        $this->assertEquals('Lizard', (string)$text);
    }
}
