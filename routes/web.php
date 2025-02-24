<?php

use Illuminate\Support\Facades\Route;

// 1. Oddiy marshrut
Route::get('/shahar/{nomi}', function ($nomi) {
    return "Xush kelibsiz, {$nomi}!";
})->name('shahar');

// 2. Prefiks qo‘llash
Route::prefix('admin')->group(function () {
    Route::get('/foydalanuvchilar/{id}', function ($id) {
        return "Foydalanuvchi ID: {$id}";
    })->name('admin.');
});

// 3. Marshrutlarni guruhlash
Route::prefix('profil')->group(function () {
    Route::get('/korish', function () {
        return "Profilni ko‘rish";
    })->name('profil.');

    Route::get('/tahrirlash', function () {
        return "Profilni tahrirlash";
    })->name('profil.togirlash');

    Route::get('/sozlamalar', function () {
        return "Profil sozlamalari";
    })->name('profil.');
});

// 4. Ichki yo‘nalishlar
Route::prefix('mahsulotlar')->group(function () {
    Route::get('/', function () {
        return "Barcha mahsulotlar";
    });

    Route::get('/{id}', function ($id) {
        return "Mahsulot ID: {$id}";
    });

    Route::get('/{id}/tahrirlash', function ($id) {
        return "Mahsulotni tahrirlash, ID: {$id}";
    })->name('mahsulotlar.togirlash');
});

// 5. Yo‘naltirish (Redirect)
Route::get('/eski-manzil', function () {
    return redirect('/yangi-manzil');
});


