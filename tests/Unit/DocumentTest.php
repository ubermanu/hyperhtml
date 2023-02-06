<?php

namespace Ubermanu\Hyperhtml\Tests\Unit;

use Ubermanu\Hyperhtml\Doctype;
use Ubermanu\Hyperhtml\Document;

class DocumentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @return void
     */
    public function testRender(): void
    {
        $document = new Document();
        $this->assertEquals('<!DOCTYPE html><head></head><body></body>', $document->render());
    }

    /**
     * @covers
     * @return void
     */
    public function testRenderWithDoctype(): void
    {
        $doctype = new Doctype();
        $doctype->setPublicId('-//W3C//DTD HTML 4.01//EN');
        $doctype->setSystemId('http://www.w3.org/TR/html4/strict.dtd');

        $document = new Document($doctype);

        $this->assertEquals('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><head></head><body></body>', $document->render());
    }
}
