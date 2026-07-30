# Laravel Livewire Wizard

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/laravel-livewire-wizard.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/laravel-livewire-wizard)
[![Tests](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/laravel-livewire-wizard/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/jeffersongoncalves/laravel-livewire-wizard/actions/workflows/run-tests.yml)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/laravel-livewire-wizard/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/laravel-livewire-wizard/actions/workflows/fix-php-code-style-issues.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/laravel-livewire-wizard.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/laravel-livewire-wizard)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/laravel-livewire-wizard.svg?style=flat-square)](LICENSE.md)

A maintained fork of [`spatie/laravel-livewire-wizard`](https://github.com/spatie/laravel-livewire-wizard) v2, kept compatible with **Livewire 3** and **Laravel 11/12/13**. Build multi-step wizards where each step is its own Livewire component, state flows between steps automatically, and navigation is a method call away.

## Requirements

- PHP 8.2+
- Laravel 11, 12, or 13
- Livewire 3

## Installation

```bash
composer require jeffersongoncalves/laravel-livewire-wizard
```

## Usage

### 1. Create the wizard component

```php
namespace App\Livewire;

use JeffersonGoncalves\LivewireWizard\Components\WizardComponent;

class CheckoutWizardComponent extends WizardComponent
{
    public function steps(): array
    {
        return [
            CartStepComponent::class,
            DeliveryAddressStepComponent::class,
            ConfirmOrderStepComponent::class,
        ];
    }
}
```

### 2. Create each step

Each step is a regular Livewire component that extends `StepComponent`:

```php
namespace App\Livewire;

use JeffersonGoncalves\LivewireWizard\Components\StepComponent;

class CartStepComponent extends StepComponent
{
    public function render()
    {
        return view('checkout-wizard.steps.cart');
    }
}
```

### 3. Register the components

```php
use Livewire\Livewire;

Livewire::component('checkout-wizard', CheckoutWizardComponent::class);
Livewire::component('cart-step', CartStepComponent::class);
Livewire::component('delivery-address-step', DeliveryAddressStepComponent::class);
Livewire::component('confirm-order-step', ConfirmOrderStepComponent::class);
```

### 4. Render the wizard

```blade
<livewire:checkout-wizard />
```

### 5. Navigate between steps

From inside any step component:

```php
$this->nextStep();
$this->previousStep();
```

Or directly in a view:

```blade
<div wire:click="previousStep">Back</div>
<div wire:click="nextStep">Next</div>
```

State set via public properties on one step is automatically available on the next. See the original [Spatie docs](https://github.com/spatie/laravel-livewire-wizard/tree/2.4.3/docs) for the full guide on initial state, custom state objects, and testing wizards — the v2/Livewire 3 API this package tracks is unchanged.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Security

If you discover any security-related issues, please email gerson.simao.92@gmail.com instead of using the issue tracker.

## Credits

- [Jefferson Gonçalves](https://github.com/jeffersongoncalves)
- Originally created by [Freek Van der Herten](https://github.com/freekmurze) and [Rias Van der Veken](https://github.com/riasvdv) at [Spatie](https://spatie.be)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
