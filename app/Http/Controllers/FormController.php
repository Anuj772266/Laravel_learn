<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function userForm(UserRequest $req){
        // $validatedData = $req->validate([
        //     'username' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|alpha_num|min:6',
        //     'phone' => 'required|numeric',
        //     'age' => 'required|numeric|min:18',
        //     'city' => 'required|not_in:default',

        // ],[
        //     "username.required" => 'User Name is requried!',
        //     "email.required" => 'User email is requried!',
        //     "email.email" => 'Enter your correct email address',
        //     "password.required" => 'User password is requried!',
        //     "phone.required" => 'User phone is requried!',
        //     "age.required" => 'User age is requried!',
        //     "age.min:18" => 'User age showuld not less then 18 years old!',
        //     "city.required" => 'User city is requried!',

        // ]);

        // Return the validated data
        // return $req->all();
        return $req->except(['username', 'email']);
    }
}
