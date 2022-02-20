<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

Route::controller(RouteController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::get("/donate", "donate")->name("donate");
    Route::get("/login", "login")->name("login");

    Route::group(['prefix'=>"profile"], function() {
        Route::get("/", "profile")->name("profile");

    });

    Route::group(['prefix'=>"admin"], function() {
        Route::get("/", "admin")->name("admin");
        Route::get("/admins", "admins");
        Route::get("/promocode", "promocode");
        Route::get("/update", "update");
    });
});

Route::controller(ProfileController::class)->group(function () {
    Route::post("/loggins", "loggins")->name("loggins");
    Route::post('/adminauth', "adminauth")->name("adminauth");
    Route::get("/logout", "logout")->name("logout");
});

Route::controller(AdminController::class)->group(function (){
    Route::post("/updateaccount","update")->name('update');
});

