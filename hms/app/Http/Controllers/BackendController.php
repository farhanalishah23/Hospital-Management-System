<?php

namespace App\Http\Controllers;

use App\DoctorAward;
use App\DoctorClinic;
use App\DoctorEducation;
use App\DoctorExperience;
use App\Speciality;
use App\BookAppointment;
use App\User;
use Storage;
use Illuminate\Http\Request;
use Auth;

class BackendController extends Controller
{
  public function dashboard(){
      return view('backend.dashboard');
  }
  public function specialities(){
      $specialities = Speciality::get();
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
  public function doctors(){
    $specialities = Speciality::where('status','active')->get();
    $doctors = User::with('speciality')->where('role','doctor')->get();
      return view('backend.doctors' ,compact('specialities','doctors'));
  }
  public function addDoctor(){
      $specialities = Speciality::where('status','active')->get();
      $doctors = User::with('speciality')->where('role','doctor')->get();
      return view('backend.add_doctor',compact('specialities','doctors'));
  }
  public function storeDoctor(Request $request){
      extract($request->all());
      $request->validate([
          'name'=>'required',
          'email'=> 'required',
          'password'=>'required'
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
    public function doctorChangeStatus(Request $request){
        extract($request->all());
        if (User::where('role','doctor')->where('id', $speciality_id)->update(['status'=>$speciality_status])) {
            return true;
        }else{
            return false;
        }
    }
    public function patients(){
      $patients = User::where('role','patient')->where('status','active')->get();
       return view('backend.patients',compact('patients'));
    }
    public function patientChangeStatus(Request $request){
        extract($request->all());
        if(User::where('role','patient')->where('id', $speciality_id)->update(['status'=>$speciality_status])) {
            return true;
        }else{
            return false;
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
    $appointments = BookAppointment::get();
      return view('backend.appointments',compact('appointments'));
  }
  public function doctorDashboard(){
      $doctors = Auth::user()->where('role','doctor')->where('status','active')->get();
      return view('doctor.doctor_dashboard' , compact('doctors'));
  }
  public function doctorMyAppointments(){
     $myAppointments = BookAppointment::get();
      return view('doctor.my_appointments',compact('myAppointments'));
  }
  public function myProfile(){
      $id = Auth::id();
      $doctorEducations = DoctorEducation::where('doctor_id', $id)->get();
      $doctorExperiences = DoctorExperience::where('doctor_id', $id)->get();
      $doctorAwards = DoctorAward::where('doctor_id', $id)->get();
      return view('doctor.my_profile',compact('doctorEducations','doctorExperiences','doctorAwards'));
  }
  public function updateDoctorProfile(Request $request){
//      return $request->all();
      extract($request->all());
//      $request->validate([
//         'phone' => 'required',
//          'age' => 'required',
//          'address'=>'required',
//      ]);
      $path = null;
      if ($request->hasFile('image')) {
          $path = Storage::disk('website')->putFile('Users', $request->file('image'));
      } else {
          $path = Auth::user()->image;
      }
      User::where('id',Auth::id())->update([
          'image'=>$path ,
          'phone'=>$phone ,
          'address'=>$address ,
          'fees'=>$fees,
          'bio'=>$bio ,
          'age'=>$age,
      ]);

      if(isset($education)){
          foreach ($education['degree'] as $key=>$item) {
              DoctorEducation::updateOrCreate([
                  $education['id'][$key]
              ],[
                     'doctor_id'=> Auth::user()->id,
                     'degree' => $item,
                     'collage' => $education['collage'][$key],
                     'year'=> $education['year'][$key],
                 ]);
            }
        }
          if(isset($experience)) {
              foreach ($experience['hospital_name'] as $key => $item) {
                  DoctorExperience::updateOrCreate([
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
                      DoctorAward::updateOrCreate([
                          'doctor_id' => Auth::user()->id,
                          'award_title' => $item,
                          'award_year' => $award['award_year'][$key],
                      ]);
                  }
          }
             return redirect(url('my_profile'))->with(['type' => 'success', 'title' => 'Success', 'message' => 'User updated successfully']);
  }
  public function patientDashboard(){
    $myAppointments = BookAppointment::get();
      $patients = Auth::user()->where('role','patient')->where('status','active')->get();
      return view('patient.patient_dashboard',compact('patients','myAppointments'));
  }

}
