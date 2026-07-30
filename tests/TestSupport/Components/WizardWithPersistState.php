<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components;

use JeffersonGoncalves\LivewireWizard\Components\WizardComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\FirstStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\SecondStepComponent;
use Livewire\Attributes\Session;

class WizardWithPersistState extends WizardComponent
{
    #[Session]
    public array $allStepState = [];

    public function steps(): array
    {
        return [
            FirstStepComponent::class,
            SecondStepComponent::class,
        ];
    }

    public function initialState(): ?array
    {
        return [
            'first-step' => [
                'order' => 123,
            ],
        ];
    }
}
