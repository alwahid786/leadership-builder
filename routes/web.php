<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

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


Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/signup', function () {
    return view('auth.signup');
});
Route::get('/forget-password', function () {
    return view('auth.forget-password');
});
Route::get('/otp-code', function () {
    return view('auth.otp-code');
});
Route::get('/reset-password', function () {
    return view('auth.reset-password');
});

Route::post('/register', [AuthController::class, 'signupFunction'])->name('signupFunction');
Route::post('/signin', [AuthController::class, 'signinFunction'])->name('signinFunction');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/otp-verification', [AuthController::class, 'verifyOtp'])->name('verifyOtp');
Route::post('/password-reset', [AuthController::class, 'resetPassword'])->name('resetPassword');

Route::middleware('auth')->group(function () {
    // Functional Routes
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // Profile View
    Route::get('/profile', [ProfileController::class, 'profileView'])->name('profileView');
    // Profile Edit View
    Route::get('/profile-edit-view', [ProfileController::class, 'profileView'])->name('profileEditView');
    // Profile Edit
    Route::post('/profile-edit', [ProfileController::class, 'profileEdit'])->name('profileEdit');

    // Route::get('/gratitude', [ContentController::class, 'gratitudePage'])->name('gratitudePage');
    // Route::get('/wow', [ContentController::class, 'wowPage'])->name('wowPage');
    // Route::get('/desire', [ContentController::class, 'desirePage'])->name('desirePage');
    // Route::get('/see-it', [ContentController::class, 'visionPage'])->name('visionPage');
    // Route::get('/say-it', [ContentController::class, 'inspirationPage'])->name('inspirationPage');
    // Route::get('/live-it', [ContentController::class, 'executionPage'])->name('executionPage');
    // Route::get('/conclusion', [ContentController::class, 'conclusionPage'])->name('conclusionPage');
    // Route::get('/slide/{slideNumber}', [ContentController::class, 'showSlide'])->name('slide');
    // Route::get('/gratitude/con', [ContentController::class, 'gratitudeFunction'])->name('gratitudeFunction');
    // Route::get('/desire/con', [ContentController::class, 'desireFunction'])->name('desireFunction');
    // Route::get('/wow/con', [ContentController::class, 'wowFunction'])->name('wowFunction');
    // Route::get('/see-it/con', [ContentController::class, 'visionFunction'])->name('visionFunction');
    // Route::get('/say-it/con', [ContentController::class, 'inspirationFunction'])->name('inspirationFunction');
    // Route::get('/live-it/con', [ContentController::class, 'executionFunction'])->name('executionFunction');
    // Route::get('/conclusion/con', [ContentController::class, 'conclusionFunction'])->name('conclusionFunction');
    // Route::get('/create-pdf', [ContentController::class, 'createPdf'])->name('createPdf');
    // Route::get('/view-pdf', [ContentController::class, 'viewPdf'])->name('viewPdf');
    // Route::post('/validatePageCode', [ContentController::class, 'validatePageCode'])->name('validatePageCode');
    // Route::get('/page-codes', [ContentController::class, 'pageCodes'])->name('pageCodes');
    // Route::post('/updatePageCode', [ContentController::class, 'updatePageCode'])->name('updatePageCode');


    // Submit Forms
    // Route::post('/cover/submit', [ContentController::class, 'submitCover'])->name('submitCover');
    // Route::post('/gratitude/submit', [ContentController::class, 'submitGratitude'])->name('submitGratitude');
    // Route::post('/desire/submit', [ContentController::class, 'submitDesire'])->name('submitDesire');
    // Route::post('/wow/submit', [ContentController::class, 'submitWow'])->name('submitWow');
    // Route::post('/vision/submit', [ContentController::class, 'submitVision'])->name('submitVision');
    // Route::post('/inspiration/submit', [ContentController::class, 'submitInspiration'])->name('submitInspiration');
    // Route::post('/execution/submit', [ContentController::class, 'submitExecution'])->name('submitExecution');
    // Route::get('/welcome/submit', [ContentController::class, 'submitWelcome'])->name('submitWelcome');

    Route::group(['middleware' => ['auth', 'roles:admin']], function () {
        Route::get('/dashboard', function () {
            return view('pages.dashboard');
        })->name('adminDashboard');

        Route::get('/invoices', function () {
            return view('pages.invoices');
        });
        
        Route::get('/edit-plans', function () {
            return view('pages.edit-plans');
        });
        Route::get('/user-detail/{id}', [AdminController::class, 'userDetail'])->name('userDetail');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        
        Route::get('/all-questions', [AdminController::class, 'allQuestions'])->name('allQuestions');

        Route::get('/question-detail', function () {
            return view('pages.question-detail');
        });
        Route::get('/add-question-page', [AdminController::class, 'addQuestionPage'])->name('addQuestionPage');
        Route::post('/add-question', [AdminController::class, 'addQuestion'])->name('addQuestion');
        Route::get('/edit-question-page/{id}', [AdminController::class, 'editQuestionPage'])->name('editQuestionPage');
        Route::post('/edit-question', [AdminController::class, 'editQuestion'])->name('editQuestion');
        // Route::get('/daycheck/{day}', [AdminController::class, 'checkDay'])->name('checkDay');

        Route::get('/plans-and-pricing', function () {
            return view('pages.plans-and-pricing');
        });

    });

    Route::group(['middleware' => ['auth', 'roles:user']], function () {
        Route::get('/user-dashboard', [ContentController::class, 'coverPage']);
        Route::get('/cover', [ContentController::class, 'coverPage'])->name('coverPage');
        // Submit Day Response
        Route::post('/DayResponse/submit', [ContentController::class, 'submitresponse'])->name('submitresponse');
        // Past Days
        Route::get('/pastday/{day}', [ContentController::class, 'pastday'])->name('pastday');
        Route::get('/plans', [ProfileController::class, 'plans'])->name('plans');
        Route::get('/invoice', [ProfileController::class, 'invoice'])->name('invoice');
    });

    Route::get('/welcome', function () {
        return view('pages.welcome');
    });
});

// Auth::routes();
