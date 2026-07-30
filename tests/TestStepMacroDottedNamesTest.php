<?php

use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\DottedFirstStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\DottedSecondStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\WizardWithDottedStepNames;
use Livewire\Livewire;

beforeEach(function () {
    Livewire::component('app.wizard.steps.dotted-first-step', DottedFirstStepComponent::class);
    Livewire::component('app.wizard.steps.dotted-second-step', DottedSecondStepComponent::class);
    Livewire::component('app.wizard.dotted-wizard', WizardWithDottedStepNames::class);
});

it('can test a step with dotted component names', function () {
    WizardWithDottedStepNames::testStep(DottedFirstStepComponent::class)
        ->assertSee('dotted first step');
});

it('can test a step with dotted component names and initial state', function () {
    WizardWithDottedStepNames::testStep(DottedSecondStepComponent::class, [
        'app.wizard.steps.dotted-first-step' => [
            'foo' => 'bar',
        ],
    ])
        ->assertSee('dotted second step');
});
