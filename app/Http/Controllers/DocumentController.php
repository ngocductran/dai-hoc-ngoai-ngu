<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\Room;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function getDocument()
    {
        $documents = Document::all();
        return view('admin.dashboard.document.list', ['documents' => $documents]);
    }

    public function getDocumentCreate(){
        $rooms = Room::all();
        return view('admin.dashboard.document.create', ['rooms' => $rooms]);
    }
 
    public function postDocumentCreate(DocumentRequest $request)
    {
        if($request -> hasFile('file')){

            $fileName = $request->file('file')->getClientOriginalName();

            $file = $request -> file('file');
            
            $file -> move('assets/file',$fileName);
            $path = 'assets/file/'.$fileName;
            
            $document = new Document;
 
            $document->name = $request->input('name');
            $document->user_id = 1;
            $document->room_id = $request->input('room');;
            $document->file = $path;
     
            $document->save();

            return redirect()->route('get.document')->with('success', 'File Has been uploaded successfully in laravel 8');
     
        }
        return back()->with("error","Bạn chưa chọn file");
    }


    public function getDocumentDelete($id){
        $document = Document::find($id);
        $document->delete();
        return redirect()->back()->with('success','Đã xóa tài liệu');
    }
}
