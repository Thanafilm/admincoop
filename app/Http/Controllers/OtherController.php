<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Company;
use App\Models\Coopdetail;
use App\Models\Edusche;
use App\Models\Filedoc;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\News;
use App\Models\Schedule;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use RealRashid\SweetAlert\Facades\Alert;

use function Symfony\Component\String\b;

class OtherController extends Controller
{
    public function Dashboard()
    {
        // Auth()->user()->assignRole('admin');
        $news = News::all();
        $file = Filedoc::all();
        $gallery = Gallery::all();
        $category = Category::all();
        $company = Company::all();
        $subcate = Subcategory::all();
        $comchart = DB::table('company')
            ->select('year', DB::raw('count(*) as total'))
            ->groupBy('year')
            ->get();
        foreach ($comchart as $value) {
            $year[] = $value->year;
            $data[] = $value->total;
        }
        // dd($year);
        return view('dashboard', compact(
            'news',
            'file',
            'gallery',
            'category',
            'subcate',
            'company',
            'year',
            'data'
        ));
    }
    //----------------------------------------------------------//
    //----------------------->Webpage Management<-------------------------//
    public function Webpage(Request $request)
    {
        $webpage = Coopdetail::latest()->first();
        if ($webpage != null) {
            $input = $request->all();
            $webpage->fill($input)->save();
            Alert()->success('', 'บันทึกสำเร็จ');
            return back();
        } else {
            Coopdetail::create($request->all());
            Alert()->success('', 'บันทึกสำเร็จ');
            return back();
        }
    }

    public function WebpageForm()
    {
        $webpage = Coopdetail::latest()->first();
        return view('webpagemanage.webupdate', compact('webpage'));
    }

    public function Schedule(Request $request)
    {
        $schedule = Schedule::latest()->first();
        if ($schedule != null) {
            $schedule->fill($request->all())->save();
            Alert()->success('', 'บันทึกสำเร็จ');
            return back();
        } else {
            Schedule::create($request->all());
            Alert()->success('', 'บันทึกข้อมูลกำหนดการสำเร็จ');
            return back();
        }
    }
    public function ScheduleForm()
    {
        $schedule = Schedule::latest()->first();
        return view('webpagemanage.schedule', compact('schedule'));
    }

