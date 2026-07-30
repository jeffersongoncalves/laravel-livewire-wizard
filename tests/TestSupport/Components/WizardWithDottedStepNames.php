<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components;

use JeffersonGoncalves\LivewireWizard\Components\WizardComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\DottedFirstStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\DottedSecondStepComponent;

class WizardWithDottedStepNames extends WizardComponent
{
    public function steps(): array
    {
        return [
            DottedFirstStepComponent::class,
            DottedSecondStepComponent::class,
        ];
    }
}
