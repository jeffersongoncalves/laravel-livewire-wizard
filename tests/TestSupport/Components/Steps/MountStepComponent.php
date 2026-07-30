<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps;

use JeffersonGoncalves\LivewireWizard\Components\StepComponent;

class MountStepComponent extends StepComponent
{
    public function render()
    {
        return view('test::mount-step');
    }
}
