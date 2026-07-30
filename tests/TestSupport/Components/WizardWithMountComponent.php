<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components;

use JeffersonGoncalves\LivewireWizard\Components\WizardComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\MountStepComponent;

class WizardWithMountComponent extends WizardComponent
{
    public int $counter;

    public function mount(int $counter): void
    {
        $this->counter = $counter;
    }

    public function steps(): array
    {
        return [
            MountStepComponent::class,
        ];
    }
}
