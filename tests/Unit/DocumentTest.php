<?php

namespace Ubermanu\Hyperhtml\Tests\Unit;

use Ubermanu\Hyperhtml\Doctype;
use Ubermanu\Hyperhtml\Document;
use function Ubermanu\Hyperhtml\h;

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
    public function testRenderWithDoctypeAndChildren(): void
    {
        $doctype = new Doctype();
        $doctype->setPublicId('-//W3C//DTD HTML 4.01//EN');
        $doctype->setSystemId('http://www.w3.org/TR/html4/strict.dtd');

        $document = new Document($doctype);

        $document->getHead()->setChildren([
            h('meta', ['charset' => 'utf-8']),
            h('title', 'Test')
        ]);

        $document->getBody()->appendChild(
            h('p', 'Test')
        );

        $this->assertEquals(
            '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><head><meta charset="utf-8"><title>Test</title></head><body><p>Test</p></body>',
            $document->render()
        );
    }
}
