<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components;

use JeffersonGoncalves\LivewireWizard\Components\WizardComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\CustomStateStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\SecondStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\State\CustomState;

class WizardWithCustomStateObject extends WizardComponent
{
    public function steps(): array
    {
        return [
            CustomStateStepComponent::class,
            SecondStepComponent::class,
        ];
    }

    public function stateClass(): string
    {
        return CustomState::class;
    }
}
