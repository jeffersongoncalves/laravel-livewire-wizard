<?php

namespace JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Forms;

use JeffersonGoncalves\LivewireWizard\Tests\TestSupport\Enums\LikesCoffeeEnum;
use Livewire\Form;

class UserDataForm extends Form
{
    public string $name = '';

    public string $email = '';

    public ?LikesCoffeeEnum $likes_coffee = LikesCoffeeEnum::No;
}
