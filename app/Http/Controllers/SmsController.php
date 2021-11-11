<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function index()
    {
        $sms = Nexmo::message()->send([
            'to'   => '234reciever',
            'from' => 'sender',
            'text' => 'info',
        ]);


    }
}
