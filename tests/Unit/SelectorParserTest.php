<?php

namespace Ubermanu\PhpElements\Tests\Unit;

use Ubermanu\PhpElements\SelectorParser;

class SelectorParserTest extends \PHPUnit\Framework\TestCase
{
    protected SelectorParser $parser;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->parser = new SelectorParser();
    }

    /**
     * @covers
     * @param string $selector
     * @param array $expected
     * @return void
     * @dataProvider parseDataProvider
     */
    public function testParse(string $selector, array $expected): void
    {
        $this->assertEquals($expected, $this->parser->parse($selector));
    }

    /**
     * @return array[]
     */
    public function parseDataProvider(): array
    {
        return [
            [
                'div',
                [
                    'tag' => 'div',
                    'id' => '',
                    'classes' => [],
                    'attributes' => [],
                ],
            ],
            [
                'p.test',
                [
                    'tag' => 'p',
                    'id' => '',
                    'classes' => ['test'],
                    'attributes' => [],
                ],
            ],
            [
                'p.test.test2',
                [
                    'tag' => 'p',
                    'id' => '',
                    'classes' => ['test', 'test2'],
                    'attributes' => [],
                ],
            ],
            [
                'p#test',
                [
                    'tag' => 'p',
                    'id' => 'test',
                    'classes' => [],
                    'attributes' => [],
                ],
            ],
            [
                'p#test.test',
                [
                    'tag' => 'p',
                    'id' => 'test',
                    'classes' => ['test'],
                    'attributes' => [],
                ],
            ],
            [
                'p#test.test.test2',
                [
                    'tag' => 'p',
                    'id' => 'test',
                    'classes' => ['test', 'test2'],
                    'attributes' => [],
                ],
            ],
            [
                'p.test#test',
                [
                    'tag' => 'p',
                    'id' => 'test',
                    'classes' => ['test'],
                    'attributes' => [],
                ],
            ],
            [
                'p.test.test2#test',
                [
                    'tag' => 'p',
                    'id' => 'test',
                    'classes' => ['test', 'test2'],
                    'attributes' => [],
                ],
            ],
            [
                'p.test.test2#test.test3',
                [
                    'tag' => 'p',
                    'id' => 'test',
                    'classes' => ['test', 'test2', 'test3'],
                    'attributes' => [],
                ],
            ],
            [
                'p.test.test2#test.test3.test4',
                [
                    'tag' => 'p',
                    'id' => 'test',
                    'classes' => ['test', 'test2', 'test3', 'test4'],
                    'attributes' => [],
                ],
            ],
            [
                'p.test.test2#test.test3.test4.test5',
                [
                    'tag' => 'p',
                    'id' => 'test',
                    'classes' => ['test', 'test2', 'test3', 'test4', 'test5'],
                    'attributes' => [],
                ],
            ],
        ];
    }
}
