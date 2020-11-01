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
    public static function labels(): array
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
}