<?php

namespace App\Http\Controllers\Web;

use App\Models\Event;
use App\Models\Project;
use App\Models\SiteContent;
use App\Http\Controllers\Controller;
use App\Models\Service;

class EventController extends Controller
{
    const PAGE_TITLE = "EVENTS";
    const PAGE_NAME = "ALL EVENTS";
    public function fetch()
    {
        $data["pageTitle"] = self::PAGE_TITLE;
        $data["pageName"] = self::PAGE_NAME;
        $data["recent_events"] = Event::select("id","title", "image" , "created_at")->orderBy("id", "desc")->take(3)->get();
        $data["events"] = Event::select("id","title", "image" , "created_at", "small_body")->orderBy("id", "desc")->get();
        return view("front.events.news")->with($data);
    }

    public function fetchSingle($id)
    {
        $data["event"] = Event::FindOrFail($id);
        if($data["event"]){
            $data["pageTitle"] = self::PAGE_TITLE;
            $data["pageName"] = (Event::select("title")->where("id", "=", $id)->first())->title;
            $data["event"] = Event::select("id","title", "image" , "created_at", "small_body","body")->where("id", "=", $id)->first();
            $data["recent_events"] = Event::select("id","title", "image" , "created_at")->orderBy("id", "desc")->take(3)->get();
            return view("front.events.news-single")->with($data);
        }
    }
}
