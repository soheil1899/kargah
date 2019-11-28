<?php

namespace App\Http\Controllers\Client;

use App\Article;
use App\Contactus;
use App\Gallery;
use App\Http\Resources\workshopResource;
use App\Image;
use App\Setting;
use App\Slider;
use App\User;
use App\W_resworkshop;
use App\W_user;
use App\W_workshop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{

    public function welcome()
    {
        $setting = Setting::where('id', 1)->first();
        return view('welcome', compact('setting'));
    }

    public function getslider()
    {
        return Image::where('slider_id', 1)->get();
    }

    public function getlastworkshop()
    {
        return W_workshop::where('publish', 1)->orderBy('id', 'desc')->limit(8)->get();
    }

    public function register()
    {
        $setting = Setting::where('id', 1)->first();
        return view('register', compact('setting'));
    }

    public function saveuser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'family' => 'required',
            'mobile' => 'required',
            'password' => 'required|min:8',
        ]);
        $save = new User();
        $save->password = bcrypt($request->password);

        $save->name = $request->name;
        $save->mobile = $request->mobile;
        $save->email = $request->email;
        $save->save();


        $save2 = new W_user();
        $save2->password = bcrypt($request->password);

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


    public function login()
    {
        $setting = Setting::where('id', 1)->first();

        return view('loginwu', compact('setting'));
    }


    public function workshop()
    {
        $setting = Setting::where('id', 1)->first();

        return view('workshop', compact('setting'));
    }

    public function getworkshops(Request $request)
    {
        $workshop = W_workshop::where('publish', 1)->orderBy('id', 'desc')->paginate(10);
        return workshopResource::collection($workshop);
    }

    public function workshopinfo($id)
    {
        $setting = Setting::where('id', 1)->first();

        return view('workshopinfo', compact('id', 'setting'));
    }

    public function getworkshopinfo(Request $request)
    {
        $workshop = W_workshop::where('id', $request->id)->first();

        $date = new \jDateTime(true, true, 'Asia/Tehran');
        $now = $date->date("Y/m/d", false, false);

        $res = count(W_resworkshop::where('w_workshop_id', $request->workshop['id'])->get());
        if ($res < $request->workshop['capacity']) {
            W_workshop::where('id', $request->id)->update(['status'=>'ثبت نام']);
        } else {
            W_workshop::where('id', $request->id)->update(['status'=>'تکمیل ظرفیت']);
        }

        if (strtotime($workshop['endregister']) >= strtotime($now)){
            W_workshop::where('id', $request->id)->update(['status'=>'ثبت نام']);
            $workshop = W_workshop::where('id', $request->id)->first();
            return $workshop;
        }else{
            W_workshop::where('id', $request->id)->update(['status'=>'پایان ثبت نام']);
            $workshop = W_workshop::where('id', $request->id)->first();
            return $workshop;
        }


    }

    public function reserveworkshop($id, Request $request)
    {
        $workshop = W_workshop::where('id', $id)->first();
        $setting = Setting::where('id', 1)->first();


        $reserve['workshop_id'] = $workshop['id'];
        $reserve['workshop'] = $workshop['title'];
        $reserve['price'] = $workshop['price'];
        $reserve['user_id'] = auth()->user()->id;
        $reserve['mobile'] = auth()->user()->mobile;

        $request->session()->put('reserve', $reserve);

        return view('reservedetail', compact('id', 'setting'));
    }

    public function onlinepay(Request $request)
    {
        $reserve = $request->session()->get('reserve');

        $duplicate = W_resworkshop::where([['w_user_id', auth()->user()->id], ['w_workshop_id', $request->workshop['id']]])->first();
        if ($duplicate == null) {
            $res = count(W_resworkshop::where('w_workshop_id', $request->workshop['id'])->get());
            if ($res < $request->workshop['capacity']) {
                return 'pay';
            } else {
                return 'nopay';
            }
        } else {
            return 'duplicate';
        }


    }

    public function gallery()
    {
        $setting = Setting::where('id', 1)->first();

        return view('galley', compact('setting'));
    }

    public function about()
    {
        $setting = Setting::where('id', 1)->first();

        return view('about', compact('setting'));
    }

    public function contact()
    {
        $setting = Setting::where('id', 1)->first();

        return view('contact', compact('setting'));
    }

    public function getgallery()
    {
        $article = Article::where('article_group_id', 1)->with('galleries')->paginate(4);
        return workshopResource::collection($article);
    }

    public function getabout()
    {
        return Article::where('article_group_id', 2)->with('contents')->first();
    }

    public function getsetting()
    {
        return Setting::where('id', 1)->first();
    }

    public function sendpost(Request $request)
    {
        $save = new Contactus();
        $save->name = $request->name;
        $save->family = $request->family;
        $save->mobile = $request->mobile;
        $save->message = $request->text;

        $save->save();
    }

    public function account()
    {
        $setting = Setting::where('id', 1)->first();

        if (auth()->user()->id < 5) {
            return redirect()->back();
        } else {
            return view('account', compact('setting'));
        }
    }

    public function getaccount()
    {
        $userid = auth()->user()->id;
        $userinfo = W_user::where('user_id', $userid)->with('resworkshops.workshop')->first();
        return $userinfo;
    }

    public function saveaccount(Request $request)
    {
        if (1 == 1) {
            $user = User::where('id', auth()->user()->id)->first();
            $user->name = $request->account['name'];
            $user->email = $request->account['email'];
            $user->mobile = $request->account['mobile'];

            $wuser = W_user::where('user_id', auth()->user()->id)->first();
            $wuser->name = $request->account['name'];
            $wuser->family = $request->account['family'];
            $wuser->mobile = $request->account['mobile'];
            $wuser->phone = $request->account['phone'];
            $wuser->address = $request->account['address'];
            $wuser->major = $request->account['major'];
            $wuser->nationalcode = $request->account['nationalcode'];
            $wuser->university = $request->account['university'];
            $wuser->birthday = $request->account['birthday'];
            $wuser->grade = $request->account['grade'];
            $wuser->gender = $request->account['gender'];
            $wuser->email = $request->account['email'];

            if ($request->passwordedit) {
                if (Hash::check($request->lastpass, $request->account['password'])) {
                    $user->password = bcrypt($request->password);
                    $wuser->password = bcrypt($request->password);
                }
            }
        } else {
            $user = new User();
            $wuser = new W_user();
        }

        $user->save();
        $wuser->save();
    }

}
