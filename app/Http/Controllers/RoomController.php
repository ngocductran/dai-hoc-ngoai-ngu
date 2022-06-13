<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    public function getRoom()
    {
        $rooms = Room::all();
        return view('admin.dashboard.room.list', ['rooms' => $rooms]);
    }

    public function getRoomCreate(){
        return view('admin.dashboard.room.create');
    }

    public function postRoomCreate(RoomRequest $request){
        if($request -> hasFile('avatar')){
            $file = $request -> file('avatar');
            $fileType = $file -> getClientOriginalExtension('avatar');

            $AvatarName = 'avatar_'.rand().'.'.$fileType;
            $file -> move('assets/images/rooms',$AvatarName);
            $urlAvatar = 'assets/images/rooms/'.$AvatarName;

            $room = new Room;
            $room->name = $request->input('name');
            $room->phone = $request->input('phone');
            $room->address = $request->input('address');
            $room->email = $request->input('email');
            $room->intro = $request->input('intro');
            $room->website = Str::of($request->input('name'))->slug('-');
            $room->avatar = $urlAvatar;
            $room->user_id = 1;

            $room->save();

            return redirect()->route('get.room')->with('success', 'Thêm phòng ban thành công.');;
        }
        return back()->with("error","Bạn chưa chọn ảnh");
    }


    public function getRoomEdit($id)
    {
        $room = room::find($id);
        return view('admin.dashboard.room.edit', compact('room'));
    }

    public function postRoomEdit(Request $request, $id)
    {
        $room = Room::find($id);

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',Rule::unique('rooms')->ignore($room->id),
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ],[
            'name.required' => 'Vui lòng nhập tên phòng',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại trong hệ thống',
            'avatar.image' => 'Vui lòng chọn hình ảnh',
            'avatar.mimes' => 'Hình ảnh phải có định dạng jpg, png, jpeg, gif, svg',
        ]);

        if($request -> hasFile('avatar')){
            $file = $request -> file('avatar');
            $fileType = $file -> getClientOriginalExtension('avatar');

            $AvatarName = 'avatar_'.rand().'.'.$fileType;
            $file -> move('assets/images/rooms',$AvatarName);
            $urlAvatar = 'assets/images/rooms/'.$AvatarName;

            $room->name = $request->input('name');
            $room->phone = $request->input('phone');
            $room->address = $request->input('address');
            $room->email = $request->input('email');
            $room->intro = $request->input('intro');
            $room->website = Str::of($request->input('name'))->slug('-');
            $room->avatar = $urlAvatar;
            $room->user_id = 1;

            $room->update();

            return redirect()->route('get.room')->with('success', 'Chỉnh sửa phòng ban thành công.');;
        }

        return back()->with("error","Bạn chưa chọn ảnh");
    }

    public function getRoomDelete($id){
        $room = Room::find($id);
        $room->delete();
        return redirect()->back()->with('success','Xóa phòng thành công');
    }
}
