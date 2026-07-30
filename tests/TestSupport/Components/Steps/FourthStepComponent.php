<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps;

use JeffersonGoncalves\LivewireWizard\Components\StepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Enums\LikesCoffeeEnum;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Forms\UserDataForm;

class FourthStepComponent extends StepComponent
{
    public UserDataForm $form;

    public ?LikesCoffeeEnum $likesCoffee = null;

    public function stepInfo(): array
    {
        return [
            'label' => 'Forth step',
        ];
    }

    public function render()
    {
        return view('test::fourth-step');
    }
}
