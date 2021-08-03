<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\student;
use App\Models\moderator;
use App\Models\instructor;
use App\Models\User;
use Illuminate\Support\Carbon;


class editRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|min:3',
            'email'     => 'required',
            'contact'   => 'required|regex:/(01)[0-9]{9}/',
            'address'   => 'required'
            // 'password'  => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            // 'oldpass'   => 'required',
            // 'newpass'   => 'required',
            // 'confirmpass'=>'required|same:newpass'
        ];
    }

    // public function messages(){
    //     return [
    //         'cpassword.required' => 'Confirm Password Required',
    //         'cpassword.same'     => 'Confirm Password Dose Not Match'
    //     ];
    // }
}

