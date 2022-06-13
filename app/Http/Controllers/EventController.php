<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function getEvent()
    {
        $events = Event::all();
        return view('admin.dashboard.event.list', ['events' => $events]);
    }

    public function getEventCreate(){
        return view('admin.dashboard.event.create');
    }

    public function postEventCreate(EventRequest $request){
        if($request -> hasFile('avatar')){
            $file = $request -> file('avatar');
            $fileType = $file -> getClientOriginalExtension('avatar');

            $AvatarName = 'avatar_'.rand().'.'.$fileType;
            $file -> move('assets/images/event',$AvatarName);
            $urlAvatar = 'assets/images/event/'.$AvatarName;

            $event = new Event;
            $event->name = $request->input('name');
            $event->content = $request->input('content');
            $event->image = $urlAvatar;
            $event->user_id = 1;

            $event->save();

            return redirect()->route('get.event')->with('success', 'Thêm sự kiện thành công.');;
        }
        return back()->with("error","Bạn chưa chọn ảnh");
    }

    public function getEventDelete($id){
        $event = Event::find($id);
        $event->delete();
        return redirect()->back()->with('success','Xóa sự kiện thành công');
    }
}
