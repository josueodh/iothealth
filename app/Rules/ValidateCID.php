<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Cid;

class ValidateCID implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($patient)
    {
        $this->cid = explode(',', $patient->cid_id);

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cid = Cid::all();
       foreach($this->cid as $cidInput){
            $result = $cid->where('code', $cidInput)->count();
            if($result == 0 ){
                return $result;
            }
       }
       return 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O código do CID não foi preenchido da forma adequada.';
    }
}
