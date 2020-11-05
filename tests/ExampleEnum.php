<?php

declare(strict_types=1);

namespace Tailflow\Enum\Tests;

use Tailflow\Enum\Enum;

final class ExampleEnum extends Enum
{
    public const Inactive = 0;
    public const Active = 1;
    public const OnHold = 3;

    protected static function labels(): array
    {
        return [
            self::OnHold => 'waiting'
        ];
    }
}