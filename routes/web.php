<?php

use App\Http\Livewire\AddDeliveryCompanyComponent;
use App\Http\Livewire\AddDeliveryComponent;
use App\Http\Livewire\AddOrderCheckoutComponent;
use App\Http\Livewire\AllDeliveryComponent;
use App\Http\Livewire\DeliveryCompanyComponent;
use App\Http\Livewire\EditDeliveryCompanyComponent;
use App\Http\Livewire\EditDeliveryComponent;
use App\Http\Livewire\EditProfileComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\OrderPrintComponent;
use App\Http\Livewire\OrdersComponent;
use App\Http\Livewire\ProfileComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('home');

Route::get('/orders', OrdersComponent::class)->name('orders');
Route::get('/orders/order-print/{date}', OrderPrintComponent::class)->name('orderprint');
Route::get('/addorder-checkout', AddOrderCheckoutComponent::class)->name('add-order');

Route::get('/all-deliveries', AllDeliveryComponent::class)->name('all-deliveries');
Route::get('/add-delivery', AddDeliveryComponent::class)->name('add-delivery');
Route::get('/all-deliveries/edit/{delivery_id}', EditDeliveryComponent::class)->name('edit-delivery');

Route::get('/delivery-companies', DeliveryCompanyComponent::class)->name('delivery-company');
Route::get('/delivery-companies/add', AddDeliveryCompanyComponent::class)->name('add-company');
Route::get('/delivery-company/edit/{company_type_id}', EditDeliveryCompanyComponent::class)->name('edit-company');

Route::get('/profile', ProfileComponent::class)->name('profile');
Route::get('/profile/edit-profile', EditProfileComponent::class)->name('edit-profile');


// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// For User
Route::middleware(['auth:sanctum', 'verified'])->group(function (){

});

//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function (){

});
