
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;
use App\Http\Controllers\Admin\MessageController;

/*
|--------------------------------------------------------------------------
| Public Portfolio Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PortfolioController::class, 'home'])->name('home');

Route::get('/about', [PortfolioController::class, 'about'])->name('about');

Route::get('/skills', [PortfolioController::class, 'skills'])->name('skills');

Route::get('/projects', [PortfolioController::class, 'projects'])
    ->name('projects.index');

Route::get('/projects/{project:slug}', [PortfolioController::class, 'project'])
    ->name('projects.show');

Route::get('/certificates', [PortfolioController::class, 'certificates'])
    ->name('certificates');

Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Admin Login
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');


    // Protected Admin Routes
    Route::middleware('admin.session')->group(function () {

        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Projects Management
        Route::resource('/projects', AdminProjectController::class)
            ->except(['show']);

        // Skills Management
        Route::resource('/skills', AdminSkillController::class)
            ->except(['show']);

        // Certificates Management
        Route::resource('/certificates', AdminCertificateController::class)
            ->except(['show']);

        // Messages Management
        Route::get('/messages', [MessageController::class, 'index'])
            ->name('messages.index');

        Route::patch('/messages/{message}/read', [MessageController::class, 'markRead'])
            ->name('messages.read');

        Route::delete('/messages/{message}', [MessageController::class, 'destroy'])
            ->name('messages.destroy');
    });
});
