# Changelog

All notable changes to `laravel-livewire-wizard` will be documented in this file.

## 1.1.0 - 2026-07-31

### Security fix

`allStepsState`, `allStepNames`, `wizardClassName`, `stateClassName` (StepComponent) and `allStepState`, `currentStepName` (WizardComponent) were public Livewire properties without `#[Locked]`. A client could rewrite other steps' committed data (e.g. via `$wire.set('allStepsState.step.field', value)`) before final submission, bypassing per-step validation.

Fixed by adding `#[Locked]` to these properties, blocking client-side writes while preserving normal server-side mount/hydrate behavior.

## 1.0.1 - 2026-07-30

CI hardening: pin all GitHub Actions to commit SHA instead of mutable version tags, to prevent supply-chain attacks from a re-pointed tag.

## 1.0.0 - 2026-07-30

Initial release: maintained fork of spatie/laravel-livewire-wizard (based on v2.4.3), kept compatible with Livewire 3 and Laravel 11/12/13.

**Full Changelog**: https://github.com/jeffersongoncalves/laravel-livewire-wizard/commits/1.0.0
