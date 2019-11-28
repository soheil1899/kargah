<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\workshopResource;
use App\W_resworkshop;
use App\W_workshop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;


class WorkshopController extends Controller
{
    public function index()
    {
        $adminid = auth()->user()->id;
        if ($adminid == 2 || $adminid == 1) {
            $admin = 1;
        }else{
            $admin = 2;
        }
        return view('admin.workshop', compact('admin'));
    }

    public function getworkshops(Request $request)
    {
        $adminid = auth()->user()->id;
        if ($adminid == 2 || $adminid == 1){
            $workshops = W_workshop::where('hidden', 1)->with('resworkshops')->orderBy('id', 'desc')->paginate(20);
            $finalworkshops = workshopResource::collection($workshops);


        }else{
            $workshops = W_workshop::where([['admin_id', $adminid],['publish', 0], ['hidden', 1]])->with('resworkshops')->orderBy('id', 'desc')->paginate(20);
            $finalworkshops = workshopResource::collection($workshops);

        }

        return $finalworkshops;
    }


    public function saveworkshop(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'status' => 'required',
            'price' => 'required',
        ]);

        if ($request->editflag != false) {
            $save = W_workshop::where('id', $request->id)->first();
        } else {
            $save = new W_workshop();
        }

        $save->title = $request->title;
        $save->status = $request->status;
        $save->time = $request->time;
        $save->target = $request->target;
        $save->capacity = $request->capacity;
        $save->gender = $request->gender;
        $save->startregister = $request->startregister;
        $save->endregister = $request->endregister;
        $save->place = $request->place;
        $save->date = $request->date;
        $save->firstclass = $request->firstclass;
        $save->teacher = $request->teacher;
        $save->price = $request->price;
        $save->poster = $request->poster;
        $save->description = $request->description;
        $save->admin_id = auth()->user()->id;


        $save->save();

    }

    public function savedescription(Request $request)
    {
        W_workshop::where('id', $request->workshopid)->update(['description' => $request->des]);
    }


    public function savewrokshopimage(Request $request)
    {
        $workshopid = $request->workshopid;

        $image = new ImageManager();
        $image->make($request->image->getRealPath())->save(public_path() . '/media/workshop/' . $workshopid . '_poster.png');

        W_workshop::where('id', $request->workshopid)->update(['poster' => 1]);
    }

    public function changepublishworkshop(Request $request)
    {
        W_workshop::where('id', $request->id)->update(['publish' => $request->publish]);
    }

    public function getworkshopusers(Request $request)
    {
        $users = W_resworkshop::where('w_workshop_id', $request->id)->with('wuser')->get();

        return $users;
    }
    public function deleteworkshop(Request $request)
    {
        W_workshop::where('id', $request->id)->update(['hidden' => 2]);
    }



}
