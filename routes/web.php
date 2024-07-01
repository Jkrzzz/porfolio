<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ProjectItemController;
use App\Http\Controllers\admin\QualificationController;
use App\Http\Controllers\admin\ProjectCategoryController;


Route::prefix('admin')->group(function () {
    Auth::routes(['register' => false, 'reset' => false, 'verify' => false, 'request' => false ]);
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/setting', [HomeController::class, 'setting'])->name('admin.setting');
        Route::resource('skill',SkillController::class);
        Route::resource('qualification',QualificationController::class);
        Route::resource('project',ProjectController::class);
        Route::resource('project-category',ProjectCategoryController::class);
        Route::resource('project-item',ProjectItemController::class);
    });
    Route::get('/setting-data', [HomeController::class, 'getSetting']);
    Route::post('/setting-data', [HomeController::class, 'postSetting'])->name('admin.post-setting');
    Route::get('/get-skill',[SkillController::class,'getSkill']);
    Route::get('/get-qualification',[QualificationController::class,'getQualification']);
    Route::get('/get-project',[ProjectController::class,'getProjects']);
});

// Route for the front-end section
Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');


