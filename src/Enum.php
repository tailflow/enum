<?php

declare(strict_types=1);

namespace Tailflow\Enum;

use BadMethodCallException;
use ReflectionClass;
use ReflectionException;

abstract class Enum
{
    /**
     * @return string[]
     */
    protected static function labels(): array
    {
        return [];
    }

    /**
     * @param string|int $value
     * @return string
     * @throws ReflectionException
     */
    public static function getLabel($value): string
    {
        $enumClass = static::class;

        if (array_key_exists($value, static::labels())) {
            return static::labels()[$value];
        }

        $reflectionClass = new ReflectionClass($enumClass);
        $constants = $reflectionClass->getConstants();

        foreach ($constants as $constantName => $constantValue) {
            if ($value === $constantValue) {
                return $constantName;
            }
        }

        throw new BadMethodCallException("There is no value {$value} defined for enum {$enumClass}, consider adding it in the class definition.");
    }

    public static function getLabels(): array
    {
        $reflectionClass = new ReflectionClass(static::class);
        $constants = $reflectionClass->getConstants();

        $labels = array_keys($constants);

        return array_map(function (string $label) use ($constants) {
            $value = $constants[$label];

            if (array_key_exists($value, static::labels())) {
                return static::labels()[$value];
            }

            return $label;
        }, $labels);
    }

    public static function getValues(): array
    {
        $reflectionClass = new ReflectionClass(static::class);
        $constants = $reflectionClass->getConstants();

        return array_values($constants);
    }

}