<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', [TicketController::class, 'form'])->name('contact.form');

Route::post('/contact', [TicketController::class, 'submit'])->name('contact.submit');