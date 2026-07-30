<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components;

use JeffersonGoncalves\LivewireWizard\Components\WizardComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\FirstStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\SecondStepComponent;

class WizardWithInvalidCustomStateObject extends WizardComponent
{
    public function steps(): array
    {
        return [
            FirstStepComponent::class,
            SecondStepComponent::class,
        ];
    }

    public function stateClass(): string
    {
        return static::class;
    }
}
