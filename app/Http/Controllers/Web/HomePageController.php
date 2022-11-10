<?php

namespace App\Http\Controllers\Web;

use App\Models\Event;
use App\Models\Project;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    const PAGE_NAME = "HOME";
    public function index()
    {
        $data["pageName"] = self::PAGE_NAME;
        $data["projects"] = Project::select("id", "name", "image")->orderBy("id", "desc")->take(3)->get();
        $data["events"] = Event::select("id", "title", "image", "created_at")->orderBy("id", "desc")->take(3)->get();

        return view("front.index")->with($data);
    }
}
