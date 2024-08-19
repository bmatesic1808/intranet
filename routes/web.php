<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\SickLeaveController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MonthlyQuestionController;
use App\Http\Controllers\CeoQuestionController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\PerformanceReviewController;
use App\Http\Controllers\SopController;
use App\Http\Controllers\TeambuildingController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/birthdays', [OverviewController::class, 'getBirthdays'])->name('overview.birthdays');

Route::get('/import', [EquipmentController::class, 'importData'])->name('equipment.import');
Route::get('/linkstorage', function () { $targetFolder = base_path().'/storage/app/public'; $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage'; symlink($targetFolder, $linkFolder); });

Route::get('/absence/approve/{reference_code}', [AbsenceController::class, 'approveAbsenceRequest'])->name('absence.approve');
Route::get('/absence/reject/{reference_code}', [AbsenceController::class, 'rejectAbsenceRequest'])->name('absence.reject');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    // ABSENCE AND SICK LEAVE OVERVIEW
    Route::get('/management/absence/overview', [OverviewController::class, 'seeManagementAbsenceOverview'])->name('overview.management.absence');
    Route::get('/management/sickleave/overview', [OverviewController::class, 'seeManagementSickLeaveOverview'])->name('overview.management.sickleave');

    // USERS
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::group(['middleware' => ['permission:create_users']], function () {
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    });

    // OVERVIEW
    Route::get('/overview', [OverviewController::class, 'index'])->name('overview.index');

    // TEAMBUILDING
    Route::get('/teambuilding', [TeambuildingController::class, 'index'])->name('teambuilding.index');

    // COMPANY
    Route::get('/company', [CompanyController::class, 'index'])->name('company.index');

    // MONTHLY QUESTIONAIRE
    Route::get('/monthly-questionaire', [MonthlyQuestionController::class, 'create'])->name('monthly.create');
    Route::get('/monthly-questionaire/analytics', [MonthlyQuestionController::class, 'analytics'])->name('monthly.analytics');
    Route::get('/monthly-questionaire/index/{id}', [MonthlyQuestionController::class, 'index'])->name('monthly.index');
    Route::get('/monthly-questionaire/show/{id}', [MonthlyQuestionController::class, 'show'])->name('monthly.show');
    Route::post('/monthly-questionaire/edit', [MonthlyQuestionController::class, 'edit'])->name('monthly.edit');
    Route::post('/monthly-questionaire/store', [MonthlyQuestionController::class, 'store'])->name('monthly.store');
    Route::post('/monthly-questionaire/update/{id}', [MonthlyQuestionController::class, 'update'])->name('monthly.update');
    Route::get('/monthly-questionaire/my-archive', [MonthlyQuestionController::class, 'showMyArchive'])->name('monthly.my.archive');

    // CEO QUESTIONAIRE
    Route::get('/ceo-questionaire', [CeoQuestionController::class, 'create'])->name('ceo.create');
    Route::post('/ceo-questionaire/store', [CeoQuestionController::class, 'store'])->name('ceo.store');
    Route::get('/ceo-questionaire/index', [CeoQuestionController::class, 'index'])->name('ceo.index');
    Route::get('/ceo-questionaire/show/{id}', [CeoQuestionController::class, 'show'])->name('ceo.show');

    // ABSENCE
    Route::get('/absence', [AbsenceController::class, 'index'])->name('absence.index');
    Route::get('/absence/company-overview', [AbsenceController::class, 'companyOverview'])->name('absence.company.overview');
    Route::get('/absence/{id}', [AbsenceController::class, 'show'])->name('absence.show');

    // SICK LEAVE
    Route::get('/sick-leave', [SickLeaveController::class, 'index'])->name('sick-leave.index');
    Route::get('/sick-leave/{id}', [SickLeaveController::class, 'show'])->name('sick-leave.show');

    // EQUIPMENT
    // Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
    // Route::get('/equipment/show/{id}', [EquipmentController::class, 'show'])->name('equipment.show');

    // PRESENTATIONS
    // Route::get('/presentations', [PresentationController::class, 'index'])->name('presentations.index');

    // SOP
    Route::get('/sop', [SopController::class, 'index'])->name('sop.index');
    Route::get('/sop/show/{id}', [SopController::class, 'show'])->name('sop.show');
    Route::group(['middleware' => ['permission:create_sop']], function () {
        Route::get('/sop/create', [SopController::class, 'create'])->name('sop.create');
        Route::post('/sop/store', [SopController::class, 'store'])->name('sop.store');
        Route::get('/sop/edit/{id}', [SopController::class, 'edit'])->name('sop.edit');
        Route::put('/sop/update/{id}', [SopController::class, 'update'])->name('sop.update');
    });

    // PERFORMANCE REVIEWS
    Route::group(['middleware' => ['permission:do_performance_review_actions']], function () {
        Route::get('/performance-reviews/{id}', [PerformanceReviewController::class, 'show'])->name('performance.reviews.show');
    });

    Route::group(['middleware' => ['permission:do_meeting_actions']], function () {
        // MEETINGS
        Route::get('/meetings/{id}', [MeetingController::class, 'show'])->name('meetings.show');
    });

    Route::group(['middleware' => ['permission:read_activity']], function () {
        // ACTIVITIES
        // Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
        Route::get('/user/points/{id}', [UserController::class, 'showPointsPerMonth'])->name('user.points');
    });
});
