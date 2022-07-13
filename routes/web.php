<?php

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

//Route::get('/add-member', function () {
//    return view('add-member');
//})->name('addMember');


Route::post('/store-member', 'MemberController@storeMember')->name('storeMember');

Route::get('/', 'MemberController@memberList')->name('memberList');

Route::post('add-attendance/{id}', 'MemberController@addAttendance')->name('addAttendance');

Route::get('/red-list', 'MemberController@redList')->name('redList');


Route::get('edit-member/{id}', 'MemberController@editMember')->name('editMember');

Route::post('update-member/{id}', 'MemberController@updateMember')->name('updateMember');
Route::post('find-member', 'MemberController@findMember')->name('findMember');
Route::get('attandance-list', 'MemberController@attandanceList')->name('attandanceList');
Route::get('daily-attandance-list', 'MemberController@dailyAttandanceList')->name('dailyAttandanceList');
Route::get('old-list', 'MemberController@oldList')->name('oldList');

Route::get('employee-attandance', 'EmployeeController@employeeAttandance')->name('employeeAttandance');
Route::post('mark-employee-attandance', 'EmployeeController@markEmployeeAttandance')->name('markEmployeeAttandance');
Route::post('update-employee-attandance', 'EmployeeController@updateEmployeeAttandance')->name('updateEmployeeAttandance');

Route::get('employee-attandance-list', 'EmployeeController@employeeAttandanceList')->name('employeeAttandanceList');
Route::get('employee-task', 'EmployeeController@employeeTask')->name('employeeTask');


Route::post('task-done', 'EmployeeController@taskDone')->name('taskDone');
Route::get('task-done-list', 'EmployeeController@taskDoneList')->name('taskDoneList');


Route::get('whatsapp-message', 'EmployeeController@whatsappMessage')->name('whatsappMessage');



