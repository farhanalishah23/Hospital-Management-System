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
Route::get('search', 'WebsiteController@search')->name('search');
Route::get('book_appointment/{id}', 'WebsiteController@bookAppointment')->name('book_appointment');
Route::post('make_appointment','WebsiteController@makeAppointment')->name('make_appointment');
Route::post('make_appointment_time', 'WebsiteController@storeAppointmentTime')->name('make_appointment_time');
Route::post('subcribe','WebsiteController@subcribe')->name('subcribe');


Route::middleware('checkUserRole:admin')->group(function () {
   //Admin Routes
Route::get('dashboard', 'BackendController@dashboard')->name('dashboard');
Route::get('specialities','BackendController@specialities')->name('specialities');
Route::post('add_speciality' , 'BackendController@addSpeciality')->name('add_speciality');
Route::post('change_status', 'BackendController@changeStatus')->name('change_status');
Route::put('update_speciality' , 'BackendController@updateSpeciality')->name('update_speciality');
Route::delete('destroy_speciality', 'BackendController@destroySpeciality')->name('destroy_speciality');
Route::get('doctors','BackendController@doctors')->name('doctors');
Route::get('add_doctor','BackendController@addDoctor')->name('add_doctor');
Route::post('doctor_change_status', 'BackendController@doctorChangeStatus')->name('doctor_change_status');
Route::post('check_email', 'BackendController@checkEmailAvailability')->name('check_email');
Route::post('store_doctor','BackendController@storeDoctor')->name('store_doctor');
Route::get('show_doctor/{id}','BackendController@showDoctor')->name('show_doctor');
Route::put('update_doctor/{id}','BackendController@updateDoctor')->name('update_doctor');
Route::delete('destroy_doctor', 'BackendController@destroyDoctor')->name('destroy_doctor');
Route::get('patients','BackendController@patients')->name('patients');
Route::post('patient_change_status', 'BackendController@patientChangeStatus')->name('patient_change_status');
Route::delete('destroy_patient', 'BackendController@destroyPatient')->name('destroy_patient');
Route::get('manage_profile', 'BackendController@manageProfile')->name('manage_profile');
Route::put('update_profile/{id}', 'BackendController@updateProfile')->name('update_profile');
Route::post('check_password', 'BackendController@checkPassword')->name('check_password');
Route::post('update_password/{id}','BackendController@updatePassword')->name('update_password');
Route::get('appointments','BackendController@appointments')->name('appointments');

});

Route::middleware('checkUserRole:doctor')->group(function () {
//Doctor Dashboard
Route::get('doctor_dashboard','BackendController@doctorDashboard')->name('doctor_dashboard');
Route::get('get_my_revenue' , 'BackendController@getRevenueData')->name('get_my_revenue');
Route::get('my_appointments','BackendController@doctorMyAppointments')->name('my_appointments');
Route::get('available_timings','BackendController@availableTimings')->name('available_timings');
Route::post('store_timings','BackendController@storeDoctorTimings')->name('store_timings');
Route::get('my_profile','BackendController@myProfile')->name('my_profile');
Route::post('update_doctor_profile','BackendController@updateDoctorProfile')->name('update_doctor_profile');
Route::get('update_appointment_status/{id?}/{status?}', 'BackendController@updateAppointmentStatus')->name('update_appointment_status');

});

Route::middleware('checkUserRole:patient')->group(function () {
//Patient Dashboard
Route::get('patient_dashboard','BackendController@patientDashboard')->name('patient_dashboard');
Route::get('get_my_appointment' , 'BackendController@getMyAppointmentData')->name('get_my_appointment');
Route::get('patient_appointments', 'BackendController@patientAppointment')->name('patient_appointments');
Route::get('manage_patient_profile','BackendController@managePatientProfile')->name('manage_patient_profile');
Route::post('update_patient_profile','BackendController@updatePatientProfile')->name('update_patient_profile');
Route::get('update_patient_appointment/{id?}/{status?}', 'BackendController@updatePatientAppointment')->name('update_patient_appointment');
Route::post('stripe_payment', 'BackendController@stripePayment')->name('stripePayment');

});

Auth::routes();
Route::get('logout', function (){
   Auth::logout();
   Session::flush();
   return redirect(url('/'));
});
Route::get('/home', function (){
    return redirect('patient_dashboard');
})->name('home');


Route::post('payment', 'PaypalController@payment')->name('payment');
Route::get('cancel', 'PaypalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PaypalController@success')->name('payment.success');
