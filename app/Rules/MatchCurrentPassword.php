<?php

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class MatchCurrentPassword implements Rule
{


    public function __construct()
    {
        //
    }



    public function passes($attribute, $value)
    {
        return Hash::check($value, auth()->user()->password);
    }





    public function message()
    {
        return 'Current Password Does Not Match';
    }
}
