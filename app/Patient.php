<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function measurements(){
        return $this->hasMany('App\Measurement');
    }


    public function cids(){
        return $this->belongsToMany('App\Cid','cids_patients','cid_id','patient_id');
    }
    
    public function getAdressAttribute(){
        $adress = $this->street . ',' . $this->number;
        if($this->complement){
            $adress = $adress . '-' . $this->complement;
        }
        $adress = $adress . ' ,' . $this->neighborhood . ',' . $this->city . ',' . $this->cep ;
        return $adress;
    }

    
}
