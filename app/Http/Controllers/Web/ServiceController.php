<?php

namespace App\Http\Controllers\Web;

use App\Models\Team;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    const PAGE_TITLE = "SERVICE";
    const PAGE_NAME = "ALL SERVICE";
    public function fetch()
    {
        $data["pageTitle"] = self::PAGE_TITLE;
        $data["pageName"] = self::PAGE_NAME;
        $data["services"] = Service::select("id", "name", "image", "small_desc", "icon_image")->get();
        return view("front.services.services")->with($data);
    }

    public function fetchSingle($id, Request $request)
    {

        $data["service"] = Service::FindOrFail($id);
        if ($data["service"]) {
            $data["pageTitle"] = self::PAGE_TITLE;
            $data["pageName"] = (Service::select("name")->where("id", "=", $id)->first())->name;
            $data["services_single"] = Service::select("id", "name", "description", "image")->where("id", "=", $id)->first();
            $data["galleries"] = Gallery::select("id", "image", "project_id")->where("project_id", "=", $id)->get();
            $data["projects"] = Project::select("id", "name", "image")->get();
            $data["teams"] = Team::select("id", "name", "job", "title", "image")->first();
            return view("front.services.service-single")->with($data);
        }
    }

    public function search(Request $request)
    {
        $data["pageTitle"] = self::PAGE_TITLE;
        $data["pageName"] = self::PAGE_NAME;
        $keyword = $request->keyword;
        $data["keyword"] = $keyword;
        $data["services"]  = Service::where("name", "like", "%$keyword%")->get();
        return view("front.search.search")->with($data);
    }
}
