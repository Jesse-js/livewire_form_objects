<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layout.layout')]
#[Title('Contact Us')]
class ContactUs extends Component
{
    #[Validate('required|email|max:255')]
    public ?string $email;

    #[Validate('required|min:3|max:255')]
    public ?string $subject;

    #[Validate('required|min:5|max:255')]
    public ?string $message;

    public function render()
    {
        return view('livewire.contact-us');
    }
}
