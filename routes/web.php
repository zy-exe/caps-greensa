<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\checkout;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Admin
    Route::post('/admin-logout', [AdminController::class, 'logout']);
    Route::post('/admin-login', [AdminController::class, 'login']);

    Route::get('/admin-login', [AdminController::class, 'showlogin']);
    Route::get('/admin', [AdminController::class, 'showadmin'])->middleware('adminmustlogin');
   
    Route::get('/admin-training-center-list', [AdminController::class, 'showtrlist'])->name('train.showlist')->middleware('adminmustlogin');
    Route::get('/admin-user-list', [AdminController::class, 'showuserlist'])->middleware('adminmustlogin');
    
    Route::get('/admin-training-center-history-order', [AdminController::class, 'showhistory'])->middleware('adminmustlogin');
    Route::get('/admin-training-center-order-spj', [AdminController::class, 'showorderspj'])->middleware('adminmustlogin');
    Route::get('/admin-training-center-order-reguler', [AdminController::class, 'showorderreguler'])->middleware('adminmustlogin');
    Route::post('/admin/order/{orderId}/acc', [AdminController::class, 'accOrder'])->name('admin.order.acc');
    Route::post('/admin/order/{orderId}/reject', [AdminController::class, 'rejectOrder'])->name('admin.order.reject');
    Route::post('/admin/orders/delete', [AdminController::class, 'deleteSelectedOrders'])->name('admin.orders.delete');
    Route::post('/admin/order/{orderId}/update-status', [AdminController::class, 'updateOrderStatus'])->name('admin.order.updateStatus');

    // user list
    Route::post('/admin-user-list-delete/{id}', [AdminController::class, 'userdelete'])->name('user.delete')->middleware('adminmustlogin');
    // crud TC list
    Route::get('/admin-training-center-store', [AdminController::class, 'showtcstore'])->middleware('adminmustlogin');
    Route::post('/admin-training-center-store', [AdminController::class, 'tcstore'])->name('train.store')->middleware('adminmustlogin');
    Route::get('/admin-training-center-edit-{id}', [AdminController::class, 'showtcedit'])->name('train.showedit')->middleware('adminmustlogin');
    Route::put('/admin-training-center-edit/{id}', [AdminController::class, 'tcedit'])->name('train.edit')->middleware('adminmustlogin');
    Route::post('/admin-training-center-delete/{id}', [AdminController::class, 'tcdelete'])->name('train.delete')->middleware('adminmustlogin');
// Admin



// Guest
    Route::get('/', [GuestController::class, 'showhome'])->name('home');
    Route::get('/hotel', [GuestController::class, 'showhotel']);
    Route::get('/training-center', [GuestController::class, 'showtrain']);
    Route::get('/about', [GuestController::class, 'showabout']);
    // Route::get('/package', [GuestController::class, 'showpackage']);
    Route::get('/detail/{id}', [GuestController::class, 'showdetail_tc'])->name('train.detail');

    Route::get('/cart', [GuestController::class, 'showcart'])->middleware('guestmustlogin');
    Route::post('/add-to-cart', [GuestController::class, 'addToCart'])->middleware('guestmustlogin');
    Route::post('/reservasi', [GuestController::class, 'reservasiLangsung'])->middleware('guestmustlogin');
    Route::post('/cart-item-delete/{id}', [GuestController::class, 'cartItemDelete'])->middleware('guestmustlogin');

    Route::post('/checkout', [GuestController::class, 'showcheckout'])->middleware('guestmustlogin');
    Route::post('/checkout-komplimen/{id}', [GuestController::class, 'checkoutKomplimen'])->middleware('guestmustlogin');
    Route::post('/checkout-reguler/{id}', [GuestController::class, 'checkoutReguler'])->middleware('guestmustlogin');
    Route::post('/checkout-komplimen-langsung', [GuestController::class, 'checkoutKomplimenLangsung'])->middleware('guestmustlogin');
    Route::post('/checkout-reguler-langsung', [GuestController::class, 'checkoutRegulerLangsung'])->middleware('guestmustlogin');
    
    Route::get('/order', [GuestController::class, 'showorder'])->middleware('guestmustlogin');
    Route::get('/delete-order/{id}', [GuestController::class, 'deleteorder'])->middleware('guestmustlogin');
    Route::get('/invoice-show/{id}', [GuestController::class, 'invoiceShow'])->middleware('guestmustlogin');
    Route::get('/invoice-download/{id}', [GuestController::class, 'invoiceDownload'])->middleware('guestmustlogin');
    Route::get('/payment/{id}', [GuestController::class, 'showPayment'])->middleware('guestmustlogin')->name('showPayment');
    Route::get('/payment-failed/{id}', [GuestController::class, 'showPaymentFailed'])->middleware('guestmustlogin');
    Route::post('/payment/kirim', [GuestController::class, 'kirimPayment'])->middleware('guestmustlogin');

    Route::get('/profile', [GuestController::class, 'showprofile'])->middleware('guestmustlogin');
    Route::put('/profile/update/{id}', [GuestController::class, 'updateprofile'])->name('profile.update')->middleware('guestmustlogin');

    Route::get('/change-password', [GuestController::class, 'showchangepw'])->middleware('guestmustlogin');
    Route::post('/profile/change-password', [GuestController::class, 'changePassword'])->name('profile.change-password')->middleware('guestmustlogin');

    Route::get('/login', [GuestController::class, 'showlogin'])->middleware('guestnotlogin');
    Route::get('/register', [GuestController::class, 'showregister'])->middleware('guestnotlogin');

    Route::post('/training-center', [GuestController::class, 'search']);
    Route::post('/guestlogin', [GuestController::class, 'login']);
    Route::post('/guestregister', [GuestController::class, 'register']);
    Route::post('/guestlogout', [GuestController::class, 'logout']);

    Route::get('/forgot-password', [GuestController::class, 'showforgotpw']);
    Route::post('/forgot-password', [GuestController::class, 'forgetpassword'])->name('forget.password.post');
    Route::get('/Reset-password/{token}', [GuestController::class, 'showResetPW'])->name('reset.password');
    Route::post('/Reset-password', [GuestController::class, 'resetpassword'])->name('reset.password.post');
    
// Guest

// Email Verification
    Route::get('/email/verify', function () {
        return view('pelanggan.auth.verify');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [GuestController::class, 'registerVerified'])->name('verification.verify');
// EmailVerification