<?php

use App\Livewire\ContactUs;
use Illuminate\Support\Facades\Route;

Route::get('/contact-us', ContactUs::class)->name('contact-us');