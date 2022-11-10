<?php

namespace App\Http\Controllers\Web;

use App\Models\About;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Team;

class AboutController extends Controller
{
    const PAGE_TITLE = "ABOUT";
    const PAGE_NAME = "ABOUT US";
    public function index()
    {
        $data["pageTitle"] = self::PAGE_TITLE;
        $data["pageName"] = self::PAGE_NAME;
        $data["abouts"] = About::select("id", "title", "image")->get();
        $data["about"] = About::select("id","description", "quote")->first();
        $data["setting"] = Setting::select()->first();
        $data["teams"] = Team::select("id","name", "job", "title", "image")->get();

        return view("front.about.about")->with($data);
    }
}
