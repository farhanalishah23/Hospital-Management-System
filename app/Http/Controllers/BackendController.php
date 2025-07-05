<?php

namespace App\Http\Controllers;

use App\DoctorAward;
use App\DoctorClinic;
use App\DoctorEducation;
use App\DoctorExperience;
use App\DoctorTime;
use App\Speciality;
use App\BookAppointment;
use App\User;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Charge;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class BackendController extends Controller
{
  public function dashboard(){
      $doctors = User::where('role', 'doctor')->where('status', 'active')->latest()->get();
      foreach ($doctors as $doctor) {
          $doctor->earning = $doctor->bookAppointments()->sum('fees');
      }
      $patients = User::where('role', 'patient')->where('status', 'active')->latest()->get();
      foreach($patients as $patient) {
          $patient->totalFeesPaid = $patient->appointments()->sum('fees');
      }
      $totalAppointments = BookAppointment::latest()->get();
      $revenue = BookAppointment::where('status','paid')->get()->sum('fees');
      $years = ['2023', '2024', '2025', '2026', '2027', '2028', '2029'];
      $revenueByYear = [];
      foreach ($years as $year) {
          $revenueGraph = BookAppointment::where('status', 'paid')->whereYear('created_at', $year)->sum('fees');
          $revenueByYear[] = ['y' => $year, 'a' => $revenueGraph];
      }
      $years = ['2023', '2024', '2025', '2026', '2027', '2028', '2029'];
      $revenueByYear = [];
      foreach ($years as $year) {
          $revenueGraphDoctor = User::where('role', 'doctor')->where('status','active')->whereYear('created_at', $year)->count();
          $revenueGraphPatient = User::where('role', 'patient')->where('status','active')->whereYear('created_at', $year)->count();
          $revenueByYear[] = ['y' => $year, 'a' => $revenueGraphDoctor , 'b' => $revenueGraphPatient];
      }
      return view('backend.dashboard',compact('doctors','patients','totalAppointments','revenue','revenueByYear'));
  }
  public function specialities(){
      $specialities = Speciality::latest()->get();
      return view('backend.specialities',compact('specialities'));
  }
  public function addSpeciality(Request $request){
      extract($request->all());
      $request->validate([
          'name' => 'required',
      ]);
      $path = null;
      if ($request->hasFile('image')) {
          $path = Storage::disk('website')->putFile('Specialities', $request->file('image'));
      }
      $specialities = Speciality::create([
          'name' => $name,
          'image' => $path,
          'status' => $status,
      ]);
      if($specialities){
          return redirect()->back()->with(['type'=>'success','title'=>'Done!','message'=>'Speciality created successfully']);
      }else{
          return redirect()->back()->with(['type'=>'error','title'=>'Fail!','message'=>'Unable to create speciality']);
      }
  }
  public function changeStatus(Request $request){
      extract($request->all());
      if (Speciality::where('id', $speciality_id)->update(['status'=>$speciality_status])) {
          return true;
      }else{
          return false;
      }
  }
  public function updateSpeciality(Request $request){
        $request->validate([
            'speciality_id' => 'required|integer|exists:specialities,id',
            'name' => 'required|max:255',
        ]);
       $speciality = Speciality::find($request->speciality_id);
        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('website')->putFile('Specialities', $request->file('image'));
        }else{
            $path = $speciality->image;
        }
        $isUpdated = $speciality->update([
            'name' => $request->name,
            'image' => $path,
        ]);
        if ($isUpdated) {
            return redirect()->back()->with( ['type'=>'success', 'title'=>'Done!', 'message'=>'Speciality updated successfully']);
        } else {
            return redirect()->back()->with(['type'=>'error', 'title'=>'Fail!', 'message'=>'Unable to update speciality']);
        }
  }
  public function destroySpeciality(Request $request){
        extract($request->all());
        $speciality = Speciality::findorfail($id);
        $speciality->delete();
        if ($speciality){
            return redirect(url('specialities'))->with(['type'=>'success','title'=>'Deleted!','message'=>'Speciality deleted successfully']);
        }
        else {
            return redirect()->back()->with(['type'=>'success','title'=>'Deleted!','message'=>'Unable to delete speciality']);
        }
  }
  public function doctors(){
      $specialities = Speciality::where('status','active')->get();
      $doctors = User::with('speciality')->where('role','doctor')->latest()->get();
      return view('backend.doctors' ,compact('specialities','doctors'));
  }
  public function addDoctor(){
      $specialities = Speciality::where('status','active')->get();
      $doctors = User::with('speciality')->where('role','doctor')->get();
      return view('backend.add_doctor',compact('specialities','doctors'));
  }
  public function doctorChangeStatus(Request $request){
        extract($request->all());
        if (User::where('role','doctor')->where('id', $speciality_id)->update(['status'=>$speciality_status])) {
            return true;
        }else{
            return false;
        }
  }
    public function storeDoctorTimings(Request $request){
        $data = $request->validate([
            'time' => 'required',
        ]);
        $doctorId = Auth::id();
        $doctorTimings = [];
        foreach($data['time'] as $doctorTime){
            $time = Carbon::parse($doctorTime)->format('h:i A');
            $doctorTimings[] = DoctorTime::updateorcreate([
                'doctor_id' => $doctorId,
                'time' => $time,
            ]);
        }
        if(count($doctorTimings) > 0){
            return redirect()->back()->with(['type' => 'success', 'title' => 'Success', 'message' => 'Time stored successfully']);
        } else {
            return redirect()->back()->with(['type' => 'error', 'title' => 'Error', 'message' => 'Failed to store time']);
        }
    }
    public function checkEmailAvailability(Request $request){
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            return response()->json(['available' => false]);
        }
        return response()->json(['available' => true]);
  }
  public function storeDoctor(Request $request){
      extract($request->all());
      $request->validate([
          'name'=>'required',
          'email'=> 'required',
          'password'=>'required',
          'fees'=>'required',
      ]);
      $path = null;
      if ($request->hasFile('image')) {
          $path = Storage::disk('website')->putFile('Users', $request->file('image'));
      }
      $doctors = User::create([
          'speciality_id'=>$speciality_id,
         'name'=>$name,
         'email'=>$email,
         'password'=>bcrypt($password),
         'fees'=>$fees,
         'image'=>$path,
         'status'=>$status,
         'role'=>'doctor',
      ]);
      if($doctors){
          return redirect(url('doctors'))->with(['type'=>'success','title'=>'Done!','message'=>'Doctor has been created successfully']);
      }else{
          return redirect()->back()->with(['type'=>'error','title'=>'Done!','message'=>'Unable to create doctor']);
      }
  }
  public function showDoctor($id){
      $doctor = User::findorfail($id);
      $specialities = Speciality::where('status','active')->get();
      return view('backend.edit_doctor',compact('doctor','specialities'));
  }
  public function updateDoctor(Request $request, $id){
      $doctor = User::findorfail($id);
      extract($request->all());
      $request->validate([
          'name'=>'required',
          'email'=> 'required',
      ]);
      if ($request->filled('password')) {
          $doctor->password = bcrypt($request->password);
      }
      if ($request->hasFile('image')) {
          $path = Storage::disk('website')->putFile('Users', request()->file('image'));
      } else {
          $path = $doctor->image;
      }
      $doctor->update([
          'speciality_id'=>$speciality_id,
          'name'=>$name,
          'email'=>$email,
          'fees'=>$fees,
          'password'=>bcrypt($password),
          'image'=>$path,
      ]);
      if ($doctor) {
          return redirect(url('doctors'))->with(['type' => 'success', 'title' => 'Success', 'message' => 'Doctor updated successfully']);
      }else{
          return redirect()->back()->with(['type' => 'error', 'title' => 'Error', 'message' => 'Unable to update doctor']);
      }
  }
  public function checkPassword(Request $request){
      $isValid = Hash::check($request->password, auth()->user()->password);
      return response()->json(['isValid' => $isValid]);
  }
  public function destroyDoctor(Request $request){
        extract($request->all());
        $doctors = User::where('role','doctor')->findorfail($id);
        $doctors->delete();
        if ($doctors){
            return redirect(url('doctors'))->with(['type'=>'success','title'=>'Deleted!','message'=>'Doctor deleted successfully']);
        }
        else {
            return redirect()->back()->with(['type'=>'success','title'=>'Deleted!','message'=>'Unable to delete doctor']);
        }
  }
  public function patients(){
      $patients = User::where('role','patient')->latest()->get();
       return view('backend.patients',compact('patients'));
    }
  public function patientChangeStatus(Request $request){
        extract($request->all());
        if (User::where('role','patient')->where('id', $speciality_id)->update(['status'=>$speciality_status])) {
            return true;
        }else{
            return false;
         }
  }
  public function destroyPatient(Request $request){
        extract($request->all());
        $patients = User::where('role','patient')->findorfail($id);
        $patients->delete();
        if ($patients){
            return redirect(url('patients'))->with(['type'=>'success','title'=>'Deleted!','message'=>'Patient deleted successfully']);
        }
        else {
            return redirect()->back()->with(['type'=>'success','title'=>'Deleted!','message'=>'Unable to delete patient']);
        }
  }
  public function manageProfile(){
      return view('backend.manage_profile');
  }
  public function updateProfile(Request $request, $id){
      extract($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        $user = User::find($id);
        if ($request->filled('password')) {
            $user->password = bcrypt($password);
        }
        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('website')->putFile('Users', $request->file('image'));
        } else {
            $path = Auth::user()->image;
         }
        $user->update(['name'=>$name,'email'=>$email,'image'=>$path , 'phone'=>$phone , 'address'=>$address , 'bio'=>$bio , 'age'=>$age ]);
        if ($user) {
            return redirect(url('manage_profile'))->with(['type' => 'success', 'title' => 'Success', 'message' => 'User updated successfully']);
        }else{
            return redirect()->back()->with(['type' => 'error', 'title' => 'Error', 'message' => 'User not found']);
         }
  }
  public function appointments(){
    $appointments = BookAppointment::latest()->get();
      return view('backend.appointments',compact('appointments'));
  }
  public function doctorDashboard(){
      $id = Auth::id();
     $doctors = Auth::user()->where('role','doctor')->where('status','active')->get();
     $totalIncome = User::where('id', $id)->with('bookAppointments')->get()->sum(function ($user) {
              return $user->bookAppointments->sum('fees');
          });
      $myAppointments = BookAppointment::where('status','paid')->where('doctor_id', $id)->get();
      $totalPatients = BookAppointment::where('status','paid')->where('doctor_id',$id)->whereHas('patient')->count();
      $totalAppointments = BookAppointment::where('status','paid')->where('doctor_id', $id)->count('id');
      return view('doctor.doctor_dashboard' , compact('doctors','myAppointments','totalAppointments','totalPatients','totalIncome'));
  }
    public function getRevenueData() {
        $id = Auth::id();
        $years = ['2023', '2024', '2025', '2026', '2027', '2028', '2029'];
        $dataByYear = [];
        foreach ($years as $year) {
            $revenue = BookAppointment::where('doctor_id', $id)->where('status', 'paid')
                ->whereYear('created_at', $year)
                ->sum('fees');
            $appointmentsCount = BookAppointment::where('doctor_id', $id)->where('status', 'paid')->whereYear('created_at', $year)->count();
            $dataByYear[] = ['year' => $year, 'revenue' => $revenue, 'appointments' => $appointmentsCount];
        }
        return response()->json($dataByYear);
    }
    public function getMyAppointmentData(){
        $id = Auth::id();
        $years = ['2023', '2024', '2025', '2026', '2027', '2028', '2029'];
        $dataByYear = [];
        foreach ($years as $year) {
            $revenue = BookAppointment::where('patient_id', $id)->where('status', 'paid')->whereYear('created_at', $year)->sum('fees');
            $appointmentsCount = BookAppointment::where('patient_id', $id)->where('status','paid')->whereYear('created_at', $year)->count();
            $dataByYear[] = ['year' => $year, 'revenue' => $revenue, 'appointments' => $appointmentsCount];
        }
        return response()->json($dataByYear);
    }
  public function doctorMyAppointments(){
      $id = Auth::id();
      $myAppointments = BookAppointment::where('doctor_id', $id)->latest()->get();
      return view('doctor.my_appointments',compact('myAppointments'));
  }
  public function availableTimings(){
      $timeSlots = [];
      $startTime = Carbon::parse('09:00 AM');
      $endTime = Carbon::parse('05:00 PM');
      while ($startTime->lte($endTime)) {
          $timeSlots[] = $startTime->format('h:i A');
          $startTime->addHour();
      }
     $selectedTimes = DoctorTime::where('doctor_id', auth()->id())->get();
      return view('doctor.available_timings', compact('timeSlots', 'selectedTimes'));
  }
  public function updateAppointmentStatus($id,$status){
        if (BookAppointment::where('id',$id)->update(['status'=>$status])){
            return redirect()->back()->with(['type'=>'success','title'=>'Done!','message'=>'Status updated successfully']);
        }else{
            return redirect()->back()->with(['type'=>'success','title'=>'Fail!','message'=>'Unable to update status']);
        }
  }
  public function myProfile(){
      $id = Auth::id();
      $doctorEducations = DoctorEducation::where('doctor_id', $id)->get();
      $doctorExperiences = DoctorExperience::where('doctor_id', $id)->get();
      $doctorAwards = DoctorAward::where('doctor_id', $id)->get();
      return view('doctor.my_profile',compact('doctorEducations','doctorExperiences','doctorAwards'));
  }
  public function updateDoctorProfile(Request $request ){
//      return $request->all();
      extract($request->all());
      $request->validate([
          'phone' => 'required',
          'age' => 'required',
          'address' => 'required',
      ]);
      $path = null;
      if ($request->hasFile('image')) {
          $path = Storage::disk('website')->putFile('Users', $request->file('image'));
      } else {
          $path = Auth::user()->image;
      }
      User::where('id', Auth::id())->update([
          'image' => $path,
          'phone' => $phone,
          'address' => $address,
          'fees' => $fees,
          'bio' => $bio,
          'age' => $age,
      ]);
      if (isset($education)) {
          foreach ($education['degree'] as $key => $item) {
              DoctorEducation::updateOrCreate(
                  ['id' => $education['id'] ?? null],
                  [
                      'doctor_id' => Auth::user()->id,
                      'degree' => $item,
                      'collage' => $education['collage'][$key],
                      'year' => $education['year'][$key],
                  ]
              );
          }
      }

      if (isset($experience)) {
          foreach ($experience['hospital_name'] as $key => $item) {
              DoctorExperience::updateOrCreate([
                  'id' =>$experience['id'][$key],
              ],[
                  'doctor_id' => Auth::user()->id,
                  'hospital_name' => $item,
                  'from' => $experience['from'][$key],
                  'to' => $experience['to'][$key],
                  'designation' => $experience['designation'][$key],
              ]);
          }
      }
      if(isset($award)) {
                  foreach ($award['award_title'] as $key => $item) {
                      DoctorAward::updateOrCreate(
                          [
                              'id' =>$award['id'][$key],
                          ],
                          [
                          'doctor_id' => Auth::user()->id,
                          'award_title' => $item,
                          'award_year' => $award['award_year'][$key],
                          ]
                      );
                  }
      }
       return redirect()->back()->with(['type' => 'success', 'title' => 'Success', 'message' => 'User updated successfully']);
  }
  public function patientDashboard(){
      $id = Auth::id();
      $myAppointments = BookAppointment::where('status','paid')->where('patient_id',$id)->get();
      $totalDoctors = BookAppointment::where('status','paid')->where('patient_id', $id)->whereHas('doctor')->count();
      $patients = Auth::user()->where('id',$id)->where('role','patient')->where('status','active')->get();
      return view('patient.patient_dashboard',compact('patients','myAppointments','totalDoctors'));
  }
  public function patientAppointment(){
      $id = Auth::id();
      $myAppointments = BookAppointment::where('patient_id', $id)->latest()->get();
      $patients = Auth::user()->where('id',$id)->where('role','patient')->where('status','active')->get();
      return view('patient.patient_appointments',compact('myAppointments','patients'));
  }
  public function managePatientProfile(){
      return view('patient.manage_patient_profile');
  }
  public function updatePatientProfile(Request $request ){
        extract($request->all());
        $request->validate([
            'phone' => 'required',
            'age' => 'required',
            'address' => 'required',
        ]);
        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('website')->putFile('Users', $request->file('image'));
        } else {
            $path = Auth::user()->image;
        }
        User::where('id', Auth::id())->update([
            'name' => $name,
            'image' => $path,
            'phone' => $phone,
            'address' => $address,
            'age' => $age,
        ]);
        return redirect(url('manage_patient_profile'))->with(['type' => 'success', 'title' => 'Success', 'message' => 'User updated successfully']);
  }
  public function updatePatientAppointment($id,$status){
        if (BookAppointment::where('id',$id)->update(['status'=>$status])){
            return redirect()->back()->with(['type'=>'success','title'=>'Done!','message'=>'Appointment updated successfully']);
         }else{
            return redirect()->back()->with(['type'=>'success','title'=>'Fail!','message'=>'Unable to update appointment']);
          }
  }
  public  function stripePayment(Request $request){
        extract($request->all());
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $result = Charge::create([
            'amount' => $appointment_fees * 100,
            'currency' => 'usd',
            'description' => $request->input('description'),
            'source' => $request->input('stripeToken'),
        ]);
        $bookAppointment = BookAppointment::where('id',$appointment_id)->update([
            'receipt_url'=>$result->receipt_url,
            'stripe_id'=>$result->id,
            'fees' => $appointment_fees,
            'status'=>'paid',
        ]);
        if ($bookAppointment){
            return redirect()->back()->with(['type' => 'success', 'title' => 'Success', 'message' => 'You paid successfully']);
        }else{
            return redirect()->back()->with(['type' => 'error', 'title' => 'Error', 'message' => 'Unable to pay']);
          }
  }
  public function updatePassword(Request $request , $id){
        extract($request->all());
        $userPassword = User::findorfail($id);
        if ($userPassword->update(['password'=>bcrypt($new_password_confirmation)])){
            return redirect()->back()->with(['type'=>'success','title'=>'Done!','message'=>'Password updated successfully']);
         }else{
            return redirect()->back()->with(['type'=>'success','title'=>'Fail!','message'=>'Unable to update password']);
          }
  }


}
