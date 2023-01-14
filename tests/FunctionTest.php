<?php
use PHPUnit\Framework\TestCase;

final class FunctionTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected): void
    {
        $this->assertSame($expected, add($a, $b));
    }

    public function additionProvider(): array
    {
        return [
            [2, 3, 5],
            [2, 3., 5.],
            [2., '3', 5.],
            ['2', 3, 5]
        ];
    }

    /**
     * @dataProvider invalidAdditionProvider
     */
    public function testInvalidInput($a, $b, $expected): void
    {
        $this->expectException(InvalidArgumentException::class);

        add($a, $b);
    }

    public function invalidAdditionProvider(): array
    {
        return [
            [1, 'invalid', null],
            ['invalid', 1, null],
            ['invalid', 'invalid', null]
        ];
    }

    /**
     * @dataProvider additionArrayProvider
     */
    function testAddAll($items, $expected): void
    {
        $this->assertSame($expected, addAll(...$items));
    }

    public function additionArrayProvider(): array
    {
        return [
            [[1, 2, 3, 4], 10],
            [[3, 5, 7, 9], 24],
            [[1., 1, 1, 1], 4.]
        ];
    }
}