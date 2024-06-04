<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactUsForm;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

#[Layout('layout.layout')]
#[Title('Contact Us')]
class ContactUs extends Component
{

    use WithFileUploads;
    public ContactUsForm $contactUsForm;


    public function submitForm(): void
    {
        $validated = $this->contactUsForm->validate();


        try {
            if ($this->contactUsForm->image) {
                $validated['image'] = $this->contactUsForm->image->store('uploads', 'public');
            }
            Contact::create($validated);
            session()->flash('success', 'Your message has been sent.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Your message could not be sent. Please try again.');
            return;
        }

        //$this->contactUsForm->reset();
    }

    //lifecycle hooks
    public function mount(): void
    {
        dump('mounted');
    }

    public function boot(): void
    {
        dump('booted');
    }

    public function rendering(): void
    {
        dump('rendering');
    }

    public function rendered(): void
    {
        dump('rendered');
    }

    public function hydrate(): void
    {
        dump('hydrated');
    }

    public function dehydrate(): void
    {
        dump('dehydrated');
    }

    public function updating($property, $value): void
    {
        dump("updating {$property} to {$value}");
    }

    public function updated($property): void
    {
        dump("updated {$property}");
    }

    public function render(): View
    {
        return view('livewire.contact-us');
    }
}
