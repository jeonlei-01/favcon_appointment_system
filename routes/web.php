<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdvocacyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminRoutes;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


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
        return view('portfolio');
    });
    Route::get('/update/appoint/request/{user}', [LoginController::class, 'checkAppointment'])->name('admin.dashboard.unauthenticated')->middleware('appoint');

    Route::middleware('secure')->group(function(){
    Route::get('/admin-dashboard', [AdminViewController::class, 'homeview']);
    Route::post('/update/{id}', [AdminViewController::class, 'updateAppointment'])->name('request.form'); 
    Route::get('/appointment-dashboard', [AdminViewController::class, 'appointmentView'])->name('admin.appointment');
    Route::get('/service-dashboard', [AdminViewController::class, 'serviceview'])->name('admin.service');
    Route::get('/admin/service/create', [AdminViewController::class, 'createServices']);
    Route::post('/admin/service/create/info', [AdminViewController::class, 'addServices']);
    Route::get('/admin/service/update/{id}', [AdminViewController::class, 'editServices']);
    Route::post('/admin/service/update/', [AdminViewController::class, 'updateServices']);
    Route::get('/schedule-dashboard', [AdminViewController::class, 'scheduleview'])->name('admin.schedule');
    Route::get('/admin/schedule_create', [AdminViewController::class, 'createSchedule']);
    Route::post('/admin/schedule/create/info', [AdminViewController::class, 'addSchedule']);
    Route::post('/admin/schedule/update/', [AdminViewController::class, 'editSchedule']);
    Route::get('/admin/schedule/update/{id}', [AdminViewController::class, 'updateSchedule']);
    Route::get('/timeslot-dashboard', [AdminViewController::class, 'timeslotview'])->name('admin.timeslot');
    Route::get('/get-dates/{serviceId}', [AdminViewController::class, 'getDates']);
    Route::get('/admin/timeslot/create', [AdminViewController::class, 'createTimeSlot']);
    Route::post('/admin/timeslot/create/info', [AdminViewController::class, 'addTimeSlot']);
    Route::get('/admin/timeslot/update/{id}', [AdminViewController::class, 'editTimeslots']);
    Route::post('/admin/timeslot/update/', [AdminViewController::class, 'updateTimeslots'])->name('admin.timeslot');

    //Logout Route
    Route::post('/logout', [AdminViewController::class, 'logout'])->name('logout');
    //ChangePassword Route
    Route::get('/change-password', [AdminViewController::class, 'showChangePasswordForm'])->name('change-password');
    Route::post('/change-password', [AdminViewController::class, 'changePassword']);
    });
    
    //Login Route
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    //Client Route
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index'); 
    Route::post('/contact/book', [ContactController::class, 'book'])->name('contact.book');
    Route::get('/thankyou', [ContactController::class, 'thankyou'])->name('contact.thankyou');
    Route::post('/get-schedule', [ContactController::class, 'getSchedule'])->name('get.schedule');
    Route::get('/portfolio', [PortfolioController::class, 'index']);
    Route::get('/advocacy', [AdvocacyController::class, 'index']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/appointments/cancel/{id}', [ContactController::class, 'cancel'])->name('appointments.cancel');



    





