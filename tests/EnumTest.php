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
    public function getting_label_from_constant_name(): void
    {
        self::assertSame('Inactive', ExampleEnum::getLabel(ExampleEnum::Inactive));
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function getting_label_from_custom_list(): void
    {
        self::assertSame('waiting', ExampleEnum::getLabel(ExampleEnum::OnHold));
    }

    /**
     * @test
     * @throws ReflectionException
     */
    public function getting_label_for_non_existing_value(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage('There is no value 4 defined for enum Tailflow\Enum\Tests\ExampleEnum, consider adding it in the class definition.');
        ExampleEnum::getLabel(4);
    }

    /** @test */
    public function getting_labels(): void
    {
        self::assertSame(['Inactive', 'Active', 'waiting'], ExampleEnum::getLabels());
    }

    /** @test */
    public function getting_values(): void
    {
        self::assertSame([0, 1, 3], ExampleEnum::getValues());
    }
}