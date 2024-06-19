<?php

use App\Http\Controllers\RankController;
use App\Http\Controllers\ApplicantsDataController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApprovedApplicantsDataController;
use App\Http\Controllers\RecentActivityController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::middleware(['guest'])->group(function () {

    Route::get('/', [homepageController::class, 'HomePage'])->name('HomePage');
    Route::get('/login', function () {
        $user = User::all();
        return view('login')->with('user', $user);
    })->name('login');

    Route::post('/fogotpassword', [UserController::class, 'fogotpassword'])->name('fogotpassword');
    Route::get('/ApplicationForm', [ApplicationFormController::class, 'index'])->name('ApplicationForm');
    Route::get('/refRanks', [ApplicationFormController::class, 'refRanks']);
    Route::post('/ApplicationForm', [ApplicationFormController::class, 'store'])->name('ApplicationForm');
    Route::post('login/check', [UserController::class, 'postLogin'])->name('postLogin');

});

Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgetPasswordManager::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost'])->name('reset.password.post');

Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('welcome', [UserController::class, 'welcome'])->name('welcome');

    Route::get('/addapplicant', [ApplicantController::class, 'index'])->name('addapplicant');
    Route::get('/ApplicantsData', [ApplicantsDataController::class, 'index'])->name('ApplicantsData');
    Route::post('/addapplicant', [UserController::class, 'adduser'])->name('adduser');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/update-profile/{id}', [ProfileController::class, 'update']);
    Route::put('/change-password/{id}', [ProfileController::class, 'updatePassword']);
    Route::get('/AdminUser', [UserController::class, 'index'])->name('AdminUser')->middleware('admin');
    Route::put('/update-user/{id}', [UserController::class, 'update'])->name('update');
    Route::put('/update-password/{id}', [UserController::class, 'updatePassword'])->name('updatePassword');
    Route::post('/adminUser', [UserController::class, 'show'])->name('adminUser');
    Route::post('/applicantsData', [ApplicantsDataController::class, 'show'])->name('applicantsData');
    Route::put('/approvedApplicant/{id}', [ApplicantsDataController::class, 'update'])->name('update');
    Route::post('/move-data', [ApplicantsDataController::class, 'moveData'])->name('moveData');
    Route::get('/ApprovedApplicants', [ApprovedApplicantsDataController::class, 'index'])->name('ApprovedApplicants');
    Route::post('/approvedApplicants', [ApprovedApplicantsDataController::class, 'show'])->name('approvedApplicants');
    Route::put('/sharp/{id}', [ApprovedApplicantsDataController::class, 'sharp'])->name('sharp');

    Route::get('/applicantDashboard', [ApprovedApplicantsDataController::class, 'CoundData'])->name('index');
    Route::get('/PrintApplicant', [ApprovedApplicantsDataController::class, 'showData'])->name('data.show');
    Route::get('/print-applicant/{id}', [ApprovedApplicantsDataController::class, 'PrintApplicant'])->name('print.applicant');

    Route::get('/recent-activity', [RecentActivityController::class, 'index'])->name('index');
    Route::post('/recentActivity', [RecentActivityController::class, 'show'])->name('recentActivity');
    Route::get('/side-nav', [RecentActivityController::class, 'showSideNav'])->name('showSideNav');
    Route::get('/activity-logs', [RecentActivityController::class, 'indexLogs'])->name('activity-logs')->middleware('AdminLogs');
    Route::post('/activityLogs', [RecentActivityController::class, 'showLogs'])->name('activityLogs');
    Route::get('/side_nav', [RecentActivityController::class, 'showSideNav'])->name('showSideNav');
    Route::get('/cases-monitoring', [CaseController::class, 'index'])->name('index');
    Route::post('/casesMonitoring', [CaseController::class, 'show'])->name('casesMonitoring');
    Route::put('/update-case/{id}', [CaseController::class, 'update'])->name('update');
    Route::post('/addCase', [CaseController::class, 'addCase'])->name('addCase');
    Route::post('/search', [SearchController::class, 'search'])->name('search');

});
