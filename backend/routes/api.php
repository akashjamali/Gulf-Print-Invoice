<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/invoices', [InvoiceController::class, 'index']);
Route::get('/invoice/next-number', [InvoiceController::class, 'getNextInvoiceNo']);
Route::post('/invoice/generate', [InvoiceController::class, 'generate']);
Route::get('/invoice/{id}/download', [InvoiceController::class, 'download']);
