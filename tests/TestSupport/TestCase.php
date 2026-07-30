<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport;

use DOMDocument;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use JeffersonGoncalves\LivewireWizard\Components\WizardComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\CustomStateStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\FirstStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\FourthStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\SecondStepComponent;
use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Components\Steps\ThirdStepComponent;
use JeffersonGoncalves\LivewireWizard\WizardServiceProvider;
use Livewire\Features\SupportTesting\Testable;
use Livewire\Livewire;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\CollectionMacros\CollectionMacroServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('app.key', '6rE9Nz59bGRbeMATftriyQjrpF7DcOQm');

        View::addNamespace('test', __DIR__.'/resources/views');

        $this
            ->registerLivewireComponents()
            ->registerLivewireTestMacros();
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            WizardServiceProvider::class,
            CollectionMacroServiceProvider::class,
        ];
    }

    private function registerLivewireComponents(): self
    {
        Livewire::component('wizard', WizardComponent::class);
        Livewire::component('first-step', FirstStepComponent::class);
        Livewire::component('second-step', SecondStepComponent::class);
        Livewire::component('third-step', ThirdStepComponent::class);
        Livewire::component('fourth-step', FourthStepComponent::class);
        Livewire::component('custom-state-step', CustomStateStepComponent::class);

        return $this;
    }

    public function registerLivewireTestMacros(): self
    {
        Testable::macro('jsonContent', function (string $elementId) {
            $document = new DOMDocument;

            $document->loadHTML($this->lastState->getHtml());

            $content = $document->getElementById($elementId)->textContent;

            return json_decode($content, true);
        });

        Testable::macro('htmlContent', function (string $elementId) {
            $document = new DOMDocument;

            $document->preserveWhiteSpace = false;

            $document->loadHTML($this->lastState->getHtml());

            $domNode = $document->getElementById($elementId);

            return Str::of($document->saveHTML($domNode))
                ->replace("\n", "\r\n")
                ->trim()
                ->toString();
        });

        return $this;
    }
}
