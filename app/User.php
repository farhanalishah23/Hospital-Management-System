<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $appends = ['shortBio' ];
    public function getShortBioAttribute(){
        return \Illuminate\Support\Str::limit($this->bio, 120);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
    public function bookAppointments(){
        return $this->hasMany(BookAppointment::class, 'doctor_id' , 'id');
    }
    public function appointments(){
        return $this->hasMany(BookAppointment::class, 'patient_id' , 'id');
    }

    public function doctorAppointments(){
        return $this->hasMany(BookAppointment::class, 'doctor_id' , 'id');
    }
    public function patientAppointments(){
        return $this->hasMany(BookAppointment::class, 'patient_id' , 'id');
    }



}
