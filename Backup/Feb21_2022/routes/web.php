<?php

use App\Http\Controllers\DeleteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MinistryMonthly;
use App\Http\Controllers\MinistryDaily;


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
    //return view('welcome');
    return view('auth.login');
});


Route::post('/auth/save',[MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout',[MainController::class, 'logout'])->name('auth.logout');




Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login',[MainController::class, 'login'])->name('auth.login');
    Route::get('/auth/register',[MainController::class, 'register'])->name('auth.register');

    Route::get('/auth/dashboard',[MainController::class, 'dashboard']);
    Route::get('/auth/onlinecom/{ptypeid}/{filterid}',[MainController::class, 'onlinecom'])->name('auth.onlinecom');
   
    //refresh data
    Route::get('/auth/update_tag',[MainController::class, 'update_tag'])->name('auth.update_tag');
    Route::post('/auth/update_contactprofile',[MainController::class, 'update_contactprofile'])->name('auth.update_contactprofile');
    
    Route::get('/auth/get_activity/{id}',[MainController::class, 'get_activity'])->name('auth.activity');
    Route::post('/auth/create_activity/{id}',[MainController::class, 'create_activity'])->name('auth.create_activity');
    Route::post('/auth/update_activity/{id}',[MainController::class, 'update_activity'])->name('auth.update_activity');

   
    Route::get('/auth/index_month',[MinistryMonthly::class, 'index_month'])->name('auth.dataentrymonthly');
    Route::get('/auth/create_monthly/{id}',[MinistryMonthly::class, 'create_monthly'])->name('auth.create_monthly');


   // Route::get('/auth/update_monthly/{id}',[MinistryMonthly::class, 'update_monthly'])->name('auth.update_monthly');

   
    
    Route::get('/auth/officer_report',[MinistryMonthly::class, 'officer_report'])->name('auth.officer_report');

    //Route::get('calendar-event', [DailyreportsController::class, 'index']); 
    Route::get('/auth/index_day',[MinistryDaily::class, 'index_day'])->name('auth.dataentrydaily');
    Route::get('/auth/store/{id}',[MinistryDaily::class, 'store'])->name('auth.create_daily');
    Route::get('/auth/update_daily',[MinistryDaily::class, 'update_daily'])->name('auth.update_daily');
    
    Route::get('/auth/service_report',[MinistryDaily::class, 'service_report'])->name('auth.servicereport');
    //compute hours
    Route::get('/auth/compute_service',[MinistryDaily::class, 'compute_service'])->name('auth.compute_service');
    //update Records
    Route::get('/auth/update_monthly/{id}/{month}',[MinistryDaily::class, 'update_monthly'])->name('auth.update_monthly');
    


    Route::get('/auth/delete_from_table/{id}',[DeleteController::class, 'delete_from_table'])->name('auth.delete_from_table');


});
