<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


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



Route::get('/','WebsiteController@index')->name('/');
Route::get('book_appointment/{id}', 'WebsiteController@bookAppointment')->name('book_appointment');
Route::post('make_appointment','WebsiteController@makeAppointment')->name('make_appointment');
Route::post('make_appointment_time', 'WebsiteController@storeAppointmentTime')->name('make_appointment_time');



Route::middleware('checkUserRole:admin')->group(function () {
   //Admin Routes
Route::get('dashboard', 'BackendController@dashboard')->name('dashboard');
Route::get('specialities','BackendController@specialities')->name('specialities');
Route::post('add_speciality' , 'BackendController@addSpeciality')->name('add_speciality');
Route::post('change_status', 'BackendController@changeStatus')->name('change_status');
Route::get('doctors','BackendController@doctors')->name('doctors');
Route::get('add_doctor','BackendController@addDoctor')->name('add_doctor');
Route::post('store_doctor','BackendController@storeDoctor')->name('store_doctor');
Route::post('doctor_change_status', 'BackendController@doctorChangeStatus')->name('doctor_change_status');
Route::get('patients','BackendController@patients')->name('patients');
Route::post('patient_change_status', 'BackendController@patientChangeStatus')->name('patient_change_status');
Route::get('manage_profile', 'BackendController@manageProfile')->name('manage_profile');
Route::put('update_profile/{id}', 'BackendController@updateProfile')->name('update_profile');

Route::get('appointments','BackendController@appointments')->name('appointments');
});

Route::middleware('checkUserRole:doctor')->group(function () {
//Doctor Dashboard
Route::get('doctor_dashboard','BackendController@doctorDashboard')->name('doctor_dashboard');
Route::get('my_appointments','BackendController@doctorMyAppointments')->name('my_appointments');
Route::get('my_profile','BackendController@myProfile')->name('my_profile');
Route::post('update_doctor_profile','BackendController@updateDoctorProfile')->name('update_doctor_profile');

});

Route::middleware('checkUserRole:patient')->group(function () {
//Patient Dashboard
Route::get('patient_dashboard','BackendController@patientDashboard')->name('patient_dashboard');

});

Auth::routes();
Route::get('logout', function (){
   Auth::logout();
   Session::flush();
   return redirect(url('/'));
});
Route::get('/home', 'HomeController@index')->name('home');
