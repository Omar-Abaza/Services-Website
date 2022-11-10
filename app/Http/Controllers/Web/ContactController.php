<?php

namespace App\Http\Controllers\Web;

use App\Models\Service;
use App\Models\Setting;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    const PAGE_TITLE = "CONTACT";
    const PAGE_NAME = "CONTACT US";
    public function contact(){
        $data["pageTitle"] = self::PAGE_TITLE;
        $data["pageName"] = self::PAGE_NAME;
        $data["contact"] = Setting::select("map","city","address","phone","email")->first();

        return view("front.contacts.contact")->with($data);
    }
}
