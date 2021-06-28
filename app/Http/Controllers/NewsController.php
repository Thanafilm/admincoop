<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    // Function Upload Image for All
    public function uploadimg($image, $dir)
    {
        $newname = time() . '.' . $image->getClientOriginalExtension();
        $image->move($dir, $newname);
        return $newname;
    }
    //---------------->Manage All Function News<----------------//
    //======>List All News<======//
    public function newsAll(Request $request)
    {
        $news = News::with('gallery','users')->get();
        $user=User::all();

        return view('newsmanage.listnews', compact('news','user'));
    }

    //======>Create News Post<======//
    public function newsCreate(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = null;
        if ($request->file('image')) {
            $dir = "/app/public/storage/image/";
            $image = $this->uploadimg($request->file('image'), $dir);
            if (!is_null($image)) {
                $news = new News;
                $news->topic = $request->topic;
                $news->user_id = Auth::user()->id;
                $news->image = $image;
                $news->description = $request->description;
                $news->save();
                Alert()->success('อัพโหลดสำเร็จ');
                return back();
            } else {
                return Redirect::back()->withErrors($request)->withInput();
                return redirect()->back()->withInput();
                Alert()->warning('', 'อัปโหลดไม่สำเร็จ');
            }
        }
    }

    //======>Update or Edit News Post<======//
    public function newsUpdate(Request $request, $id)
    {
        $news = News::find($id);
        $image = $news->image;
        $news->fill($request->all())->save();
        if ($request->image) {
            $dir = "storage/image/";
            if (file_exists($dir . $image)) {
                unlink($dir . $image);
            }
            $image =  $this->uploadimg($request->image, $dir);
            $news->image = $image;
            $news->save();
        }
        Alert()->success('บันทึกการแก้ไขสำเร็จ');
        return back();
    }
    //======>Delete News Post<======//
    public function newsDelete($id)
    {
        $news = News::find($id);
        $imagepath = "storage/image/" . $news->image;
        if (file_exists($imagepath)) {
            unlink($imagepath);
        }
        $news->delete();
        Alert()->success('ลบข่าวเรียบร้อย');
        return back();
    }
    public function newsCreateForm()
    {
        return view('newsmanage.createnews');
    }
    public function newsUpdateForm(Request $request, $id)
    {

        $news = News::with('users')->get()->find($id);

        $page = "News Update";

        return view('newsmanage.updatenews', compact('page', 'news'));
    }
    public function ckUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $dir = "/app/public/storage/ckupload";
            $filenametostore = $this->uploadimg($request->file('upload'), $dir);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/ckuploads/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
