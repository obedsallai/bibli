<?php
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardContoller;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth')->group(function(){
//     Route::get('/login',[AuthController::classs, 'showLogin'])->name('login');
//     Route::post('/login',[AuthController::classs, 'login']);

//     Route::post('logout', [AuthController::classs,'logout'])->name('logout');
//     Route::get('/register',[AuthController::classs, 'showRegister'])->name('register');
//     Route::post('/register',[AuthController::classs, 'register']);
// });

// Route::middleware('auth')->group(function(){
//     Route::get('/dashboard', [DashboardContoller::class, ])
// })


// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});