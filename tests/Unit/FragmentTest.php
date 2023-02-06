<?php

namespace Ubermanu\Hyperhtml\Tests\Unit;

use Ubermanu\Hyperhtml\Element;
use Ubermanu\Hyperhtml\Fragment;
use Ubermanu\Hyperhtml\Text;
use function Ubermanu\Hyperhtml\html as h;
use function Ubermanu\Hyperhtml\frag;

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
    public function testEmptyFragment(): void
    {
        $fragment = new Fragment();

        $this->assertEquals('', $fragment->render());
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
            h('p'),
            h('p')
        ]);

        $this->assertEquals('<p></p><p></p>', $fragment->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testFragmentToString(): void
    {
        $fragment = new Fragment([
            new Element('p'),
            new Text('Crocodile')
        ]);

        $this->assertEquals('<p></p>Crocodile', (string)$fragment);
    }
}
