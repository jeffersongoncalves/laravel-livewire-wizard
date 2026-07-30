<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components;

use JeffersonGoncalves\LivewireWizard\Components\WizardComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\InvalidStepComponent;

class WizardWithInvalidStepComponent extends WizardComponent
{
    public function steps(): array
    {
        return [
            InvalidStepComponent::class,
        ];
    }
}
