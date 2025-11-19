<?php
// use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\DashboardController;
use App\Livewire\Genrrre;
use App\Livewire\Livrre;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Emprunts\EmpruntController;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\users\UserController;
use App\Http\Controllers\Genre\GenreController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Genrre;
use App\Livewire\Userss;
use App\Livewire\GestionEmprunts;
use App\Livewire\Auth\Logout;
use App\Livewire\Dashboard;
use App\Livewire\EditLivre;
use App\Livewire\EditUser;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;





Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/mot-de-passe-oublie', ForgotPassword::class)->name('password.request');





Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/reinitialiser-mot-de-passe/{token}', ResetPassword::class)->name('password.reset');




    
    Route::resource('membres', UserController::class);

    //Avec Livewire 
    Route::get('/genres',Genrrre::class)->name('genres');
    Route::get('/livres', Livrre::class)->name('livres');
    Route::get('livres/{livre}/edit', EditLivre::class)->name('edit-livre');
    Route::get('users', Userss::class)->name('users');
    Route::get('bibliophiles/{bibliophile}/edit',EditUSer::class )->name('edit-users');
    // Route::get('livres/{livre}/edit', EditLivre::class)->name('edit-livre');

    Route::get('/emprunts', GestionEmprunts::class)->name('emprunts');
    Route::post('logout',Logout::class)->name('logout');


});

Route::get('/', function () {
    return view('welcome');
});