<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function measurements(){
        return $this->hasMany('App\Measurement');
    }

    public function diaries(){
        return $this->hasMany('App\Diary');
    }

    public function cids(){
        return $this->belongsToMany('App\Cid','cids_patients','patient_id','cid_id');
    }
    
    public function getAdressAttribute(){
        $adress = $this->street . ',' . $this->number;
        if($this->complement){
            $adress = $adress . '-' . $this->complement;
        }
        $adress = $adress . ' ,' . $this->neighborhood . ',' . $this->city . ',' . $this->cep ;
        return $adress;
    }

    public function getDiaryLabelAttribute(){
        $label = $this->diaries->pluck('date');
        foreach($label as $key => $day){
            $label[$key] = date('d', strtotime($day));
        }
        return $label;
    }

    public function getMeasurementLabelAttribute(){
        $label = $this->measurements->pluck('time');
        foreach($label as $key => $time){
            $label[$key] = date('H:i', strtotime($time));
        }
        return $label;
    }

}
