<?php

declare(strict_types=1);

namespace Tailflow\Enum\Tests;

use BadMethodCallException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class EnumTest extends TestCase
{
    /** @test
     * @throws ReflectionException
     */
    public function getting_label_from_constant_name()
    {
        self::assertSame('Inactive', ExampleEnum::getLabel(ExampleEnum::Inactive));
    }

    /** @test */
    public function getting_label_from_custom_list()
    {
        self::assertSame('waiting', ExampleEnum::getLabel(ExampleEnum::OnHold));
    }

    /** @test */
    public function getting_label_for_non_existing_value()
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectErrorMessage('There is no value 4 defined for enum Tailflow\Enum\Tests\ExampleEnum, consider adding it in the class definition.');
        ExampleEnum::getLabel(4);
    }
}