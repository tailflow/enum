<p align="center">
<a href="https://travis-ci.org/tailflow/enum"><img src="https://travis-ci.org/tailflow/enum.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/tailflow/enum"><img src="https://poser.pugx.org/tailflow/enum/version" alt="Stable Release"></a>
<a href="https://packagist.org/packages/tailflow/enum"><img src="https://poser.pugx.org/tailflow/enum/license" alt="Stable Release"></a>
</p>

## Introduction

The package offers strongly typed enums in PHP. In this package, enums are always objects, never constant values on their own. This allows for proper static analysis and refactoring in IDEs.

## Installation

You can install the package via composer:

```bash
composer require tailflow/enum
```

## Usage

Here is how enums are defined:

```php
use Tailflow\Enum\Enum;

class Status extends Enum
{
    public const Inactive = 0;
    public const Active = 1;
    public const OnHold = 3;
}
```

This is how they are used:

```php
$class->setStatus(Status::Inactive);
```

### Enum Labels

By default, enum labels are derived from the constant names. To get enum label, you can use `::getLabel` method on enum class:

```php
// $label will be equal to "OnHold" - the name of the constant
$label = Status::getLabel(Status::OnHold); 
```

Optionally, you can provide a different label for any given enum value:

```php
use Tailflow\Enum\Enum;

class Status extends Enum
{
    public const Inactive = 0;
    public const Active = 1;
    public const OnHold = 3;

    public static function labels(): array
    {
        return [
            self::OnHold => 'waiting'
        ];
    }
}

// $label will be equal to "waiting" - the custom label defined in "labels" method
$label = Status::getLabel(Status::OnHold); 
```

## License

The Laravel Orion is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
