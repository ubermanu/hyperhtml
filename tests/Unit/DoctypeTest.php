<?php

namespace Ubermanu\PhpElements\Tests\Unit;

use Ubermanu\PhpElements\Doctype;

class DoctypeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testDoctype(): void
    {
        $doctype = new Doctype();
        $this->assertEquals('<!DOCTYPE html>', $doctype->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testDoctypeHTML401Strict(): void
    {
        $doctype = new Doctype();
        $doctype->setPublicId('-//W3C//DTD HTML 4.01//EN');
        $doctype->setSystemId('http://www.w3.org/TR/html4/strict.dtd');

        $this->assertEquals('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">', $doctype->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testDoctypeHTML401Transitional(): void
    {
        $doctype = new Doctype();
        $doctype->setPublicId('-//W3C//DTD HTML 4.01 Transitional//EN');
        $doctype->setSystemId('http://www.w3.org/TR/html4/loose.dtd');

        $this->assertEquals('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">', $doctype->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testDoctypeHTML401Frameset(): void
    {
        $doctype = new Doctype();
        $doctype->setPublicId('-//W3C//DTD HTML 4.01 Frameset//EN');
        $doctype->setSystemId('http://www.w3.org/TR/html4/frameset.dtd');

        $this->assertEquals('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">', $doctype->render());
    }
}
