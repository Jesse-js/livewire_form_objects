<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactUsForm;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layout.layout')]
#[Title('Contact Us')]
class ContactUs extends Component
{

    public ContactUsForm $contactUsForm;

    public function submitForm(): void
    {
        $this->validate();
        try {
            Contact::create($this->contactUsForm->toArray());
            session()->flash('success', 'Your message has been sent.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Your message could not be sent. Please try again.');
            return;
        }

        $this->contactUsForm->reset();
    }

    public function render(): View
    {
        return view('livewire.contact-us');
    }
}
