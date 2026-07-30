<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\State;

use JeffersonGoncalves\LivewireWizard\Support\State;

class CustomState extends State
{
    public function foo(): string
    {
        return 'bar';
    }
}
