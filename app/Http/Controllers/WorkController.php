<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Models\Event;
use App\Models\Room;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function getWork()
    {
        $works = Work::all();
        return view('admin.dashboard.work.list', ['works' => $works]);
    }

    public function getWorkCreate(){
        $users = User::all();
        $rooms = Room::all();
        $events = Event::all();
        return view('admin.dashboard.work.create', ['users' => $users, 'rooms' => $rooms, 'events' => $events]);
    }

    public function postWorkCreate(WorkRequest $request){
        
        $work = new Work;
        $work->name = $request->input('name');
        $work->note = $request->input('note');
        $work->user_id = $request->input('user');
        $work->room_id = $request->input('room');
        $work->event_id = $request->input('event');
        $work->date_start = $request->input('date_start');
        $work->date_end = $request->input('date_end');

        $work->save();

        return redirect()->route('get.work')->with('success', 'Thêm công việc thành công.');;
    }

    public function getWorkDelete($id){
        $work = Work::find($id);
        $work->delete();
        return redirect()->back()->with('success','Xóa sự kiện thành công');
    }
}
