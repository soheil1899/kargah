<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\W_resworkshop;
use App\W_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WuserController extends Controller
{
    public function index()
    {
        return view('admin.wuser');
    }

    public function getwusers()
    {
        $wusers = W_user::all();

        return $wusers;
    }


    public function savewuser(Request $request)
    {
        if ($request->editflag != false) {
            $this->validate($request, [
                'name' => 'required',
                'family' => 'required',
                'mobile' => 'required',
            ]);
            $wuser = W_user::where('id', $request->id)->first();
            $save = User::where('id', $request->$wuser['user_id'])->first();
            if ($request->passwordedit == true) {
                $save->password = bcrypt($request->password);
            }

        } else {
            $this->validate($request, [
                'name' => 'required',
                'family' => 'required',
                'mobile' => 'required',
                'password' => 'required|min:8',
            ]);
            $save = new User();
            $save->password = bcrypt($request->password);
        }

        $save->name = $request->name;
        $save->mobile = $request->mobile;
        $save->email = $request->email;
        $save->save();



        if ($request->editflag != false) {
            $save2 = W_user::where('id', $request->id)->first();
            if ($request->passwordedit == true) {
                $save2->password = bcrypt($request->password);
            }

        } else {
            $save2 = new W_user();
            $save2->password = bcrypt($request->password);
        }

        $save2->name = $request->name;
        $save2->family = $request->family;
        $save2->mobile = $request->mobile;
        $save2->phone = $request->phone;
        $save2->address = $request->address;
        $save2->major = $request->major;
        $save2->nationalcode = $request->nationalcode;
        $save2->university = $request->university;
        $save2->birthday = $request->birthday;
        $save2->grade = $request->grade;
        $save2->gender = $request->gender;
        $save2->email = $request->email;
        $save2->user_id = $save->id;


        $save2->save();

    }


    public function wuserinfo($id)
    {
        return view('admin.wuserinfo', compact('id'));
    }

    public function getwuserinfo(Request $request)
    {
        return W_user::where('id', $request->id)->with('resworkshops.workshop')->first();
    }










}
