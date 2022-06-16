<?php

namespace App\Http\Controllers;

use App\Models\Intro;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\IntroRequest;

class IntroController extends Controller
{
    public function getIntro()
    {
        $intros = Intro::all();
        return view('admin.dashboard.intro.list', ['intros' => $intros]);
    }

    public function getIntroCreate(){
        return view('admin.dashboard.intro.create');
    }

    public function postIntroCreate(IntroRequest $request){
        if($request -> hasFile('file')){
            $file = $request -> file('file');
            $fileType = $file -> getClientOriginalExtension('file');

            $pathname = 'file_'.rand().'.'.$fileType;
            $file -> move('assets/images/intros',$pathname);
            $path = 'assets/images/intros/'.$pathname;
        }else{
            $path = "";
        }

        $intro = new Intro;
        $intro->name = $request->input('name');
        $intro->content = $request->input('content');
        $intro->file = $path;
        $intro->user_id = 1;

        $intro->save();

        return redirect()->route('get.intro')->with('success', 'Thêm giới thiệu thành công.');
    }


    public function getIntroDelete($id){
        $intro = Intro::find($id);
        $intro->delete();
        return redirect()->back()->with('success','Xóa thành công');
    }
}
