<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $guarded =[ 'id', 'created_at', 'updated_at'];

    public function patient(){
        return $this->belongsTo('App\Patient');
    }
}
