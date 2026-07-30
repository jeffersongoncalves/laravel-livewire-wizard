<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps;

use JeffersonGoncalves\LivewireWizard\Components\StepComponent;

class ThirdStepComponent extends StepComponent
{
    public function stepInfo(): array
    {
        return [
            'label' => 'Third step',
        ];
    }

    public function render()
    {
        return view('test::third-step');
    }
}
