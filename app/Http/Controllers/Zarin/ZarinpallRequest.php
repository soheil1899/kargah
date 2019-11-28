<?php

namespace App\Http\Controllers\Zarin;

use App\Setting;
use App\W_resworkshop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Zarinpal\Zarinpal;

class ZarinpallRequest extends Controller
{
    private $MI = 'fe14eb0e-faee-11e9-9515-000c295eb8fc';
    public function requestpay(Request $request)
    {
        $zarinpal = new Zarinpal($this->MI);

        $workshop = $request->session()->get('reserve');
//        dd($workshop);
        $results = $zarinpal->request(
            'http://'.$request->getHttpHost() . '/zarincallback',          //required
            $workshop['price'],                                  //required
            $workshop['workshop'],                             //required
            'info@uniworkshop.com',                      //optional
            $workshop['mobile']                      //optional
        );


        echo json_encode($results);
        if (isset($results['Authority'])) {
            file_put_contents('Authority', $results['Authority']);
            $zarinpal->redirect();
        }
    }




    public function zarincallback(Request $request)
    {
        $setting = Setting::where('id', 1)->first();

        $zarinpal = new Zarinpal($this->MI);
        if ($request->Status == 'OK') {
            $workshop = $request->session()->get('reserve');

            $zarinpal->verify('1000', $request['Authority']);

            $reserve = new W_resworkshop();
            $reserve->w_user_id = $workshop['user_id'];
            $reserve->w_workshop_id = $workshop['workshop_id'];
            $reserve->price = $workshop['price'];
            $reserve->authority = substr($request->Authority, -9);
            $reserve->workshop = $workshop['workshop'];

            $reserve->save();

            $payment = true;

            return view('afterpay', compact('setting', 'payment', 'reserve'));


        }else{
            $payment = false;

            return view('afterpay', compact('setting', 'payment'));
        }
    }

}
