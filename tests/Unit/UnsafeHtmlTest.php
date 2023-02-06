<?php

namespace Ubermanu\Hyperhtml\Tests\Unit;

use Ubermanu\Hyperhtml\UnsafeHtml;

class UnsafeHtmlTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testRender(): void
    {
        $unsafeHtml = new UnsafeHtml('<script>alert("test");</script>');
        $this->assertEquals('<script>alert("test");</script>', $unsafeHtml->render());
    }
}
