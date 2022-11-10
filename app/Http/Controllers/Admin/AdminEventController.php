<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    public function index()
    {
        $data["events"] = Event::get();
        return view("admin.events.events")->with($data);
    }

    public function store(Request $request)

    {
        $data = $request->validate([
            'title' => 'required|string',
            "image" => "required|image|mimes:png,jpg,gif,jpeg",
            'small_body' => 'required|string',
            'body' => 'required|string',

        ]);

        $fileName = Storage::putFile("events", $data["image"]);
        $imageName = explode("/", $fileName);

        Event::create([
            'title' => $request->title,
            'image' => $imageName[1],
            'small_body' => $request->small_body,
            'body' => $request->body,

        ]);


        return redirect()->route("admin.all-events");
    }


    public function update(Request $request)
    {

        $data = $request->validate([
            'id' => 'required|exists:events,id',
            'title' => 'required|string',
            "image" => "required|image|mimes:png,jpg,gif,jpeg",
            'small_body' => 'required|string',
            'body' => 'required|string',
        ]);

        $event = Event::findOrFail($request->id);
        if ($request->has("image")) {
            if (isset($event->image)) {
                Storage::delete("events/".$event->image);
            }
            $fileName = Storage::putFile("events", $data["image"]);
            $imageName = explode("/", $fileName);
        }

        Event::findOrFail($request->id)->update([
            'title' => $request["title"],
            'image' => $imageName[1],
            'small_body' => $request["small_body"],
            'body' => $request["body"],

        ]);

        return redirect()->route("admin.all-events");
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        if (isset($event->image)) {
            Storage::delete("events/".$event->image);
        }

        $event->delete();

        return redirect()->route("admin.all-events");
    }
}
