<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LogoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact-form', [ContactController::class, 'showContactForm'])->name('contact.create');
Route::post('/contact-form-store', [ContactController::class, 'submitContactForm'])->name('contact.submit');

Route::get('/logout', [LogoutController::class, 'perForm'])->name('logout.perForm')->middleware('auth');
