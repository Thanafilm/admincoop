<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Company;
use App\Models\Coopdetail;
use App\Models\Edusche;
use App\Models\Filedoc;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\News;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

use function PHPSTORM_META\map;

class ApiController extends Controller
{
      //---------------------API WEBPAGE----------------------//
    public function CoopDetal()
    {
        $coop = Coopdetail::latest()->get();
        return response()->json([
            "message" => "success",
            "data" => $coop
        ]);
    }
    public function EduSchedule()
    {
        $edu = Edusche::latest()->first();
        return response()->json([
            "message" => "success",
            "data" => $edu
        ]);
    }
    public function CoopSchedule()
    {
        $coopsche = Schedule::latest()->first();
        return response()->json([
            "message" => "success",
            "data" => $coopsche
        ]);
    }
    public function Banner()
    {
        $ban = Banner::all();
        $res = $ban->map(function ($item) {
            $data['image'] = env('APP_URL') . '/storage/banner/' . $item->image;
            $data['url'] = $item->path;
            return $data;
        });
        return response()->json(
            [
                'data' => $res
            ]
        );
    }
    //---------------------API FUNCTION----------------------//
    public function news(Request $request)
    {
        $news = News::query();
        $news
            ->orWhere('topic', 'LIKE', '%' . $request->input('search') . '%')
            ->orWhereBetween('created_at', [Carbon::parse($request->start_date)->toDateTimeString(), Carbon::parse($request->end_date)->toDateTimeString()]);

        $perpage = $request->input('limit') ?: 9;
        $total = $news->count();
        $page = $request->input('page') ?: 1;
        $news->offset(($page - 1) * $perpage)->limit($perpage)->get();
        $map = $news->get()->map(
            function ($item) {
                $data['id'] = $item->id;
                $data['topic'] = $item->topic;
                $data['image'] = env('APP_URL') . '/storage/image' . '/' . $item->image;
                $data['date'] = DateThai($item->created_at);
                $data['view'] = $item->view;
                return $data;
            }
        );
        return  [
            "status" => "success",
            "data" => $map,
            'total' => $total,
            'page' => $page,
            'perpage' => $perpage,
            'last_page' => ceil($total / $perpage)
        ];
    }

    public function newsdesc($id)
    {
        $news = News::with('gallery')->find($id);
        $user = User::find($news->user_id);

        if ($news->gallery != null) {
            $im = Gallery::with('image')->find($news->gallery->id);
            $dd = $im->image->map(function ($im) {
                $data['image'] = env('APP_URL') . '/storage/gallery/'  . $im->image;
                return $data;
            });
        } else {
            $dd = null;
        }
        $news->view++;
        $news->save();
        return response()->json([
            'status' => "success",
            'data' => [
                'id' => $news->id,
                'writer' => $user->name,
                'topic' => $news->topic,
                'desc' => $news->description,
                'view' => $news->view,
                'gallery' => $dd
            ]
        ], 200);
    }

    public function gallery(Request $request)
    {
        $gall = Gallery::with('image')->get();
        $map = $gall->map(function ($item) {
            foreach (($item->image) as  $value) {
                $data['id'] = $item->id;
                $data['galleryname'] = $item->galleryname;
                $data['cover'] =  env('APP_URL') . '/storage/gallery/' . $value->image;
                $data['date'] = DateThai($item->created_at);
            }
            return $data;
        });
        return response()->json([
            "message" => 'success',
            "data" => $map
        ]);
    }
    public function galleryDetail($id)
    {
        $gallery = Gallery::with('image')->get()->find($id);

        $res = $gallery->image->map(function ($item) {
            $data['image'] = env('APP_URL') . '/storage/public/gallery/' . $item->image;
            return $data;
        });
        return response()->json([
            'message' => 'success',
            'data' => [
                'id' => $gallery->id,
                'galleryname' => $gallery->galleryname,
                'image' => $res
            ]
        ]);
    }
    public function file(Request $request)
    {
        $doc =  Filedoc::orderBy('filename','desc');
        if ($s = $request->input('category')) {
            $doc->orWhere('category_id', 'LIKE', '%' . $s . '%');
        }
        if ($s = $request->input('subcate')) {
            $doc->orWhere('subcate_id', 'LIKE', '%' . $s . '%');
        }

        $perpage = $request->input('limit') ?: 9;
        $total = $doc->count();
        $page = $request->input('page') ?: 1;
        $doc->offset(($page - 1) * $perpage)->limit($perpage)->get();
        $map = $doc->get()->map(
            function ($item) {
                $data['id'] = $item->id;
                $data['filename'] = $item->filename;
                $data['category_id'] = $item->category_id;
                $data['subcategory_id'] = $item->subcate_id;
                $data['filepath'] = env('APP_URL') . '/storage/filedoc' . '/' . $item->filepath;
                $data['date'] = $item->created_at;
                return $data;
            }
        );
        return [
            'data' => $map,
            'total' => $total,
            'page' => $page,
            'perpage' => $perpage,
            'last_page' => ceil($total / $perpage)
        ];
    }

    public function Companylist(Request $request)
    {
        $comp = Company::query();
        if ($request->input() != null) {
            $comp
                ->orWhere('corpname', 'LIKE', '%' . $request->input('search') . '%')
                ->Where('year', '=',  $request->input('year'));
        }

        $perpage = $request->input('limit') ?: 10;
        $total = $comp->count();
        $page = $request->input('page') ?: 1;
        $comp->offset(($page - 1) * $perpage)->limit($perpage)->get();

        $cpn = $comp->get()->map(function ($item) {
            $data['id'] = $item->id;
            $data['comp_name'] = $item->corpname;
            $data['branch'] = json_decode($item->suppbranch);
            $data['year'] = $item->year;
            $data['detail'] =  env('APP_URL') . '/storage/company/' . $item->corpdetail;
            $data['address'] = $item->address;
            return $data;
        });
        return [
            'data' => $cpn,
            'total' => $total,
            'page' => $page,
            'perpage' => $perpage,
            'last_page' => ceil($total / $perpage)
        ];
    }

}
