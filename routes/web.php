<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\RegisController;

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
Route::group(['middleware' => 'prevent-back-history'],function(){


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout',[AdminController::class, 'Logout'])->name('admin.logout');

//  User Management all Routes

Route::prefix('users')->group(function (){

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');

    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');

    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');

    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');

    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');

    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');

});

// User Profile and change Password
Route::prefix('profiles')->group(function (){

    Route::get('/profile', [ProfileController::class, 'ProfileView'])->name('profile.view');

    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');

    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');

    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');

    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

});

// Student Class Routes
Route::prefix('setups')->group(function (){

    Route::get('student/class/view', [StudentClassController::class, 'ClassView'])->name('class.view');

    Route::get('student/class/add', [StudentClassController::class, 'ClassAdd'])->name('class.add');

    Route::post('student/class/store', [StudentClassController::class, 'ClassStore'])->name('class.store');

    Route::get('student/class/edit/{id}', [StudentClassController::class, 'ClassEdit'])->name('class.edit');

    Route::post('student/class/update/{id}', [StudentClassController::class, 'ClassUpdate'])->name('class.update');

    Route::get('student/class/delete/{id}', [StudentClassController::class, 'ClassDelete'])->name('class.delete');

// Student Year Routes

    Route::get('student/year/view', [StudentYearController::class, 'YearView'])->name('year.view');

    Route::get('student/year/add', [StudentYearController::class, 'YearAdd'])->name('year.add');

    Route::post('student/year/store', [StudentYearController::class, 'YearStore'])->name('year.store');

    Route::get('student/year/edit/{id}', [StudentYearController::class, 'YearEdit'])->name('year.edit');

    Route::post('student/year/update/{id}', [StudentYearController::class, 'YearUpdate'])->name('year.update');

    Route::get('student/year/delete/{id}', [StudentYearController::class, 'YearDelete'])->name('year.delete');

// Student Group Routes

    Route::get('student/group/view', [StudentGroupController::class, 'GroupView'])->name('group.view');

    Route::get('student/group/add', [StudentGroupController::class, 'GroupAdd'])->name('group.add');

    Route::post('student/group/store', [StudentGroupController::class, 'GroupStore'])->name('group.store');

    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'GroupEdit'])->name('group.edit');

    Route::post('student/group/update/{id}', [StudentGroupController::class, 'GroupUpdate'])->name('group.update');

    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'GroupDelete'])->name('group.delete');

    // Student Shift Routes

    Route::get('student/shift/view', [StudentShiftController::class, 'ShiftView'])->name('shift.view');

    Route::get('student/shift/add', [StudentShiftController::class, 'ShiftAdd'])->name('shift.add');

    Route::post('student/shift/store', [StudentShiftController::class, 'ShiftStore'])->name('shift.store');

    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'ShiftEdit'])->name('shift.edit');

    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'ShiftUpdate'])->name('shift.update');

    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'ShiftDelete'])->name('shift.delete');

// Student Fee Category Routes

    Route::get('fee/category/view', [FeeCategoryController::class, 'FeeCatView'])->name('fee.category.view');

    Route::get('fee/category/add', [FeeCategoryController::class, 'FeeCatAdd'])->name('fee.category.add');

    Route::post('fee/category/store', [FeeCategoryController::class, 'FeeCatStore'])->name('fee.category.store');

    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCatEdit'])->name('fee.category.edit');

    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'FeeCatUpdate'])->name('fee.category.update');

    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCatDelete'])->name('fee.category.delete');

 //  Fee Amount Routes

    Route::get('fee/amount/view', [FeeAmountController::class, 'FeeAmountView'])->name('fee.amount.view');

    Route::get('fee/amount/add', [FeeAmountController::class, 'FeeAmountAdd'])->name('fee.amount.add');

    Route::post('fee/amount/store', [FeeAmountController::class, 'FeeAmountStore'])->name('fee.amount.store');

    Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'FeeAmountEdit'])->name('fee.amount.edit');

    Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'FeeAmountUpdate'])->name('fee.amount.update');

    Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDetails'])->name('fee.amount.details');

    Route::get('fee/amount/delete/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDelete'])->name('fee.amount.delete');

// Exam Type Routes

    Route::get('exam/type/view', [ExamTypeController::class, 'ExamTypeView'])->name('exam.type.view');

    Route::get('exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');

    Route::post('exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('exam.type.store');

    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');

    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('exam.type.update');

    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');

// School Subject All Routes

    Route::get('subject/view', [SubjectController::class, 'SubjectView'])->name('subject.view');

    Route::get('subject/add', [SubjectController::class, 'SubjectAdd'])->name('subject.add');

    Route::post('subject/store', [SubjectController::class, 'SubjectStore'])->name('subject.store');

    Route::get('subject/edit/{id}', [SubjectController::class, 'SubjectEdit'])->name('subject.edit');

    Route::post('subject/update/{id}', [SubjectController::class, 'SubjectUpdate'])->name('subject.update');

    Route::get('subject/delete/{id}', [SubjectController::class, 'SubjectDelete'])->name('subject.delete');

// Assign Subject All Routes

    Route::get('assign/subject/view', [AssignSubjectController::class, 'AssignSubjectView'])->name('assign.subject.view');

    Route::get('assign/subject/add', [AssignSubjectController::class, 'AssignSubjectAdd'])->name('assign.subject.add');

    Route::post('assign/subject/store', [AssignSubjectController::class, 'AssignSubjectStore'])->name('assign.subject.store');

    Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'AssignSubjectEdit'])->name('assign.subject.edit');

    Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'AssignSubjectUpdate'])->name('assign.subject.update');

    Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'AssignSubjectDetails'])->name('assign.subject.details');

    Route::get('assign/subject/delete/{class_id}', [AssignSubjectController::class, 'AssignSubjectDelete'])->name('assign.subject.delete');

// Designation All Routes

    Route::get('designation/view', [DesignationController::class, 'DesignationView'])->name('designation.view');

    Route::get('designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');

    Route::post('designation/store', [DesignationController::class, 'DesignationStore'])->name('designation.store');

    Route::get('designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');

    Route::post('designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('designation.update');

    Route::get('designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');

});

// Registration
    Route::prefix('students')->group(function (){

        Route::get('/regi/view', [RegisController::class, 'RegiView'])->name('registration.view');

    });


}); //prevent browser back
