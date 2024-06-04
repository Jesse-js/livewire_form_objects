<?php

namespace App\Livewire\Forms;

use Illuminate\Http\UploadedFile;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ContactUsForm extends Form
{
    use WithFileUploads;
    
    #[Validate('required|email|max:255', as : 'company email')]
    public ?string $email;

    #[Validate('required|min:3|max:255')]
    public ?string $subject;

    #[Validate('required|min:5|max:255')]
    public ?string $message;

    #[Validate('nullable|sometimes|file|max:1024')]
    public ?UploadedFile $image;
}
