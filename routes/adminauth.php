<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\AdminDashboardController;
use App\Http\Controllers\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\PasswordController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['guest:admin'],'prefix'=>'admin','as'=>'admin.'],function(){

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});

Route::group(['middleware'=>['auth:admin'],'prefix'=>'admin','as'=>'admin.'],function() {

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    Route::get('availableseat', [AdminDashboardController::class, 'availableseat'])
                ->name('availableseat');

    Route::post('updateavailableseat',[AdminDashboardController::class,'updateavailableseat'])
                ->name('updateavailableseat');

    Route::get('newusers', [AdminDashboardController::class, 'newusers'])
                ->name('newusers');

    Route::get('oldusers', [AdminDashboardController::class, 'oldusers'])
                ->name('oldusers');

    Route::post('updateusers',[AdminDashboardController::class,'updateusers'])
                ->name('updateusers');

    Route::post('deleteusers',[AdminDashboardController::class,'deleteusers'])
                ->name('deleteusers');
    
    Route::post('removeusers',[AdminDashboardController::class,'goback'])
                ->name('removeusers');

    Route::get('migration',[AdminDashboardController::class,'migration'])
                ->name('migration');

    Route::post('migrate',[AdminDashboardController::class,'migrate'])
                ->name('migrate');

    Route::get('migrationdetails_a',[AdminDashboardController::class,'migrationdetails_a'])
                ->name('migrationdetails_a');

    Route::get('migrationdetails_b',[AdminDashboardController::class,'migrationdetails_b'])
                ->name('migrationdetails_b');

    Route::get('migrationdetails_c',[AdminDashboardController::class,'migrationdetails_c'])
                ->name('migrationdetails_c');

    Route::post('Studentsdetails_a',[AdminDashboardController::class,'Studentsdetails_a'])
                ->name('Studentsdetails_a');

    Route::post('Studentsdetails_b',[AdminDashboardController::class,'Studentsdetails_b'])
                ->name('Studentsdetails_b');

    Route::post('Studentsdetails_c',[AdminDashboardController::class,'Studentsdetails_c'])
                ->name('Studentsdetails_c');

    Route::post('stopmigration_a',[AdminDashboardController::class,'stopmigration_a'])
                ->name('stopmigration_a');

    Route::post('stopmigration_b',[AdminDashboardController::class,'stopmigration_b'])
                ->name('stopmigration_b');

    Route::post('stopmigration_c',[AdminDashboardController::class,'stopmigration_c'])
                ->name('stopmigration_c');

    Route::post('stopmigrate',[AdminDashboardController::class,'stopmigrate'])
                ->name('stopmigrate');

    Route::get('stopmigrationlist',[AdminDashboardController::class,'stopmigrationlist'])
                ->name('stopmigrationlist');

    Route::get('selectedlist',[AdminDashboardController::class,'selectedlist'])
                ->name('selectedlist');

    Route::get('allSubjects_a',[AdminDashboardController::class,'allSubjects_a'])->name('allSubjects_a');

    Route::get('allSubjects_b',[AdminDashboardController::class,'allSubjects_b'])->name('allSubjects_b');

    Route::get('allSubjects_c',[AdminDashboardController::class,'allSubjects_c'])->name('allSubjects_c');





});
