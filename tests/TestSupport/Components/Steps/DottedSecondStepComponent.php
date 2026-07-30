<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps;

use JeffersonGoncalves\LivewireWizard\Components\StepComponent;

class DottedSecondStepComponent extends StepComponent
{
    public function render()
    {
        return <<<'HTML'
        <div>dotted second step</div>
        HTML;
    }
}
