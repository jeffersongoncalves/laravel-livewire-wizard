<?php

namespace JeffersonGoncalves\LivewireWizard;

use JeffersonGoncalves\LivewireWizard\Support\EventEmitter;
use JeffersonGoncalves\LivewireWizard\Support\StepSynth;
use Livewire\Component;
use Livewire\Features\SupportTesting\Testable;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WizardServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-livewire-wizard')
            ->hasViews();
    }

    public function bootingPackage()
    {
        Livewire::propertySynthesizer(StepSynth::class);
        $this->registerLivewireTestMacros();
    }

    public function registerLivewireTestMacros()
    {
        Component::macro('testStep', function (string $stepClass, array $state = []) {
            $wizardComponent = Livewire::test(static::class, ['initialState' => $state]);
            $wizard = $wizardComponent->invade();
            $wizard->mountMountsWizard($stepClass, $state);

            return Livewire::test($stepClass, $wizard->getCurrentStepState($stepClass))
                ->emitEvents()->in($wizardComponent);
        });

        Testable::macro('emitEvents', function () {
            return new EventEmitter($this);
        });

        Testable::macro('getStepState', function (?string $step = null) {
            return $this->instance()->getCurrentStepState($step);
        });
    }
}
