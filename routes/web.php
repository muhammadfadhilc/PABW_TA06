<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RoadWatchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/',fn()=>Auth::check()?redirect()->route('dashboard'):redirect()->route('login'))->name('home');
Route::middleware('guest')->group(function(){
 Route::get('/register',[RegisterController::class,'create'])->name('register');
 Route::post('/register',[RegisterController::class,'store']);
 Route::get('/login',[LoginController::class,'create'])->name('login');
 Route::post('/login',[LoginController::class,'store']);
});
Route::middleware('auth')->group(function(){
 Route::post('/logout',[LoginController::class,'destroy'])->name('logout');
 Route::get('/dashboard',[RoadWatchController::class,'dashboard'])->name('dashboard');
 Route::get('/profile',[RoadWatchController::class,'profile'])->name('profile');
 Route::get('/laporan',[RoadWatchController::class,'index'])->name('laporan.index');
 Route::get('/laporan/baru',[RoadWatchController::class,'create'])->name('laporan.create');
 Route::post('/laporan',[RoadWatchController::class,'store'])->name('laporan.store');
 Route::get('/laporan/{laporan}',[RoadWatchController::class,'show'])->name('laporan.show');
 Route::get('/laporan/{laporan}/foto',[RoadWatchController::class,'photo'])->name('laporan.photo');
 Route::patch('/laporan/{laporan}/status',[RoadWatchController::class,'status'])->name('laporan.status');
});