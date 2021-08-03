<?php

namespace App\Http\Controllers;

use App\Http\Requests\modRegistrationRequest;
use App\Http\Requests\studentRegistrationRequest;
use App\Http\Requests\instructorRegistrationRequest;
use Illuminate\Http\Request;
use App\Models\moderator;
use App\Models\student;
use App\Models\instructor;
use App\Models\User;
use Illuminate\Support\Carbon;


class RegistrationController extends Controller
{
    public function index(){
        return view('registration.index');
    }
    public function studentindex(){
        return view('registration.student');
    }
    public function instructorindex(){
        return view('registration.instructor');
    }
    public function moderatorindex(){
        return view('registration.moderator');
    }

    // ---------------Student Registration Validation------------------
    public function studentverify(studentRegistrationRequest $req){

        $imgName = $req->uname.'.'.$req->image->getClientOriginalExtension();
        user::insert([
            'uname' => $req->uname,
            'password' => $req->password,
            'type' => 'student',
            'status' => 1,
            'created_at' => Carbon::now()

        ]);
        //Last Id of user table
        $getUser = user::orderby('id', 'desc')->first();
        $lastId = $getUser['id'];
        student::insert([
            'name' => $req->fullName,
            'email' => $req->email,
            'address' => $req->address,
            'created_at' => Carbon::now(),
            'contact' => $req->contact,
            'level' => $req->level,
            'image' => $req->uname.'.'.$req->image->getClientOriginalExtension(),
            'fr_user_id' => $lastId
        ]);

            $file = $req->file('image');
            $file->move('upload',$imgName);

        $req->session()->flash('msg', 'Registration Successful');
        return redirect()->route('login.index');

    }


    // ---------------instructor Registration Validation------------------


    public function instructorverify(instructorRegistrationRequest $req){

        $imgName = $req->uname.'.'.$req->image->getClientOriginalExtension();
        user::insert([
            'uname' => $req->uname,
            'password' => $req->password,
            'type' => 'instructor',
            'status' => 4,
            'created_at' => Carbon::now()

        ]);
        //Last Id of user table
        $getUser = user::orderby('id', 'desc')->first();
        $lastId = $getUser['id'];
        instructor::insert([
            'name' => $req->fullName,
            'email' => $req->email,
            'address' => $req->address,
            'created_at' => Carbon::now(),
            'contact' => $req->contact,
            'image' => $req->uname.'.'.$req->image->getClientOriginalExtension(),
            'fr_user_id' => $lastId
        ]);

            $file = $req->file('image');
            $file->move('upload',$imgName);

        $req->session()->flash('msg', 'Registration Successful');
        return redirect()->route('login.index');
    }

     // ---------------Moderator Registration Validation------------------
    public function moderatorverify(modRegistrationRequest $req){
        $imgName = $req->uname.'.'.$req->image->getClientOriginalExtension();
        user::insert([
            'uname' => $req->input('uname'),
            'password' => $req->password,
            'type' => 'moderator',
            'status' => 4,
            'created_at' => Carbon::now()

        ]);
        //Last Id of user table
        $getUser = user::orderby('id', 'desc')->first();
        $lastId = $getUser['id'];
        moderator::insert([
            'name' => $req->fullName,
            'email' => $req->email,
            'created_at' => Carbon::now(),
            'contact' => $req->contact,
            'address' => $req->address,
            'image' => $req->uname.'.'.$req->image->getClientOriginalExtension(),

            'fr_user_id' => $lastId
        ]);

            $file = $req->file('image');
            $file->move('upload',$imgName);



        $req->session()->flash('msg', 'Registration Application Successful');
        return redirect()->route('login.index');
    }
}
