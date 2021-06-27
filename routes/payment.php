<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebhooksController;
use App\Http\Livewire\PaymentPay;
use Illuminate\Support\Facades\Route;

Route::get('{course}/checkout', PaymentPay::class)->name('checkout');

/* Route::get('{course}/pay', [PaymentController::class, 'pay'])->name('pay'); */

Route::post('webhooks', WebhooksController::class);

Route::get('{course}/pay', PaymentPay::class)->name('pay');

