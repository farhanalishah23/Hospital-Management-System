<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookAppointment extends Model
{
    protected $table = 'book_appointments';

    protected $guarded = [];

    public function doctor(){

        return $this->belongsTo(User::class, 'doctor_id', 'id');
   }

   public function patient(){
    return $this->belongsTo(User::class , 'patient_id' , 'id');
   }
    
}
