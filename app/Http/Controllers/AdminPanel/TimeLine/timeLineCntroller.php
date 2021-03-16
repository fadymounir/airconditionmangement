<?php

namespace App\Http\Controllers\AdminPanel\TimeLine;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Acaronlex\LaravelCalendar\Calendar;

class timeLineCntroller extends Controller
{
    public function index(){
        $events = [];
        $orders=Order::where('service_type','other')->where('date_action','>=',Carbon::now()->subWeek())->select('id','name','date_action','service_type')->get();

        foreach ($orders as $row){
            $events[] = \Calendar::event(
                $row->orderName()."..".$row->name,
                false, //full day event?
                Carbon::parse($row->date_action)->subHours(2),
                Carbon::parse($row->date_action)->subHours(2),
                1,
                [
                    'className'=>'btn btn-danger getInfo',
                    'url'=>'#'.$row->id
                ]
            );
        }


        $calendar = new Calendar();
        $calendar->addEvents($events)
            ->setOptions([
                'locale' => 'ar',
                'firstDay' => 0,
                'displayEventTime' => true,
                'selectable' => true,
                'initialView' => 'timeGridDay',
                'headerToolbar' => [
                    'end' => 'today next,prev dayGridMonth timeGridWeek timeGridDay'
                ]
            ]);
        $calendar->setId('1');
        $calendar->setCallbacks([
            'select' => 'function(selectionInfo){console.log(selectionInfo)}',
        ]);



         return view('dashboard.TimeLine.index',compact('calendar'));
    }
}
