<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactUsForm;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layout.layout')]
#[Title('Contact Us')]
class ContactUs extends Component
{

    public ContactUsForm $contactUsForm;

    public function submitForm(): void
    {
        $this->validate();

        Contact::create($this->contactUsForm->toArray());
        
        session()->flash('success', 'Your message has been sent.');

        $this->reset();
    }
    public function render(): View
    {
        return view('livewire.contact-us');
    }
}
