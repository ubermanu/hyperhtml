<?php

namespace Ubermanu\PhpElements\Tests\Unit;

use Ubermanu\PhpElements\Text;

class TextTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testText(): void
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
    public function testEmptyText(): void
    {
        $text = new Text();
        $this->assertEquals('', $text->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testTextToString(): void
    {
        $text = new Text('Lizard');
        $this->assertEquals('Lizard', (string)$text);
    }
}
