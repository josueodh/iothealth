<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cid extends Model
{
    protected $guarded = ['id','created_at','updated_at'];
    
    public function patients(){
        return $this->belongsToMany('App\Patient','patients_cids', 'patient_id', 'cid_id');
    }
}
