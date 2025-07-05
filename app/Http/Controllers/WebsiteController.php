<?php

namespace App\Http\Controllers;

use App\BookAppointment;
use App\DoctorTime;
use App\Speciality;
use App\Subscriber;
use App\User;
use Auth;
use Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $doctors = User::where('role','doctor')->where('status','active')->paginate(4);
        $ourSpecialities = Speciality::where('status','active')->paginate(3);
        $specialityExist = Speciality::where('status','active')->exists();
        $doctorsExist = User::where('role', 'doctor')->where('status','active')->exists();
        return view('website.index',compact('doctors','ourSpecialities','doctorsExist','specialityExist'));
    }
    public function search(Request $request){
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $doctors = User::where('role', 'doctor')->where('status', 'active')->where(function ($query) use ($searchTerm) {$query->where('name', 'like', '%'.$searchTerm.'%');})->paginate(4);
        } else {
            $doctors = User::where('role', 'doctor')->where('status', 'active')->paginate(4);
        }
        $ourSpecialities = Speciality::where('status','active')->paginate(3);
        $specialityExist = Speciality::where('status','active')->exists();
        $doctorsExist = User::where('role', 'doctor')->where('status','active')->exists();
        return view('website.index', compact('doctors','ourSpecialities','specialityExist','doctorsExist'));
    }
    public function bookAppointment($id){
        $currentDate = Carbon::now();
        $formattedCurrentDate = $currentDate->format('d-M-Y');
        $formattedCurrentDay = $currentDate->format('D');
        $upcomingDays = [];
       for ($i = 0; $i < 7; $i++){
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
        $endTime = Carbon::parse('05:00 PM');
        while ($startTime->lte($endTime)) {
        $timeSlots[] = $startTime->format('h:i A');
        $startTime->addHour();
         }
        $doctor = User::find($id);
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
            $makeAppointment = BookAppointment::create([
                'doctor_id' => $request->doctor_id,
                'patient_id' => Auth::id(),
                'time' => $request->time,
                'date' => $request->date,
                'fees' =>'0',
                'status' => 'pending',
            ]);
            $patients = User::where('id',Auth::id())->get();
            foreach($patients as $patient){
                $suggestionString = "Appointment has been booked now wait for accept appointment";
                Mail::raw($suggestionString, function ($message) use ($patient) {
                $message->to($patient->email)->subject('Appointment Booked!');
                });
            }
            $doctors = User::where('id',$request->doctor_id)->get();
            foreach($doctors as $doctor){
                $suggestionString = "Appointment has been booked now  accept appointment and wait for payment";
                Mail::raw($suggestionString, function ($message) use ($doctor) {
                $message->to($doctor->email)->subject('Appointment Booked!');
            });
            }
            if ($makeAppointment) {
                return redirect(url('patient_appointments'))->with(['type' => 'success', 'title' => 'Done!', 'message' => 'Appointment booked successfully']);
            } else{
                return redirect()->back()->with(['type' => 'error', 'title' => 'Fail!', 'message' => 'Unable to book appointment']);
            }
        }else{
            return redirect(url('login'));
        }
    }
    public function subcribe(Request $request){
        $request->validate(['email' => 'required|email|unique:subscribers']);
         Subscriber::create([
            'email' => $request->email,
        ]);
        $suggestionString = "Thank you for subscribing!";
        Mail::raw($suggestionString, function ($message) use ($request) {
            $message->to($request->email)->subject('Welcome to Our Newsletter!');
        });
        return redirect()->back()->with(['type' => 'success', 'title' => 'Subscribed!', 'message' => 'Thankyou for subscribe!']);
    }

}



