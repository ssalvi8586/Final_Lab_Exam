<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\editRequest;
use App\Models\User;
use App\Models\Slink;
use App\Models\Post;
use App\Models\moderator;
use App\Models\Student;
use App\Models\Instructor;
use App\Models\Admin;
use App\Models\Qualification;
use Illuminate\Support\Carbon;
use Validator;


class UserController extends Controller
{
    public function view(Request $req, $uname)
    {
        $tempUser = User::where('uname', $uname)
            ->first();
        $slinks = Slink::where('fr_user_id', $tempUser->id)->get();

        $tempIns = Instructor::where('fr_user_id', $tempUser->id)
            ->first();

            $posts = PostController::all()->where('fr_user_id', $tempUser->id);
            $user = User::with($tempUser->type)->where('uname', $uname)->first();
            //dd($user);
            if(session()->get('type')=='instructor'){
                $qalifications = Qualification::where('fr_instructor_id', $tempIns->id)->get();
                return view('profile.view')->with('user', $user)
                    ->with('type', $tempUser->type)
                    ->with('posts', $posts)
                    ->with('slinks', $slinks)
                    ->with('qualifications', $qalifications);
            }else{
                return view('profile.view')->with('user', $user)
                    ->with('type', $tempUser->type)
                    ->with('posts', $posts)
                    ->with('slinks', $slinks);
            }
    }

public function apiview($uname){
    $tempUser = User::where('uname', $uname)
            ->first();
            return $tempUser;
}
public function apiviewall(){
    return  User::all();
}


    public function edit(Request $req)
    {

        $tempUser = User::where('uname', $req->session()->get('uname'))
            ->first();
        $slinks = Slink::where('fr_user_id', $tempUser->id)->get();
        $user = User::with($tempUser->type)->where('uname', $req->session()->get('uname'))->first();
        return view('profile.edit')->with('user', $user)
            ->with('type', $tempUser->type)
            ->with('slinks', $slinks);
    }

    public function update(Request $req)
    {

        // $user = User::where('uname', $req->session()->get('uname'))
        // ->first();

        // $type = $user->type;
        // $name = User::with($type)->where('uname',$req->input('uname'))->first();
        // dd($user);


        // $type = $user->type;

    if($req->has('form1')){
        $type = $req->session()->get('type');
        $req->validate([
            'name'      => 'required|min:3',
            'email'     => 'required',
            'contact'   => 'required|regex:/(01)[0-9]{9}/',
            'address'   => 'required'
            ]);


        //dd($type);
        if ($type == 'moderator') {
            moderator::where('fr_user_id', $req->session()->get('id'))
                ->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'address' => $req->address,
                    'updated_at' => Carbon::now(),
                    'contact' => $req->contact
                ]);

            $req->session()->flash('msg', 'Update Successful');
            return redirect()->route('profile.edit');
            //return view('profile.edit');
        } elseif ($type == 'instructor') {
            student::where('fr_user_id', $req->session()->get('id'))
                ->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'address' => $req->address,
                    'updated_at' => Carbon::now(),
                    'contact' => $req->contact
                ]);

            $req->session()->flash('msg', 'Update Successful');
            return redirect()->route('profile.edit');
            //return view('profile.edit');
        } elseif ($type == 'student') {
            student::where('fr_user_id', $req->session()->get('id'))
                ->update([
                    'name'       => $req->name,
                    'email'      => $req->email,
                    'address'    => $req->address,
                    'updated_at' => Carbon::now(),
                    'contact'    => $req->contact
                ]);

            $req->session()->flash('msg', 'Update Successful');
            return redirect()->route('profile.edit');
            //return view('profile.edit');
        }
    }

    elseif($req->has('form2')){
        $req->validate([
            'oldpass'       => 'required',
            'newpass'       => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'confirmpass'   => 'required|same:newpass'
            ]);
       if($req->newpass!=null){
            if($req->newpass===$req->confirmpass){
                    $user = User::where('uname', $req->session()->get('uname'))


                    ->first();
                $password = $user->password;

                if ($req->oldpass == $password) {
                    User::where('uname', $req->session()->get('uname'))
                        ->update([
                            'password' => $req->newpass
                        ]);
                    $req->session()->flash('msg', 'Update Successful');
                    return redirect()->route('profile.edit');
                } else {
                    $req->session()->flash('error', 'Give Old Password');
                    return redirect()->route('profile.edit');
                }
            } else {
                $req->session()->flash('error', 'Confirm New Password Correctly');
                return redirect()->route('profile.edit');
            }

        }
        else{

            $req->session()->flash('error', 'Fill All the Fields');
            return redirect()->route('profile.edit');
        }
    }




    elseif($req->has('delete')){


        $user = User::where('uname', $req->session()->get('uname'))
                    ->first();
                $password = $user->password;

                $req->validate([

                    'confirmpass'   => 'required'
                    ]);
                if ($req->confirmpass === $password) {
                    //dd($user);
                    $user->delete();

                        $req->session()->flush();
                        $req->session()->flash('error', 'Sorry to see you go. Register again to start a new journey ;)');
                        return redirect()->route('registration.index');

                    }




    }








    }




}
