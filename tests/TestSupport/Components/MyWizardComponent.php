<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components;

use JeffersonGoncalves\LivewireWizard\Components\WizardComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\FirstStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\FourthStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\SecondStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\ThirdStepComponent;

class MyWizardComponent extends WizardComponent
{
    public function steps(): array
    {
        return [
            FirstStepComponent::class,
            SecondStepComponent::class,
            ThirdStepComponent::class,
            FourthStepComponent::class,
        ];
    }
}
