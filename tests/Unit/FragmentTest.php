<?php

namespace Ubermanu\PhpElements\Tests\Unit;

use Ubermanu\PhpElements\Element;
use Ubermanu\PhpElements\Fragment;
use Ubermanu\PhpElements\Text;

class FragmentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testFragment(): void
    {
        $fragment = new Fragment([
            new Element('p'),
            new Element('p')
        ]);

        $this->assertEquals('<p></p><p></p>', $fragment->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testFragmentWithText(): void
    {
        $fragment = new Fragment([
            new Element('p'),
            new Text('Crocodile')
        ]);

        $this->assertEquals('<p></p>Crocodile', $fragment->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testFragmentShortHand(): void
    {
        $fragment = frag([
            el('p'),
            el('p')
        ]);

        $this->assertEquals('<p></p><p></p>', $fragment->render());
    }
}