    public function Edusche(Request $request)
    {
        $schedule = Edusche::latest()->first();
        if ($schedule != null) {
            $schedule->fill($request->all())->save();
            Alert()->success('', 'บันทึกสำเร็จ');
            return back();
        } else {
            Edusche::create($request->all());
            Alert()->success('', 'บันทึกข้อมูลกำหนดการสำเร็จ');
            return back();
        }
    }
    public function EduForm()
    {
        $schedule = Edusche::latest()->first();
        return view('webpagemanage.edusche', compact('schedule'));
    }
    public function PostBanner(Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = rand() . '.' .  $image->getClientOriginalExtension();
            $image->move('/app/public/storage/banner/', $imageName);
            $ban = new Banner();
            $ban->image = $imageName;
            $ban->path = $request->path;
            $ban->save();
        }
        alert()->success('', 'บันทึกสำเร็จ');
        return back();
    }
    public function DeleteBanner($id)
    {
        $dir = '/app/public/storage/banner/';
        $images = Banner::findOrFail($id)->image;
        if (file_exists($dir . $images)) {
            unlink($dir . $images);
        }
        Banner::find($id)->delete();
        return back();
    }
    public function BannerForm()
    {
        $ban = Banner::all();
        // dd($ban);
        return view('webpagemanage.banner', compact('ban'));
    }
    //----------------------------------------------------------//
    //----------------------->Category Management<-------------------------//
    public function creatCategoryForm()
    {
        return view('category.createcategory');
    }
    public function creatCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->save();
        Alert()->success('เพิ่มหมวดหมู่สำเร็จ');
        return back();
    }

    public function listCategory(Request $request)
    {
        $category = Category::latest()->get();
        $sub = Subcategory::latest()->get();

        return view('category.listcategory', compact('category', 'sub'));
    }

    public function updateCategory(Request $request, $id)
    {
        $cate = Category::find($id);
        $cate->fill($request->all())->save();
        Alert::success('', 'แก้ไขสำเร็จ');
        return redirect('/category/list');
    }
    public function updateCategoryForm(Request $request, $id)
    {
        $categorys = Category::find($id);
        return view('category.update', compact('categorys'));
    }
    public function deleteCategory($id)
    {
        $cate = Category::find($id);
        $cate->delete();
        Alert::success('', 'ลบหมวดหมู่สำเร็จ');
        return back();
    }
    //----------------------------------------------------------//
    //----------------------->File Document Management<-------------------------//
    public function upFile($file, $dir)
    {
        $name = rand() . '.' .  $file->getClientOriginalExtension();
        $file->move($dir, $name);
        return $name;
    }

    public function UploadFiledoc(Request $request)
    {
        $request->validate([
            'filepath' => ['mimes:doc,pdf,docx,zip,csv,txt,xlx,xls,pdf']
        ], [

            'filepath.mimes' => 'ชนิดไฟล์เอกสารไม่ถูกต้อง',
            'filepath.max' => 'ไฟล์มีขนาดใหญ่เกินไป',
        ]);
        $doc = null;
        if ($request->file('filepath')) {
            $dir = "/app/public/storage/filedoc/";
            $doc = $this->upFile($request->file('filepath'), $dir);
        }
        $file = new Filedoc();
        $file->filename = $request->filename;
        $file->category_id = $request->category_id;
        $file->subcate_id = $request->subcate_id;
        $file->filepath = $doc;
        $file->save();

        Alert::success('', 'อัปโหลดสำเร็จ');
        return redirect('/filedoc/list');
    }

    public function upFileForm()
    {
        // $categorys = DB::table('category')->join('subcategory','subcategory.category_id','=','category.id')->get();
        $categorys = Category::all();
        // error_log($categorys);
        return view('filedocument.uploaddocfile', compact('categorys'));
    }
    public function listFiledoc()
    {

        $filedoc = DB::table('filedoc')
            ->join('category', 'category.id', '=', 'filedoc.category_id')
            ->join('subcategory', 'subcategory.id', '=', 'filedoc.subcate_id')
            ->get();
        // dd($file);

        return view('filedocument.listfile', compact('filedoc'));
    }
    public function fileDelete($id)
    {
        $file = Filedoc::find($id);
        $doc = "/app/public/storage/filedoc/" . $file->filepath;

        if (file_exists($doc)) {
            unlink($doc);
            $file->delete();
            Alert()->success('', 'ลบไฟล์เอกสารสำเร็จ');
            return back();
        } elseif ($file->filepath == null) {
            $file->delete();
            Alert()->success('', 'ลบไฟล์เอกสารสำเร็จ');
            return back();
        }
    }
    public function fileUpdate(Request $request, $id)
    {
        $doc = Filedoc::find($id);
        $fd = $doc->filepath;
        $doc->fill($request->all())->save();
        $request->validate([
            'filepath' => 'required',
            'filepath' => 'mimes:doc,pdf,docx,zip|max:8000'
        ]);
        if ($request->file('filepath')) {
            $dir = "/app/public/storage/filedoc/";
            if (file_exists($dir . $fd)) {
                unlink($dir . $fd);
            }
            $gg = $this->upFile($request->file('filepath'), $dir);
            $doc->filepath = $gg;
            $doc->save();
        }
        Alert()->success('', 'บันทึกการแก้ไขสำเร็จ');
        return back();
    }
    public function fileUpdateForm($id)
    {
        $file = Filedoc::find($id);
        $categorys = Category::all();

        return view('filedocument.update', compact('file', 'categorys'));
    }
    //---------------- Subcategoury-------------///
    public function getsubcategory($id)
    {
        echo json_encode(DB::table('subcategory')->where('category_id', $id)->get());
    }

    public function subcateCreate(Request $request)
    {
        $subcate = new Subcategory();
        $subcate->subname = $request->subname;
        $subcate->category_id = $request->category_id;
        $subcate->save();
        alert()->success('', 'เพิ่มสำเร็จ');
        return back();
    }
    public function subcateCreateForm()
    {
        $categorys = Category::latest()->get();
        return view('subcategory.createsubcate', compact('categorys'));
    }
    public function subcateList(Request $request)
    {
        // $sub = Subcategory::with('category')->get();
        $sub = Category::with('subcategory')->get();
        // foreach ($sub as $cate) {
        //     foreach ($cate->subcategory as  $value) {
        //         dd($value);
        //     }
        // }
        return view('subcategory.listsubcate', compact('sub'));
    }
    public function subcateUpdate(Request $request, $id)
    {
        $subcate = Subcategory::find($id);
        $subcate->fill($request->all());
        $subcate->save();
        Alert()->success('', 'แก้ไขสำเร็จ');
        return back();
    }
    public function subcateUpdateForm($id)
    {
        $sub = Subcategory::find($id);
        $categorys = Category::latest()->get();
        return view('subcategory.update', compact('sub', 'categorys'));
    }
    public function subcateDelete($id)
    {
        $sub = Subcategory::find($id);
        $sub->delete();
        Alert()->success('', 'ลบหมวดหมู่ย่อยสำเร็จ');
        return back();
    }


    //---------------Company----------------------------//
    public function companyCreate(Request $request)
    {
        $request->validate(
            [
                'suppbranch' => 'required',
            ],
            [
                'suppbranch.required' => 'กรุณาเลือกสาขาที่รองรับ'
            ]
        );
        $cdtail = null;
        if ($request->corpdetail) {
            $dir = "/app/public/storage/company/";
            $cdtail = $this->upFile($request->corpdetail, $dir);
        }
        $suppbranchs = $request->input('suppbranch');

        $branchaa = array();

        foreach ($suppbranchs as $sunday) {
            $branchaa[] = $sunday;
        }
        $corp = new Company();
        $corp->corpname = $request->corpname;
        $corp->suppbranch = json_encode($branchaa, JSON_UNESCAPED_SLASHES);
        $corp->address = $request->address;
        $corp->corpdetail = $cdtail;
        $corp->year = $request->year;
        $corp->save();
        Alert()->success('', 'บันทึกข้อมูลสถานประกอบการสำเร็จ');
        return redirect('/company/list');
    }
    public function companyCreateForm()
    {
        return view('company.create');
    }
    public function listCopmany(Request $request)
    {
        $corp = Company::all();

        return view('company.list', compact('corp'));
    }
    public function editCompany(Request $request, $id)
    {
        $coms = Company::find($id);
        $file = $coms->corpdetail;
        $dir = "/app/public/storage/company/";
        $coms->fill($request->all())->save();
        if ($request->corpdetail) {
            if (file_exists($dir . $file)) {
                unlink($dir . $file);
            }
            $cdtail = $this->upFile($request->corpdetail, $dir);
            $coms->corpdetail = $cdtail;
            $coms->save();
        }
        alert()->success('', 'บันทึกการแก้ไขสำเร็จ');
        return redirect('/company/list');
    }
    public function editCompanyForm($id)
    {
        $coms = Company::find($id);
        $br = json_decode($coms->suppbranch);
        return view('company.update', compact('coms', 'br'));
    }
    //-------------- NEws GALLERy--------------///-------------- NEws GALLERy--------------///
    public function listGall()
    {
        $gall = Gallery::latest()->get();
        return view('gallery.list', compact('gall'));
    }

    public function postGally(Request $request)
    {

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8000',
        ]);
        $post = new Gallery();
        $post->galleryname = $request->galleryname;
        $post->save();
        if ($request->file("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName =  rand() . '.' .  $file->getClientOriginalExtension();
                $request['gallery_id'] = $post->id;
                $request['image'] = $imageName;
                $file->move('/app/public/storage/gallery/', $imageName);
                Image::create($request->all());
            }
        }
        return redirect("/gallery/list");
    }
    public function postGallyNews(Request $request, $id)
    {
        $new = News::find($id);
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8000',
        ]);
        $post = new Gallery();
        $post->galleryname = $request->galleryname;
        $post->news_id = $new->id;
        $post->save();

        if ($request->file("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName =  rand() . '.' .  $file->getClientOriginalExtension();
                $request['gallery_id'] = $post->id;
                $request['image'] = $imageName;
                $file->move('/app/public/storage/gallery/', $imageName);
                Image::create($request->all());
            }
        }
        return redirect('/news/list');
    }
    public function Newsgal(Request $request, $id)
    {
        $new = News::find($id);
        // $gg = $new->id;
        return view('newsmanage.upgallnew', compact('new'));
    }
    public function FormGallery()
    {
        return view('gallery.uploadgallery');
    }
    public function upDateGallery(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8000',
        ]);
        $gall = Gallery::findOrFail($id);
        $gall->update([
            'galleryname' => $request->galleryname
        ]);
        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = rand() . '.' .  $file->getClientOriginalExtension();
                $request['gallery_id'] = $id;
                $request['image'] = $imageName;
                $file->move('/app/public/storage/gallery/', $imageName);
                Image::create($request->all());
            }
        }
        Alert()->success('', 'บันทึกสำเร็จ');
        return redirect('/gallery/list');
    }
    public function UpdateGalForm($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.update', compact('gallery'));
    }
    public function galDelete($id)
    {
        $gall = Gallery::findOrFail($id);
        $cover = $gall->coverimg;

        $dirg = "/app/public/storage/gallery/";

        $images = Image::where("gallery_id", $gall->id)->get();
        foreach ($images as $image) {
            if (file_exists($dirg . $image)) {
                unlink($dirg . $image);
            }
        }
        $gall->delete();
        return back();
        error_log('gg');
    }
    public function delImg($id)
    {
        $dir = "/app/public/storage/gallery/";
        $images = Image::findOrFail($id)->image;
        if (file_exists($dir . $images)) {
            unlink($dir . $images);
        }
        Image::find($id)->delete();
        return back();
    }
    // public function delCover($id)
    // {
    //     $cover = Gallery::find($id)->coverimg;
    //     $dir = "/app/public/storage/cover/";
    //     if ($cover != null) {
    //         if (file_exists($dir . $cover)) {
    //             unlink($dir . $cover);
    //         }
    //     }
    //     return back();
    // }
}
