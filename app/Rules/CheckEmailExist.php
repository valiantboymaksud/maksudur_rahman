<?php

namespace App\Http\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class CheckEmailExist implements Rule
{

    public function __construct()
    {
        //
    }




    public function passes($attribute, $value)
    {
        return User::where('email', $value)->count() > 0;
    }





    
    public function message()
    {
        return 'This Email Does Not Exist';
    }
}
