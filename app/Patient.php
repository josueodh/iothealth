<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getAdressAttribute(){
        $adress = $this->street . ',' . $this->number;
        if($this->complement){
            $adress = $adress . '-' . $this->complement;
        }
        $adress = $adress . ' ,' . $this->neighborhood . ',' . $this->city . ',' . $this->cep ;
        return $adress;
    }

    
}
