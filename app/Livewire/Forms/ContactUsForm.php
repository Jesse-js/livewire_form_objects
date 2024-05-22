<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactUsForm extends Form
{
    #[Validate('required|email|max:255')]
    public ?string $email;

    #[Validate('required|min:3|max:255')]
    public ?string $subject;

    #[Validate('required|min:5|max:255')]
    public ?string $message;
}
