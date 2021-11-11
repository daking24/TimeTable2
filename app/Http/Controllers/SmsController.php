<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use App\Lesson;

class SmsController extends Controller
{
    public function index()
    {
        $weekdays=Lesson::WEEK_DAYS;
        $today=date('l');
        $lessons=Lesson::where('week_day',$today)->with('teacher', 'class')->get();
        $current_time=date('H:i:s', strtotime(now()));
        $thirty_minutes_from_now=date('H:i:s', strtotime(now() . '+30 minutes'));
        if ($lessons->count()>0) {
            foreach ($lessons as $lesson) {

                if ($lesson->start_time==$thirty_minutes_from_now) {
                    Nexmo::message()->send([
                        'to'   => $lesson->teacher->phone,
                        'from' => 'Time Table',
                        'text' => 'Time to prepare for your lesson at'.$lesson->class->name.' class',
                    ]);

                } elseif ($lesson->start_time==$current_time) {
                    Nexmo::message()->send([
                        'to'   => $lesson->teacher->phone,
                        'from' => 'Time Table',
                        'text' => 'Time to start your lesson at'.$lesson->class->name.' class',
                    ]);
                }
            }
        }


    }
}
