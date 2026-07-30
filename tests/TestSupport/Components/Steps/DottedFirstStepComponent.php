<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps;

use JeffersonGoncalves\LivewireWizard\Components\StepComponent;

class DottedFirstStepComponent extends StepComponent
{
    public function render()
    {
        return <<<'HTML'
        <div>dotted first step</div>
        HTML;
    }
}
