<?php

namespace App\Http\Controllers;

use App\BookAppointment;
use App\User;
use Auth;
use Carbon\Carbon;;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $doctors = User::where('role','doctor')->where('status','active')->get();
        return view('website.index',compact('doctors'));
    }
public function bookAppointment($id){

  $currentDate = Carbon::now();
$formattedCurrentDate = $currentDate->format('d-M-Y'); // Use Y-m-d format for default date
$formattedCurrentDay = $currentDate->format('D');

$upcomingDays = [];
for ($i = 0; $i < 7; $i++) {
    $upcomingDay = $currentDate->copy()->addDays($i);
    $formattedDay = $upcomingDay->format('D');
    $formattedDate = $upcomingDay->format('d M');
    $formattedYear = $upcomingDay->format('Y');
    $upcomingDays[] = [
        'day' => $formattedDay,
        'date' => $formattedDate,
        'year' => $formattedYear
    ];
}

$timeSlots = [];
$startTime = Carbon::parse('09:00 AM');
$endTime = Carbon::parse('11:00 AM');
while ($startTime->lte($endTime)) {
    $timeSlots[] = $startTime->format('h:i A');
    $startTime->addHour();
}

$doctor = User::find($id);

// Set default selected date and time
$selectedDate = $formattedCurrentDate;
$selectedTime = $timeSlots[0];


    return view('website.book_appointment', compact('doctor', 'upcomingDays', 'timeSlots', 'formattedCurrentDate', 'formattedCurrentDay','selectedDate','selectedTime'));
}


 public function makeAppointment(Request $request){
  
        
        $request->validate([
            'time' => 'required',
            'date' => 'required',
            'doctor_id' => 'required|exists:users,id',
        ]);
        if (Auth::check() && Auth::user()->role === 'patient') {
            $existingAppointment = BookAppointment::where([
                'doctor_id' => $request->doctor_id,
                'patient_id' => Auth::id(),
                'date' => $request->date,
            ])->first();

            if ($existingAppointment) {
                return redirect()->back()->with(['type' => 'error', 'title' => 'Fail!', 'message' => 'Appointment already exists for this doctor and date.']);
            }

            $doctor = User::findOrFail($request->doctor_id);
            $fees = $doctor->fees ?? 0;

            // Create a new appointment
            $makeAppointment = BookAppointment::create([
                'doctor_id' => $request->doctor_id,
                'patient_id' => Auth::id(),
                'time' => $request->time,
                'date' => $request->date,
                'fees' => $fees,
                'status' => 'pending',
            ]);

            if ($makeAppointment) {
                return redirect()->back()->with(['type' => 'success', 'title' => 'Done!', 'message' => 'Appointment booked successfully']);
            } else {
                return redirect()->back()->with(['type' => 'error', 'title' => 'Fail!', 'message' => 'Unable to book appointment']);
            }
        } else {
            return redirect(url('login'));
        }
    }
      
}



