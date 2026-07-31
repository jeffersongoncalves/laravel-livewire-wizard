<?php

namespace JeffersonGoncalves\LivewireWizard\Components;

use JeffersonGoncalves\LivewireWizard\Components\Concerns\StepAware;
use JeffersonGoncalves\LivewireWizard\Support\ComponentHydrator;
use JeffersonGoncalves\LivewireWizard\Support\State;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\Mechanisms\ComponentRegistry;

abstract class StepComponent extends Component
{
    use StepAware;

    #[Locked]
    public ?string $wizardClassName = null;

    #[Locked]
    public array $allStepNames = [];

    #[Locked]
    public array $allStepsState = [];

    /** @var class-string<State> */
    #[Locked]
    public string $stateClassName = State::class;

    public function dispatchDehydrated($event, ...$params)
    {
        $hydrator = app(ComponentHydrator::class);
        $newParams = collect($params)->map(fn ($param) => $hydrator->dehydrateData($this, $param))->toArray();

        return parent::dispatch($event, ...$newParams);
    }

    public function previousStep()
    {
        $this->dispatchDehydrated('previousStep', $this->state()->currentStep())->to($this->wizardClassName);
    }

    public function nextStep()
    {
        $this->dispatchDehydrated('nextStep', $this->state()->currentStep())->to($this->wizardClassName);
    }

    public function showStep(string $stepName)
    {
        $this->dispatchDehydrated('showStep', toStepName: $stepName, currentStepState: $this->state()->currentStep())->to($this->wizardClassName);
    }

    public function hasPreviousStep()
    {
        return ! empty($this->allStepNames) && $this->allStepNames[0] !== app(ComponentRegistry::class)->getName(static::class);
    }

    public function hasNextStep()
    {
        return end($this->allStepNames) !== app(ComponentRegistry::class)->getName(static::class);
    }

    public function stepInfo(): array
    {
        return [];
    }

    public function state(): State
    {
        /** @var State $stateClass */
        $stateClass = new $this->stateClassName;

        $stepName = app(ComponentRegistry::class)->getName(static::class);

        $allState = array_merge(
            $this->allStepsState,
            [$stepName => $this->all()]
        );

        $stateClass
            ->setAllState($allState)
            ->setCurrentStepName($stepName);

        return $stateClass;
    }
}
