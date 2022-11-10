<?php

namespace App\Http\Controllers\Web;

use App\Models\Project;
use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

class ProjectController extends Controller
{
    const PAGE_TITLE = "PROJECT";
    const PAGE_NAME = "ALL PROJECT";
    public function fetch()
    {
        $data["pageTitle"] = self::PAGE_TITLE;
        $data["pageName"] = self::PAGE_NAME;
        $data["projects"] = Project::select("id", "name", "image")->get();

        return view("front.projects.projects")->with($data);
    }

    public function fetchSingle($id)
    {
        $data["project"] = Project::FindOrFail($id);
        if($data["project"]){
            $data["pageTitle"] = self::PAGE_TITLE;
            $data["pageName"] = (Project::select("name")->where("id", "=", $id)->first())->name;
            $data["project"] = Project::select("id", "name","description","image")->where("id", "=", $id)->first();
            $data["galleries"] = Gallery::select("id","image","project_id")->where("project_id", "=", $id)->get();
            $data["services"] = Service::select("id", "name", "image")->get();

            return view("front.projects.projects-single")->with($data);
        }
    }

}
