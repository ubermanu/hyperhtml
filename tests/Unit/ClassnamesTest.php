<?php

namespace Ubermanu\Hyperhtml\Tests\Unit;

use function Ubermanu\Hyperhtml\classnames;

class ClassnamesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers
     * @param array $classNames
     * @param string $expected
     * @return void
     * @dataProvider functionDataProvider
     */
    public function testFunction(array $classNames, string $expected): void
    {
        $this->assertEquals($expected, classnames(...$classNames));
    }

    /**
     * @return array[]
     */
    protected function functionDataProvider(): array
    {
        return [
            [
                'classNames' => ['test', 'test2'],
                'expected' => 'test test2',
            ],
            [
                'classNames' => ['test', ['test2' => true]],
                'expected' => 'test test2',
            ],
            [
                'classNames' => ['test', ['test2' => false]],
                'expected' => 'test',
            ],
            [
                'classNames' => ['test', ['test2' => true], 'test2'],
                'expected' => 'test test2',
            ],
        ];
    }
}
